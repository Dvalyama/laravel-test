<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TestController extends Controller
{
    
    public function __invoke()
    {
        // return response('Test');
        return response('test',);
        
    }
}