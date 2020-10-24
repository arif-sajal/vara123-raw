<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Provider\PayoutRequest;
use App\Models\Provider;
use App\Models\Payout;
use Illuminate\Http\Request;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;

class PayoutController extends Controller
{
    public function payoutModal($id)
    {
        $provider = Provider::find($id);
        return view('administration.modals.provider.payout', compact('provider'));
    }

    public function payout(PayoutRequest $request, $id)
    {
        $provider = Provider::find($id);

        if ($provider->balance >= $request->amount) :
            $payout = new Payout();

            $payout->amount = $request->amount;
            $payout->provider_id = $provider->id;
            $payout->status = 0;

            if ($payout->save()) :
                return Notify::send('success', 'Payout request successfully done')->json();
            endif;
        else :
            return Notify::send('warning', 'Insufficient Balance')->json();
        endif;
    }

    //all pay requests
    public function view(){
        $payout = Payout::all();
        return view('administration.pages.payout.list',compact('payout'));
    }

    public function payoutTable(){
        $payout = Payout::query();

        return DataTables::make($payout->latest()->get())
            ->addColumn('provider_id',function(Payout $payout){
                return $payout->provider->first_name.' '.$payout->provider->last_name;
            })
            ->addColumn('status',function(Payout $payout){
                return $payout->status ? 'Paid' : 'Unpaid';
            })
            ->addColumn('action',function(Payout $payout){
                return "

                <button class='btn btn-sm btn-success' data-action='confirm' data-action-route='".
                    route('app.form.submission.payout.done',$payout->id)."' data-hover='tooltip'
                    data-original-title='Confirm Payout'><i class='la la-check' data-action='confirm' data-action-route=''></i></button>

                ";
            })
            ->toJson();
    }

    public function payoutDone($id){
        $payout = Payout::find($id);
        $payout->provider->balance -= $payout->amount;
        $payout->status = 1;
        if(  $payout->save() && $payout->provider->save() ):
            return Notify::send('success', 'Payout Successfull')->reload('table','PayoutTables')->json();
        endif;
    }
}
