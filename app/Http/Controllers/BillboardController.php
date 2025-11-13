<?php

namespace App\Http\Controllers;

use App\Models\Billboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BillboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billboards = Auth::user()->billboards()->latest()->paginate(10);
        return view('dashboards.loap.loap-billboards', compact('billboards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.loap.billboard-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'size' => 'required|string|max:50',
            'type' => 'required|string|in:Digital,Static,LED,Traditional',
            'orientation' => 'required|string|in:Portrait,Landscape',
            'price_per_day' => 'required|numeric|min:0',
            'price_per_week' => 'required|numeric|min:0',
            'price_per_month' => 'required|numeric|min:0',
            'features' => 'nullable|string|max:1000',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        // Handle image uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('billboards', 'public');
                $imagePaths[] = $path;
            }
            $data['images'] = $imagePaths;
            $data['main_image'] = $imagePaths[0] ?? null;
        }

        // Handle features as array
        if ($request->features) {
            $data['features'] = array_filter(explode(',', $request->features));
        }

        Billboard::create($data);

        return redirect()->route('loap.billboards')->with('success', 'Billboard created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Billboard $billboard)
    {
        $this->authorize('view', $billboard);
        return view('dashboards.loap.billboard-show', compact('billboard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Billboard $billboard)
    {
        $this->authorize('update', $billboard);
        return view('dashboards.loap.billboard-edit', compact('billboard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Billboard $billboard)
    {
        $this->authorize('update', $billboard);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'size' => 'required|string|max:50',
            'type' => 'required|string|in:Digital,Static,LED,Traditional',
            'orientation' => 'required|string|in:Portrait,Landscape',
            'price_per_day' => 'required|numeric|min:0',
            'price_per_week' => 'required|numeric|min:0',
            'price_per_month' => 'required|numeric|min:0',
            'features' => 'nullable|string|max:1000',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->all();

        // Handle new image uploads
        if ($request->hasFile('images')) {
            // Delete old images
            if ($billboard->images) {
                foreach ($billboard->images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('billboards', 'public');
                $imagePaths[] = $path;
            }
            $data['images'] = $imagePaths;
            $data['main_image'] = $imagePaths[0] ?? null;
        }

        // Handle features as array
        if ($request->features) {
            $data['features'] = array_filter(explode(',', $request->features));
        }

        $billboard->update($data);

        return redirect()->route('loap.billboards')->with('success', 'Billboard updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Billboard $billboard)
    {
        $this->authorize('delete', $billboard);

        // Delete images from storage
        if ($billboard->images) {
            foreach ($billboard->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $billboard->delete();

        return redirect()->route('loap.billboards')->with('success', 'Billboard deleted successfully!');
    }

    /**
     * Toggle billboard status (available/inactive).
     */
    public function toggleStatus(Billboard $billboard)
    {
        $this->authorize('update', $billboard);

        $billboard->update([
            'is_active' => !$billboard->is_active,
            'status' => $billboard->is_active ? 'inactive' : 'available'
        ]);

        return redirect()->back()->with('success', 'Billboard status updated successfully!');
    }
}
