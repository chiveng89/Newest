<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adsController extends Controller
{
    public function advertisement(){
        return view('backend.advertisement');
    }
}
