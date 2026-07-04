<?php

namespace App\Filament\Widgets;

use App\Models\OrderItem;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TopProductsChart extends ChartWidget
{
    protected static ?string $heading = '5 Produk Terlaris';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        // Mengambil 5 produk dengan total kuantitas terbanyak
        $topProducts = OrderItem::select('product_id', DB::raw('SUM(qty) as total_qty'))
            ->with('product') // Pastikan relasi product() ada di model OrderItem
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->limit(5)
            ->get();

        $data = [];
        $labels = [];

        foreach ($topProducts as $item) {
            // Jika relasi product tidak ditemukan, gunakan 'Produk Dihapus'
            $labels[] = $item->product ? $item->product->name : 'Produk Dihapus';
            $data[] = $item->total_qty;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Terjual',
                    'data' => $data,
                    'backgroundColor' => [
                        '#3b82f6', '#ef4444', '#f59e0b', '#10b981', '#8b5cf6'
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}