<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KK;
use App\Models\PemerintahDesa;
use App\Models\Penduduk;



use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagetitle = 'Dashboard Desa';
        $title = 'Dashboard Desa';
        $berita = Berita::latest()->paginate(6);
        $kepala = PemerintahDesa::where('jabatan', 'Kepala Desa')->first();


        // Data penduduk
        $pendudukCount = Penduduk::count();
        $laki = Penduduk::where('jenis_kelamin', 'L')->count();
        $perempuan = Penduduk::where('jenis_kelamin', 'P')->count();
        $totalPenduduk = Penduduk::count();

        // Data pendidikan (contoh grouping)
        $pendidikan = Penduduk::select('pendidikan', \DB::raw('count(*) as total'))
            ->groupBy('pendidikan')
            ->pluck('total', 'pendidikan');

        $pemerintahDesa = PemerintahDesa::latest()->paginate(6);

        return view('user.dashboard', compact(
            'pagetitle',
            'title',
            'berita',
            'pemerintahDesa',
            'laki',
            'perempuan',
            'totalPenduduk',
            'pendidikan',
            'kepala'

        ));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $pagetitle = $berita->judul;
        $title = $berita->judul;

        return view('user.berita-detail', compact('pagetitle', 'title', 'berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
