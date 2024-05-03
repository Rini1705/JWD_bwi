<?php

namespace App\Http\Controllers;

use App\Models\Tourism;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TourismController extends Controller
{
    public function show($id)
    {
        $item = Tourism::findOrFail($id);
        return view('/frontend/pages/detail-tourism', compact('item'));
    }

public function create(Request $request)
    {
        $tourism = new Tourism();
        if ($request->hasFile('image')) {
            $cleanedName = str_replace(' ', '', $request->name);
            $randomFileName = uniqid($cleanedName.'_') . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('frontend/img'), $randomFileName);
            $tourism->image = $randomFileName;
        }

        $tourism->fill($request->only(['name', 'slug', 'description', 'accommodation', 'transportation', 'food', 'price', 'open', 'close']));
        $tourism->save();

        return redirect('/admin/tourism')->with('success', 'Tourism created successfully.');
    }

public function update(Request $request, $id)
    {
        $tourism = Tourism::findOrFail($id);

        if ($request->hasFile('image')) {
            $cleanedName = str_replace(' ', '', $request->name);
            $randomFileName = uniqid($cleanedName.'_') . '.' . $request->file('image')->extension();
            
            if ($tourism->image && File::exists(public_path('frontend/img/' . $tourism->image))) {
                File::delete(public_path('frontend/img/' . $tourism->image));
            }
    
            $request->file('image')->move(public_path('frontend/img'), $randomFileName);
            $tourism->image = $randomFileName;
        }

        $tourism->update($request->only(['name', 'slug', 'description', 'accommodation', 'transportation', 'food', 'price', 'open', 'close']));
        return redirect('/admin/tourism')->with('success', 'Tourism update successfully.');
    }

    public function delete($id)
    {
        $tourism = Tourism::findOrFail($id);
        if ($tourism->image && File::exists(public_path('frontend/img/' . $tourism->image))) {
            File::delete(public_path('frontend/img/' . $tourism->image));
        }

        $tourism->delete();

        return redirect('/admin/tourism')->with('success', 'Tourism deleted successfully.');
    }
}
