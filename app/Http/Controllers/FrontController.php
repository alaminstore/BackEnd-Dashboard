<?php

namespace App\Http\Controllers;

use App\Client;
use App\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $services = Service::all()->take(6);
        $clients = Client::all();
        return view('front.main',compact('services','clients'));
    }
}
