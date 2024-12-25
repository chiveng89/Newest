<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    public function advertisement()
    {
        $ads = Advertisement::all();
        $categories = Category::where('status', 1)->get();
        return view('backend.advertisement', compact('ads', 'categories'));
    }

    public function store(Request $request)
{
    logger($request->all());

    $request->validate([
        'size' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,category_id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = $request->file('image')->store('advertisements', 'public');
    $imageUrl = Storage::url($imagePath);

    $ads = new Advertisement();
    $ads->size = $request->size;
    $ads->category_id = $request->category_id;
    $ads->image = $imageUrl;
    $ads->save();

    return redirect()->back()->with('success', 'Advertisement added successfully!');
}


    public function toggleStatus(Request $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->status = !$advertisement->status;
        $advertisement->save();

        return response()->json([
            'success' => true,
            'newStatus' => $advertisement->status,
        ]);
    }

    public function update(Request $request, $id)
    {
        $ads = Advertisement::findOrFail($id);

        // Validate incoming data
        $validated = $request->validate([
            'size' => 'required|string|max:255',
            'redirect_url' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {

            if ($ads->image && Storage::disk('public')->exists($ads->image)) {
                Storage::disk('public')->delete($ads->image);
            }
            $imagePath = $request->file('image')->store('advertisements', 'public');
            $ads->image = $imagePath;
        }

        $ads->update([
            'size' => $validated['size'],
            'redirect_url' => $validated['redirect_url'],
        ]);

        return redirect()->back()->with('success', 'Advertisement updated successfully!');
    }

    public function destroy($id)
    {
        $ads = Advertisement::findOrFail($id);

        // Delete image from storage
        if ($ads->image && Storage::disk('public')->exists($ads->image)) {
            Storage::disk('public')->delete($ads->image);
        }

        $ads->delete();

        return redirect()->back()->with('success', 'Advertisement deleted successfully!');
    }
}
