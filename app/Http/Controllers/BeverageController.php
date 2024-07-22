<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beverage;
use App\Traits\UploadFile;

class BeverageController extends Controller
{
    use UploadFile;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Beverages Page";
        $beverages = Beverage::get();
        return view('admin.beverages', compact('beverages', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Beverages Page";
        return view('admin.addBeverage', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'title' => 'required|max:50|min:10',
            'content' => 'required|max:1000|min:20',
            'price' => 'required|numeric',
            'image' => 'sometimes|nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ], $messages);

        $fileName = $this->upload($request->image, 'assets/images');

        $data['image'] = $fileName;
        $data['published'] = isset($request->published);
        $data['special'] = isset($request->special);

        Beverage::create($data);
        return redirect('beverages');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Beverage Page";
        $beverage = Beverage::findOrFail($id);
        return view('admin.editBeverage', compact('beverage', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'title' => 'required|max:50|min:10',
            'content' => 'required|max:1000|min:20',
            'price' => 'required|numeric',
            'image' => 'sometimes|nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ], $messages);

        $beverage = Beverage::findOrFail($id);

        // If a new image is uploaded, handle the file upload
        if ($request->hasFile('image')) {
            $fileName = $this->upload($request->image, 'assets/images');
            $data['image'] = $fileName;
        } else {
            // Keep the existing image if no new image is uploaded
            $data['image'] = $beverage->image;
        }

        // If the published or special checkboxes is not checked, it won't be present in the request
        // So we explicitly check if it's set
        $data['published'] = $request->has('published') ? 1 : 0;
        $data['special'] = $request->has('special') ? 1 : 0;
        //dd("New image:", $fileName);
        Beverage::where('id', $id)->update($data);
        return redirect('beverages');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * error custom messages
     */
    public function errMsg(){
        return [
            'title.required' => 'The Title is Missed !!, Please Insert It',
            'title.max' => 'The title may not be greater than 50 characters.',
            'title.min' => 'Length is less than 20, Please Insert more Characters',
            'content.required' => 'The content field is required.',
            'content.max' => 'The content may not be greater than 1000 characters.',
            'content.min' => 'The content must be at least 50 characters.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'image.image' => 'The image must be an image file.',
            'image.max' => 'The image may not be greater than 2MB.',
            'category_id.required' => 'The category field is required.',
            'category_id.exists' => 'The selected category does not exist.',
        ];
    }
}
