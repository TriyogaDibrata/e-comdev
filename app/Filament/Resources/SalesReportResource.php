<?php

namespace App\Filament\Resources;

use App\Filament\Exports\OrderExporter;
use App\Filament\Resources\SalesReportResource\Pages;
use App\Models\Order; // 1. Tambahkan use statement untuk model Order
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\SelectFilter;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class SalesReportResource extends Resource
{
    // 2. Ubah dari SalesReport::class menjadi Order::class
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Sales Reports';
    protected static ?string $slug = 'laporan-penjualan';
    protected static ?string $navigationGroup = 'Reports';
    protected static ?string $pluralLabel = 'Sales Reports';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ticket')
                    ->label('Tiket')
                    ->searchable()
                    ->sortable()
                    ->color('primary')
                    ->url(fn(Order $record): string => OrderResource::getUrl('edit', ['record' => $record]))
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pelanggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status Pesanan')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        '0' => 'New',
                        '1' => 'Process',
                        '2' => 'Delivering',
                        '3' => 'Finished',
                        '4' => 'Canceled',
                        default => $state,
                    })
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'gray',
                        '1' => 'warning',
                        '2' => 'info',
                        '3' => 'success',
                        '4' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_status')
                    ->label('Status Pembayaran')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        '0' => 'Unconfirmed',
                        '1' => 'Confirmed',
                        default => $state,
                    })
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'warning',
                        '1' => 'success',
                        default => 'gray',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('grand_total')
                    ->label('Grand Total')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                // Filter berdasarkan rentang tanggal
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('Mulai Tanggal'),
                        Forms\Components\DatePicker::make('created_until')->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
                SelectFilter::make('status')
                    ->label('Status Pesanan')
                    ->options([
                        '0' => 'New',
                        '1' => 'Process',
                        '2' => 'Delivering',
                        '3' => 'Finished',
                        '4' => 'Canceled',
                    ]),

                // 3. Filter Status Pembayaran
                SelectFilter::make('payment_status')
                    ->label('Status Pembayaran')
                    ->options([
                        '0' => 'Unconfirmed',
                        '1' => 'Confirmed',
                    ]),
            ])
            ->headerActions([
                ExportAction::make('export_excel')
                    ->label('Export Excel')
                    ->color('success')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->exports([
                        ExcelExport::make('Laporan Penjualan')->fromTable()->withFilename(now()->format('Y-m-d_H-i-s') . '_laporan-penjualan.xlsx')
                    ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    // Menonaktifkan fungsi Create untuk halaman laporan
    public static function canCreate(): bool
    {
        return false;
    }

    // Menonaktifkan fungsi Edit
    public static function canEdit($record): bool
    {
        return false;
    }

    // Menonaktifkan fungsi Delete
    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSalesReports::route('/'),
        ];
    }
}
