<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\CustomerResource;
use App\Models\Customer;
use App\Models\LoginSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Library\Api\Facades\Api;

class LoginController extends Controller
{
    public function doLogin(Request $request){
        $validator = Validator::make($request->all(),[
            'username'=> 'required',
            'password'=> 'required'
        ]);

        if($validator->fails()):
            return Api::errors($validator->errors())->statusCode(406)->send();
        endif;

        $credOne = ['username'=>$request->get('username'),'password'=>$request->get('password')];
        $credTwo = ['email'=>$request->get('username'),'password'=>$request->get('password')];
        $credThree = ['phone'=>$request->get('username'),'password'=>$request->get('password')];

        $agent = new Agent();

        /*if($agent->isRobot()):
            return Api::message('Sorry Fucker')->statusCode(403)->send();
        endif;*/

        // Check Authentication Username Payload with username and email
        if(auth('customer')->once($credOne) or auth('customer')->once($credTwo) or auth('customer')->once($credThree)):
            // Check if the admin is active
            if(auth('customer')->user()->is_active):
                $this->__delete_previousSessions(auth('customer')->user());
                // Register Session
                $sessionData = [
                    'user_id' => auth('customer')->id(),
                    'user_type' => Customer::class,
                    'is_desktop' => $agent->isDesktop(),
                    'is_tablet' => $agent->isTablet(),
                    'is_mobile' => $agent->isMobile(),
                    'device' => $agent->device() ? $agent->device() :  "",
                    'platform' => $agent->platform() ? $agent->platform() : "",
                    'platform_version' => $agent->version($agent->platform()) ? $agent->version($agent->platform()) : "",
                    'browser' => $agent->browser() ? $agent->browser() : "",
                    'browser_version' => $agent->version($agent->browser()) ? $agent->version($agent->browser()) : "",
                    'ip' => $request->ip(),
                    'token_created' => now(),
                    'token_expired_at' => now()->addMinute(10),
                    # Below Line Will Be Uncommented On Production Server
                    //'token' => Str::random(32).'-'.time().'-'.time().'-'.Str::random(32),
                    # Below Line Will Be Deleted On Production Server
                    'token' => '12345678910',
                ];

                LoginSession::insert($sessionData);

                // If everything is okay than send authenticated user information
                return Api::data(['session'=>$sessionData, 'user'=>new CustomerResource(auth('customer')->user())])->message('logged In Successfully.')->send();
            else:
                // If admin is not active than send error message
                return Api::message('Your Account Is Not Active Or Banned Due To ' . (auth('customer')->user()->ban_reason ? auth('customer')->user()->ban_reason : 'Some Reason'))->send();
            endif;
        endif;

        // if user not found than send invalid credential error
        return Api::message('Invalid User Credentials, Please Try Again')->statusCode(403)->send();
    }

    private function __delete_previousSessions($user){
        $agent = new Agent();
        LoginSession::where('user_id',$user->id)
            ->where('user_type',Customer::class)
            ->where('is_desktop',$agent->isDesktop())
            ->where('is_tablet',$agent->isTablet())
            ->where('is_mobile',$agent->isMobile())
            ->where('device',$agent->device())
            ->where('platform',$agent->platform())
            ->where('platform_version',$agent->version($agent->platform()))
            ->where('browser',$agent->browser())
            ->where('browser_version',$agent->version($agent->browser()))
            ->where('ip',request()->ip())->delete();
    }
}
