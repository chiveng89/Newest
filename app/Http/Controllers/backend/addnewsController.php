<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Addnews;
use App\Models\Category;
class addnewsController extends Controller
{
       public function create()
    {
        $categories = Category::all();
        return view('addnews.create', compact('categories'));
    }
    public function addnews(){
        $addnews = Addnews::all();
        $categories = Category::all();
        return view('backend.addnews', compact('addnews','categories'));
    }

    public function store(Request $request){
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|unique:addnews,slug',
            'short_description' => 'required|string|max:500',
            'long_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only([
            'category_id',
            'title',
            'slug',
            'short_description',
            'long_description',
            'image_position',
        ]);

        $data['add_to_slide'] = $request->has('add_to_slide');
        $data['add_to_home'] = $request->has('add_to_home');
        $data['add_to_related_views'] = $request->has('add_to_related_views');
        $data['add_to_most_views'] = $request->has('add_to_most_views');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Addnews::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Article added successfully.',
            'redirect_url' => route('admin.addnews.store'),
        ]);
    }
    public function show($id){
        $news = Addnews::findOrFail($id);
        return view('backend.allnews.show',compact('allnews'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|unique:addnews, slug, '. $id. ', addnews_id',
            'title' => 'required|max:255',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'nullable|image|mimes:jpeg, png, jpg, gif|max:2048',
        ]);
        $news = Addnews::findOrFail($id);
        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        $news->update($data);
        return redirect()->route('addnews.index')->with('success', 'News updated successfully.');
    }
    public function destroy($id){
        $news = Addnews::findOrFail($id);
        $news->delete();

        return redirect()->route('addnews.index')->with('success', 'News deleted successfully. ');
    }
}
