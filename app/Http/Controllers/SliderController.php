<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('sliders.create_edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('slider_images'), $imageName);

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('sliders.index')->with('success','Slider created successfully.');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('sliders.create_edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slider = Slider::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::delete('slider_images/'.$slider->image);
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('slider_images'), $imageName);
            $slider->image = $imageName;
        }

        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();

        return redirect()->route('sliders.index')->with('success','Slider updated successfully.');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        Storage::delete('slider_images/'.$slider->image);
        $slider->delete();

        return redirect()->route('sliders.index')->with('success','Slider deleted successfully.');
    }
}
