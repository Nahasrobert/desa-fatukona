<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\InformasiPublik;
use App\Models\KK;
use App\Models\PemerintahDesa;
use App\Models\Penduduk;
use App\Models\ProdukHukum;
use App\Models\Galeri;
use App\Models\Pembangunan;
use App\Models\BantuanPenerima;
use App\Models\Apbdesa;
use App\Models\Pengaduan;
use App\Models\lapak;
use Illuminate\Support\Facades\DB;
use App\Models\Bpd;
use App\Models\Linmas;
use App\Models\Pkk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Apbdesa::orderBy('tahun', 'desc')
            ->orderBy('bidang')
            ->paginate(12);

        // Hitung total (untuk <tfoot> di tabel)
        $totalAnggaran  = $data->sum('anggaran');
        $totalRealisasi = $data->sum('realisasi');
        $totalPersen    = $totalAnggaran > 0 ? round(($totalRealisasi / $totalAnggaran) * 100, 2) : 0;

        $totals = [
            'anggaran'  => $totalAnggaran,
            'realisasi' => $totalRealisasi,
            'persen'    => $totalPersen,
        ];
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
            'kepala',
            'data',
            'totals',
        ));
    }


    public function peta()
    {
        $pagetitle = 'Peta Desa';
        $title = 'Peta Desa';
        $kk = KK::all();
        return view('user.peta', compact('pagetitle', 'title', 'kk'));
    }
    public function produkHukum()
    {
        $pagetitle = 'Produk Hukum';
        $title = 'Produk Hukum';
        $produkHukum = ProdukHukum::orderby('created_at', 'desc')->get();
        return view('user.produk-hukum', compact('pagetitle', 'title', 'produkHukum'));
    }
    public function informasiPublik()
    {
        $informasiPublik = InformasiPublik::orderby('created_at', 'desc')->get();
        return view('user.informasi-publik', [
            'informasiPublik' => $informasiPublik,
        ]);
    }

    public function galeri()
    {
        // Ambil semua data galeri, urut tanggal terbaru
        $galeris = Galeri::orderBy('tanggal', 'desc')->paginate(12);
        // Optional: setting desa
        $settings = ['nama_desa' => 'Contoh Desa'];
        $pagetitle = 'Galeri';
        $title = 'Galeri';

        return view('user.galeri', compact('galeris', 'settings', 'title', 'pagetitle'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function berita()

    {
        $pagetitle = 'Berita';
        $title = 'Berita';
        $berita = Berita::latest()->paginate(12);
        return view('user.berita', compact('pagetitle', 'title', 'berita'));

        //
    }
    public function pembangunan()
    {
        $pagetitle = 'Pembangunan';
        $title = 'Data Pembangunan Desa';
        $pembangunan = Pembangunan::latest()->get(); // Pagination
        return view('user.pembangunan', compact('pagetitle', 'title', 'pembangunan'));
    }

    public function pengaduan(Request $request)
    {
        $pagetitle = 'Pengaduan';
        $title = 'Data Pengaduan Desa';

        $query = Pengaduan::query()
            ->where('status', '!=', 'Baru'); // exclude status Baru

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('nama_pengadu', 'like', "%$q%")
                    ->orWhere('judul', 'like', "%$q%")
                    ->orWhere('isi_pengaduan', 'like', "%$q%");
            });
        }

        $pengaduan = $query->latest()->paginate(10)->withQueryString();

        return view('user.pengaduan', compact('pagetitle', 'title', 'pengaduan'));
    }


    public function storePengaduan(Request $request)
    {
        // dd($request->all()); // <-- PAKAI () 

        // Validasi input
        $validated = $request->validate([
            'nama_pengadu'   => 'nullable|string|max:100',
            'kontak'         => 'nullable|string|max:100',
            'judul'          => 'required|string|max:255',
            'isi_pengaduan'  => 'required|string|min:10',
        ]);

        Pengaduan::create([
            'nama_pengadu'  => $validated['nama_pengadu'] ?? null,
            'kontak'        => $validated['kontak'] ?? null,
            'judul'         => $validated['judul'],
            'isi_pengaduan' => $validated['isi_pengaduan'],
            'status'        => 'Baru',
        ]);

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim! Terima kasih atas partisipasi Anda.');
    }

    public function apbd()
    {
        $tahunList = DB::table('apbdesa')->select('tahun')->distinct()->orderBy('tahun', 'desc')->get();
        $dataPerTahun = DB::table('apbdesa')
            ->select('tahun', 'bidang', 'anggaran', 'realisasi')
            ->orderBy('tahun', 'desc')
            ->get()
            ->groupBy('tahun');
        return view('user.apbdesa', [
            'tahunList' => $tahunList,
            'dataPerTahun' => $dataPerTahun,
            'title' => 'APBDesa'
        ]);
    }

    public function aparatur($kategori)
    {
        $kategori = Str::lower($kategori);
        $judul = '';
        $data = collect();

        switch ($kategori) {
            case 'bpd':
                $data = Bpd::all();
                $judul = 'BPD (Badan Permusyawaratan Desa)';
                break;

            case 'linmas':
                $data = Linmas::all();
                $judul = 'Linmas (Perlindungan Masyarakat)';
                break;

            case 'pkk':
                $data = Pkk::all();
                $judul = 'PKK (Pemberdayaan Kesejahteraan Keluarga)';
                break;

            case 'pegawai':
                $data = PemerintahDesa::all();
                $judul = 'Pegawai Pemerintah Desa';
                break;

            default:
                abort(404, 'Halaman tidak ditemukan');
        }

        return view('user.pemerintahdesa', compact('data', 'judul', 'kategori'));
    }




    public function bantuan()
    {
        $title = 'Data Penerima Bantuan';
        $data = BantuanPenerima::with(['jenis', 'penduduk'])->latest()->get();
        return view('user.penerima-bantuan', compact('data', 'title'));
    }

    public function lapak()
    {
        $title = 'Lapak Produk UMKM';
        $data = Lapak::latest()->get();
        return view('user.lapak', compact('data', 'title'));
    }

    public function sejarah()
    {
        $title = 'Sejarah';
        $data = BantuanPenerima::with(['jenis', 'penduduk'])->latest()->get();
        return view('user.sejarah', compact('data', 'title'));
    }

    public function statistik()
    {
        $title = 'Statistik Penduduk';

        // Statistik Jenis Kelamin
        $jk = DB::table('penduduk')
            ->select('jenis_kelamin', DB::raw('count(*) as total'))
            ->groupBy('jenis_kelamin')
            ->pluck('total', 'jenis_kelamin');

        // Statistik Pekerjaan
        $pekerjaan = DB::table('penduduk')
            ->select('pekerjaan', DB::raw('count(*) as total'))
            ->groupBy('pekerjaan')
            ->orderByDesc('total')
            ->limit(5)
            ->pluck('total', 'pekerjaan');

        // Statistik Agama
        $agama = DB::table('penduduk')
            ->select('agama', DB::raw('count(*) as total'))
            ->groupBy('agama')
            ->pluck('total', 'agama');

        // Statistik Pendidikan
        $pendidikan = DB::table('penduduk')
            ->select('pendidikan', DB::raw('count(*) as total'))
            ->groupBy('pendidikan')
            ->pluck('total', 'pendidikan');

        // Statistik Perkawinan
        $perkawinan = DB::table('penduduk')
            ->select('status_kawin', DB::raw('count(*) as total'))
            ->groupBy('status_kawin')
            ->pluck('total', 'status_kawin');

        // Statistik Umur (Kelompok Umur)
        $umur = DB::table('penduduk')
            ->selectRaw("
            CASE
                WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 0 AND 14 THEN '0-14'
                WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 15 AND 24 THEN '15-24'
                WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 25 AND 44 THEN '25-44'
                WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 45 AND 64 THEN '45-64'
                ELSE '65+'
            END as kelompok_umur,
            COUNT(*) as total
        ")
            ->groupBy('kelompok_umur')
            ->pluck('total', 'kelompok_umur');

        return view('user.statistik', compact('title', 'jk', 'pekerjaan', 'agama', 'pendidikan', 'perkawinan', 'umur'));
    }

    public function visimisi()
    {
        $title = 'Visi & Misi';
        $data = BantuanPenerima::with(['jenis', 'penduduk'])->latest()->get();
        return view('user.visi-misi', compact('data', 'title'));
    }

    public function struktur()
    {
        $title = 'Struktur Organisasi';
        $data = BantuanPenerima::with(['jenis', 'penduduk'])->latest()->get();
        return view('user.struktur', compact('data', 'title'));
    }

    public function realisasi()
    { {
            // Ambil semua data, urutkan tahun desc lalu bidang
            $data = Apbdesa::orderBy('tahun', 'desc')
                ->orderBy('bidang')
                ->paginate('15');

            // Hitung total (untuk <tfoot> di tabel)
            $totalAnggaran  = $data->sum('anggaran');
            $totalRealisasi = $data->sum('realisasi');
            $totalPersen    = $totalAnggaran > 0 ? round(($totalRealisasi / $totalAnggaran) * 100, 2) : 0;

            $totals = [
                'anggaran'  => $totalAnggaran,
                'realisasi' => $totalRealisasi,
                'persen'    => $totalPersen,
            ];

            return view('user.realisasi', [
                'title'  => 'APBDesa',
                'data'   => $data,
                'totals' => $totals,
            ]);
        }
    }

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
