<?php

namespace App\Filament\Exports;

use App\Models\Order;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class OrderExporter extends Exporter
{
    protected static ?string $model = Order::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('ticket')
                ->label('No. Tiket'),
            ExportColumn::make('user.name') // Asumsi model User memiliki field 'name'
                ->label('Nama Pelanggan'),
            ExportColumn::make('status')
                ->label('Status Pesanan'),
            ExportColumn::make('payment_status')
                ->label('Status Pembayaran'),
            ExportColumn::make('paymentMethod.name') // Asumsi model PaymentMethod memiliki field 'name'
                ->label('Metode Pembayaran'),
            ExportColumn::make('total')
                ->label('Total'),
            ExportColumn::make('tax')
                ->label('Pajak'),
            ExportColumn::make('grand_total')
                ->label('Grand Total'),
            ExportColumn::make('created_at')
                ->label('Tanggal Transaksi')
                ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->format('d M Y H:i') : '')
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Laporan penjualan Anda telah selesai diekspor dan memiliki ' . number_format($export->successful_rows) . ' baris data.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' Terdapat ' . number_format($failedRowsCount) . ' baris data yang gagal diekspor.';
        }

        return $body;
    }
}