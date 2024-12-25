<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Addnews;
use App\Models\Category;

class allnewsController extends Controller
{
    public function allnews(){
        $addnews = Addnews::with('category')->get();
        return view('backend.allnews',compact('addnews'));
    }
    public function update(Request $request, $id)
    {
        $news = AddNews::findOrFail($id);
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',

        ]);

        $news->update($validated);


        return redirect()->route('admin.addnews.index')->with('success', 'News updated successfully!');
    }

}
