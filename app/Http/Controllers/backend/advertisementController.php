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
        // $ads = Advertisement::all();
        $ads = Advertisement::latest()->paginate(5);

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
        'size' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $advertisement = Advertisement::findOrFail($id);
    $advertisement->size = $request->input('size');

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('advertisements', 'public');
        $advertisement->image = $imagePath;
    }

    $advertisement->save();

    return redirect()->route('admin.advertisement.index')->with('success', 'Advertisement updated successfully!');
}

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
