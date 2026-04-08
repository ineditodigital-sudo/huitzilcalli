<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::orderBy('created_at', 'desc')->get();
        return view('backend.promotions.index', compact('promotions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'external_link' => 'nullable|url',
        ]);

        $data = $request->only(['title', 'description', 'external_link', 'active']);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/promotions'), $file_name);
            $data['image'] = 'uploads/promotions/' . $file_name;
        }

        if ($request->id == 0) {
            Promotion::create($data);
            return response()->json(['message' => 'Promoción creada correctamente']);
        } else {
            $promotion = Promotion::findOrFail($request->id);
            
            // Delete old image if new one is uploaded
            if ($request->hasFile('image') && $promotion->image && file_exists(public_path($promotion->image))) {
                unlink(public_path($promotion->image));
            } elseif (!$request->hasFile('image')) {
                // Keep old image if no new one
                unset($data['image']);
            }

            $promotion->update($data);
            return response()->json(['message' => 'Promoción actualizada correctamente']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if ($id != 0) {
            $promotion = Promotion::findOrFail($id);
            return response()->json(['data' => $promotion]);
        } else {
            $promotions = Promotion::orderBy('created_at', 'desc')->get();
            return response()->json([
                'table_view' => view('backend.promotions.partials.table', compact('promotions'))->render(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        if ($promotion->image && file_exists(public_path($promotion->image))) {
            unlink(public_path($promotion->image));
        }
        $promotion->delete();
        return response()->json(['message' => 'Promoción eliminada correctamente']);
    }

    /**
     * Update status of promotion
     */
    public function changeStatus(Request $request)
    {
        Promotion::where('id', $request->id)->update([
            'active' => intval($request->status)
        ]);
        return response()->json(['message' => 'Estatus actualizado']);
    }
}
