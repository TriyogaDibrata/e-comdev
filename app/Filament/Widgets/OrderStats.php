<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Order Hari Ini', Order::whereDate('created_at', Carbon::today())->count())
                ->description('Total pesanan masuk hari ini')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary'),

            Stat::make('Order Belum Proses', Order::where('status', '0')->count())
                ->description('Pesanan berstatus New')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Order Selesai', Order::where('status', '3')->count())
                ->description('Pesanan berstatus Finished')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),
        ];
    }
}