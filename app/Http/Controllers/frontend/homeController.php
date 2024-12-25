<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class homeController extends Controller
{
    public function homepage(){
        $categories = Category::all();
        return view('frontend.home', compact('categories'));
    }
    
    public function news(){
        $categories = Category::all();
        return view('frontend.news', compact('categories'));
    }
    public function articledetail(){
        $categories = Category::all();
        return view('frontend.article-detail',compact('categories'));
    }
    public function media(){
        $categories = Category::all();
        return view('frontend.media', compact('categories'));
    }
    public function social(){
        $categories = Category::all();
        return view('frontend.social', compact('categories'));
    }
    public function entertainment(){
        $categories = Category::all();
        return view('frontend.entertainment', compact('categories'));
    }

    public function aboutus(){
        $categories = Category::all();
        return view('frontend.about-us', compact('categories'));
    }
}
