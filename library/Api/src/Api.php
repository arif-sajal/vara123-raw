<?php

namespace Library\Api;

use App\Http\Resources\Front\CustomerResource;
# use App\Http\Resources\Provider\ProviderResource;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Provider;

class Api
{
    public $data = null;
    public $errors = null;
    public $message = '';
    public $statusCode = 200;
    public $session = null;
    public $user = null;

    public function data($data){
        $this->data = $data;
        return $this;
    }

    public function errors($errors){
        $this->errors = $errors;
        return $this;
    }

    public function message($message){
        $this->message = $message;
        return $this;
    }

    public function statusCode($statusCode){
        $this->statusCode = $statusCode;
        return $this;
    }

    private function session(){
        if (session()->has('__api_session__')):
            $this->session = session()->get('__api_session__');
        endif;
    }

    private function user(){
        if($this->session):
            if($this->session->user_type === Customer::class):
                $this->user = CustomerResource::make($this->session->user_type::find($this->session->user_id));
            /*elseif($this->session->user_type === Admin::class):
                $this->user = ProviderResource::make($this->session->user_type::find($this->session->user_id));
            elseif($this->session->user_type === Provider::class):
                $this->user = ProviderResource::make($this->session->user_type::find($this->session->user_id));*/
            endif;
        endif;
    }

    public function send(){
        $this->session();
        $this->user();
        return response()->json([
            'data' => $this->data,
            'errors' => $this->errors,
            'message' => $this->message,
            'session' => $this->session,
            'user' => $this->user,
            'statusCode' => $this->statusCode,
            'header' => (int) request()->header('AUTH-USER')
        ],$this->statusCode);
    }

    /*private function __detect_user(){
        if(request()->hasHeader('AUTH-KEY') && request()->hasHeader('AUTH-TYPE') && request()->hasHeader('AUTH-USER')):
            if(strtoupper(request()->header('AUTH-TYPE')) === 'CUSTOMER' && is_int(request()->header('AUTH-USER'))):
                $customer = Customer::find(request()->header('AUTH-USER'));
                $this->user = $customer ? new CustomerResource($customer) : null;
            elseif(strtoupper(request()->header('AUTH-TYPE')) === 'ADMIN' && is_int(request()->header('AUTH-USER'))):
                $this->user = Admin::find(request()->header('AUTH-USER'));
            elseif(strtoupper(request()->header('AUTH-TYPE')) === 'PROVIDER' && is_int(request()->header('AUTH-USER'))):
                $this->user = Provider::find(request()->header('AUTH-USER'));
            endif;

            if($this->user):
                $agent = new Agent();
                $sessionData = [
                    ['user_id',$this->user->id],
                    ['user_type',get_class($this->user)],
                    ['token',request()->header('AUTH-KEY')],
                    ['is_desktop',$agent->isDesktop()],
                    ['is_tablet',$agent->isTablet()],
                    ['is_mobile',$agent->isMobile()],
                    ['device',$agent->device()],
                    ['platform',$agent->platform()],
                    ['platform_version',$agent->version($agent->platform())],
                    ['browser',$agent->browser()],
                    ['browser_version',$agent->version($agent->browser())],
                    ['ip',request()->ip()]
                ];
                $this->session = LoginSession::where($sessionData)->first();
            endif;
        endif;
        return false;
    }*/
}
