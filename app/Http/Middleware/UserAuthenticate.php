<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Provider;
use Closure;
use App\Models\LoginSession;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Library\Api\Facades\Api;

class UserAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param null $for
     * @return mixed
     */
    public function handle($request, Closure $next, $for = null)
    {
        $authKey = $request->header('AUTH-KEY');
        $agent = new Agent();

        if($authKey):

            switch ($for):
                case 'admin':
                    $authClass = Admin::class;
                    break;
                case 'provider':
                    $authClass = Provider::class;
                    break;
                case 'customer':
                    $authClass = Customer::class;
                    break;
                default:
                    $authClass = null;
            endswitch;

            $sessionData = [
                ['user_type',$authClass],
                ['token',$authKey],
                ['is_desktop',$agent->isDesktop()],
                ['is_tablet',$agent->isTablet()],
                ['is_mobile',$agent->isMobile()],
                ['device',$agent->device()],
                ['platform',$agent->platform()],
                ['platform_version',$agent->version($agent->platform())],
                ['browser',$agent->browser()],
                ['browser_version',$agent->version($agent->browser())],
                ['ip',$request->ip()]
            ];

            $loginSession = LoginSession::where($sessionData)->first();

            if($loginSession and $loginSession->user_type === $authClass):
                $loginSession->token_expired_at = now()->addMinute(30000);
                //$loginSession->token = 12345678910;
                //$loginSession->token = Str::random(32).'-'.time().'-'.time().'-'.Str::random(32);
                $loginSession->save();
                session()->flash('__api_session__',$loginSession);
                return $next($request);
            endif;

            return Api::data($loginSession)->message('Unauthorized Session Datas')->statusCode(401)->send();
        else:
            return Api::message('Unauthorized Session Data')->statusCode(401)->send();
        endif;
    }
}
