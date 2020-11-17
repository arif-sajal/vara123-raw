<?php

namespace App\Http\Controllers\Administration\Property;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Property;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Administration\Property\Gallery\Add;
use App\Http\Requests\Administration\Property\Gallery\Update;
use Illuminate\Support\Facades\Storage;
use Library\Notify\Facades\Notify;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function galleryTable($id){
        $galleries = Gallery::where('property_id', $id)->get();
        return DataTables::make($galleries)
            ->rawColumns(['image','action','property_id'])
            ->editColumn('property_id', function(Gallery $gallery){
                return $gallery->property->name;
            })
            ->editColumn('image', function(Gallery $gallery){
                if(Storage::exists($gallery->image)):
                    return "<img src='".Storage::url($gallery->image)."' width='50px'>";
                endif;
            })
            ->addColumn('action', function (Gallery $gallery) {
                return "
                <button class='btn btn-sm btn-success' data-toggle='modal' data-target='#myModal' data-content='" . route('app.modal.property.gallery.edit', $gallery->id) . "' data-hover='tooltip' data-original-title='View Gallery'><i class='la la-dollar'></i></button>
                    <button class='btn btn-sm btn-danger' data-action='confirm'
                     data-action-route='" . route('app.form.submission.property.gallery.delete', $gallery->id) .
                    "' data-hover='tooltip' data-original-title='Delete Gallery'><i class='la la-trash'>
                      </i></button>
                ";
            })
            ->toJson();
    }

    public function addGalleryView($id){
        $property = Property::find($id);
        return view('administration.modals.property.gallery.add',compact('property'));
    }

    public function addGallery(Add $request, $id){
        $property = Property::find($id);

        $gallery = new Gallery();

        $gallery->property_id = $property->id;

        if($request->image):
            $gallery->image = Storage::putFile('avatar',$request->file('image')); 
        endif;

        if($gallery->save()):
            return Notify::send('success','Gallery added successfully')->reload('table','GalleryTable')->json();
        endif;
    }

    public function editGalleryView($id){
        $gallery = Gallery::find($id);
        return view('administration.modals.property.gallery.edit', compact('gallery'));
    }

    public function updateGallery(Update $request, $id){
        $gallery = Gallery::find($id);

        if($request->image):
            if(Storage::exists($gallery->image)):
                Storage::delete($gallery->image);
            endif;
            $gallery->image = Storage::putFile('avatar',$request->file('image')); 
            if($gallery->save()):
                return Notify::send('success','Gallery updated successfully')->reload('table','GalleryTable')->json();
            endif;
        endif;
    }

    public function deleteGallery($id){
        $gallery = Gallery::find($id);
        if(Storage::exists($gallery->image)):
            Storage::delete($gallery->image);
            if($gallery->delete()):
                return Notify::send('success','Gallery deleted successfully')->reload('table','GalleryTable')->json();
            endif;
        endif;
    }
}
