<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Endpoint todo base url
     * @param string $route
     * 
     * @return string
     */
    public function getBaseEndpointURL( string $route = '' ) : string
    {
        return env( 'BASE_URL' ) . $route;
    }
}
