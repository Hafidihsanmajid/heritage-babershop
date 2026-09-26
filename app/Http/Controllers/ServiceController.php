<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'image_url' => ['nullable', 'string', 'max:500'],
        ], [
            'title.required' => 'Nama layanan wajib diisi.',
            'price.required' => 'Harga layanan wajib diisi.',
            'price.integer' => 'Harga layanan harus berupa angka bulat.',
            'price.min' => 'Harga layanan minimal 0.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_url'] = ImageService::uploadAndResize(
                $request->file('image'),
                'services',
                800,
                450
            );
        }

        unset($validated['image']);

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return redirect()->route('admin.services.edit', $service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'image_url' => ['nullable', 'string', 'max:500'],
        ], [
            'title.required' => 'Nama layanan wajib diisi.',
            'price.required' => 'Harga layanan wajib diisi.',
            'price.integer' => 'Harga layanan harus berupa angka bulat.',
            'price.min' => 'Harga layanan minimal 0.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_url'] = ImageService::uploadAndResize(
                $request->file('image'),
                'services',
                800,
                450
            );
        }

        unset($validated['image']);

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}

