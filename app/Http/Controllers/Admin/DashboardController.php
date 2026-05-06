<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Pesanan, Produk, User};

class DashboardController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $stats = [
            'total_pesanan' => Pesanan::count(),
            'pesanan_hari_ini' => Pesanan::whereDate('created_at', today())->count(),
            'total_produk' => Produk::count(),
            'stok_menipis' => Produk::where('stok', '<=', 10)->count(),
            'total_customer' => User::where('role', 'customer')->count(),
            'pendapatan_bulan' => Pesanan::where('status', 'selesai')
                ->whereMonth('created_at', now()->month)->sum('total_harga'),
        ];

        $periode = $request->get('periode', 7);
        if ($periode != 30 && $periode != 7) {
            $periode = 7;
        }
        $periode_aktif = (int) $periode;

        if ($periode === 7) {
            $tren = collect(range(6, 0))->map(function ($i) {
                $tanggal = now()->subDays($i);
                return [
                    'label' => $tanggal->translatedFormat('D'),
                    'tanggal' => $tanggal->format('d M'),
                    'pendapatan' => Pesanan::whereDate('created_at', $tanggal)
                        ->whereIn('status', ['selesai', 'dikirim', 'diproses'])
                        ->sum('total_harga'),
                    'pesanan' => Pesanan::whereDate('created_at', $tanggal)->count(),
                    'is_today' => $tanggal->isToday(),
                ];
            });
        } else {
            $tren = collect();
            for ($week = 3; $week >= 0; $week--) {
                $endDate = now()->subWeeks($week);
                $startDate = $endDate->copy()->subDays(6);

                $tren->push([
                    'label' => 'Minggu ke-' . ($week + 1),
                    'tanggal' => $startDate->format('d M') . ' - ' . $endDate->format('d M'),
                    'pendapatan' => Pesanan::whereBetween('created_at', [
                        $startDate->copy()->startOfDay(),
                        $endDate->copy()->endOfDay()
                    ])
                        ->whereIn('status', ['selesai', 'dikirim', 'diproses'])
                        ->sum('total_harga'),
                    'pesanan' => Pesanan::whereBetween('created_at', [
                        $startDate->copy()->startOfDay(),
                        $endDate->copy()->endOfDay()
                    ])->count(),
                    'is_today' => false,
                ]);
            }
        }

        $query = Pesanan::with('user');

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('kode_pesanan', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('filter_date')) {
            $filterDate = $request->get('filter_date');
            $query->whereDate('created_at', $filterDate);
        }

        $pesananTerbaru = $query->latest()->take(5)->get();
        $produkStokSedikit = Produk::where('stok', '<=', 10)->where('aktif', true)->get();

        return view('admin.dashboard', compact(
            'stats',
            'tren',
            'pesananTerbaru',
            'produkStokSedikit',
            'periode_aktif'
        ));
    }
}