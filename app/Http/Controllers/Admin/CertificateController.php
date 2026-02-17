<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/certificates'), $imageName);
            $data['image'] = 'uploads/certificates/' . $imageName;
        }

        Certificate::create($data);
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate added successfully');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($certificate->image && file_exists(public_path($certificate->image))) {
                unlink(public_path($certificate->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/certificates'), $imageName);
            $data['image'] = 'uploads/certificates/' . $imageName;
        }

        $certificate->update($data);
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated successfully');
    }

    public function destroy(Certificate $certificate)
    {
        // Delete image file
        if ($certificate->image && file_exists(public_path($certificate->image))) {
            unlink(public_path($certificate->image));
        }
        
        $certificate->delete();
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully');
    }
}