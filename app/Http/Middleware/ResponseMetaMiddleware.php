<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Auth;
use App\Config;
use App\Contact;

class ResponseMetaMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if (($response instanceof JsonResponse) && Auth::check()) {
            $data = json_decode($response->getContent(), true);
            $payloadWithMeta = $this->getMetaData($data);
            $response->setData($payloadWithMeta);
            return $response;
        }

        return $response;
    }

    private function getMetaData($data)
    {
        $data['helpers']['navbar_contacts_count'] = Contact::whereIn('status', [
            "new", "status_policy_waiting", "pre_confirmation_pending"
        ])->count();

        $configs = Config::all();
        $config_data = $configs->reduce(function ($configLookup, $config) {
            $configLookup[$config['option']] = $config['value'];
            return $configLookup;
        }, []);
        $data['helpers']['configs'] = $config_data;
        return $data;
    }
}
