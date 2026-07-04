<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class SalesTrendChart extends ChartWidget
{
    protected static ?string $heading = 'Tren Penjualan (7 Hari Terakhir)';
    protected static ?int $sort = 2; // Urutan tampilan di dashboard

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            
            $totalSales = Order::whereDate('created_at', $date->toDateString())
                ->where('status', '3')
                ->sum('grand_total');

            $data[] = $totalSales;
            $labels[] = $date->format('d M');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Pendapatan (Rp)',
                    'data' => $data,
                    'fill' => 'start',
                    'borderColor' => '#10b981', // Warna hijau
                    'backgroundColor' => 'rgba(16, 185, 129, 0.2)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}