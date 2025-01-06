<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdvertisementController extends Controller
{
    public function advertisement(): View
    {
        $ads = Advertisement::all();
        $categories = Category::where('status', 1)->get();
        return view('backend.advertisement', compact('ads', 'categories'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'size' => 'required|string|max:50',
            'category_id' => 'required|exists:categories,category_id',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048', // Ensure image is required
            'status' => 'required|boolean',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $fileName);
            $validatedData['image'] = 'images/' . $fileName; // Assign the image path to validatedData
        }

        // Create the advertisement
        Advertisement::create($validatedData);

        // $imgPath = null;

        // if ($request->hasFile('image')) {
        //     $imgPath = $request->file('image')->store('public/images');
        //     $imgPath = str_replace('public/', '', $imgPath);
        //     dd($imgPath);
        // }

        // Advertisement::create([
        //     'size' => $request->input('size'),
        //     'category_id' => $request->input('category_id'),
        //     'image' => $imgPath,
        //     'status' => $request->input('status'),
        // ]);

        return redirect()->back()->with('success', 'Advertisement added successfully.');
    }
    public function toggleStatus(Request $request, $id){
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->status = !$advertisement->status;
        $advertisement->save();

        return response()->json([
            'success' => true,
            'newStatus' => $advertisement->status,
        ]);
    }

    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'size' => 'required|string|max:255',
    //         'category_id' => 'required|exists:categories,category_id',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $imagePath = $request->file('image')->store('advertisement', 'public');

    //     Advertisement::create([
    //         'size' => $request->size,
    //         'category_id' => $request->category_id,
    //         'image' => $imagePath,
    //     ]);

    //     return redirect()->back()->with('success', 'Advertisement added successfully!');
    // }


  /**
     * Delete the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */

     public function destroy($id)
     {
         $advertisement = Advertisement::findOrFail($id);
         $advertisement->delete(); 

         return redirect()->route('admin.advertisement')->with('success', 'Advertisement deleted successfully');
     }

}
