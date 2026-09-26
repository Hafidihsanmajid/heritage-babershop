<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Services\ImageService;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barbers = Barber::latest()->paginate(10);

        return view('admin.barbers.index', compact('barbers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.barbers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'instagram_handle' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'image_url' => ['nullable', 'string', 'max:500'],
        ], [
            'name.required' => 'Nama kapster wajib diisi.',
            'role.required' => 'Peran/Posisi kapster wajib diisi.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_url'] = ImageService::uploadAndResize(
                $request->file('image'),
                'barbers',
                500,
                500
            );
        }

        unset($validated['image']);

        Barber::create($validated);

        return redirect()->route('admin.barbers.index')
            ->with('success', 'Kapster berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barber $barber)
    {
        return redirect()->route('admin.barbers.edit', $barber);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barber $barber)
    {
        return view('admin.barbers.edit', compact('barber'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barber $barber)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'instagram_handle' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'image_url' => ['nullable', 'string', 'max:500'],
        ], [
            'name.required' => 'Nama kapster wajib diisi.',
            'role.required' => 'Peran/Posisi kapster wajib diisi.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_url'] = ImageService::uploadAndResize(
                $request->file('image'),
                'barbers',
                500,
                500
            );
        }

        unset($validated['image']);

        $barber->update($validated);

        return redirect()->route('admin.barbers.index')
            ->with('success', 'Data kapster berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barber $barber)
    {
        $barber->delete();

        return redirect()->route('admin.barbers.index')
            ->with('success', 'Data kapster berhasil dihapus.');
    }
}

