<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class editController extends Controller
{
    public function editnews(){
        return view('backend.editnews');
    }
}
