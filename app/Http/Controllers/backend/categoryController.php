<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class categoryController extends Controller
{
    public function categories(){
        // $categories = Category::all();
        $categories = Category::latest()->paginate(2    );
        return view('backend.categories', compact('categories'));
    }
    public function store(Request $request) {
        $request->validate([
            'category_name' => 'required|string|max:50',
            'status' => 'required|boolean',
        ]);
        Category::create([
            'category_name' => $request->input('category_name'),
            'status' => $request->has('status') ? $request->input('status') : false,
        ]);
        return redirect()->back()->with('success', 'Category added successfully.');
    }
    public function toggleStatus(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->status = !$category->status;
        $category->save();

        return response()->json([
            'success' => true,
            'newStatus' => $category->status,
        ]);
    }
  /**
     * Update the specified category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:50',
            'status' => 'required|boolean',
        ]);
        $category  = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('message', 'Category updated successfully.');
    }


      /**
     * Delete the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
//     public function delete($id)
// {
//     try {
//         $category = Category::findOrFail($id);
//         $category->delete();

//         return redirect()->back()->with('message', 'Category deleted successfully.');
//     } catch (\Exception $e) {
//         return redirect()->back()->with('error', 'Failed to delete the category.');
//     }
// }
    public function de($id){
        try{

        }
        catch(\Exception $e){

        }
    }
    public function delete($id){
      try{
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('message','Category deleted successfully.');
      }
      catch(\Exception $e){
        return redirect()->back()->with(['error' => 'Failed to delete the category.']);
      }
    }
}
