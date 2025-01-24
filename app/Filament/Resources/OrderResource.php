<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'sm' => 1,
                    'lg' => 12
                ])
                    ->schema([
                        Section::make('Customer')
                            ->schema([
                                Select::make('user_id')->label('User')
                                    ->relationship(name: 'user', titleAttribute: 'name')
                                    ->searchable()
                                    ->lazy(),
                                Forms\Components\TextInput::make('shipping_address')
                                    ->label('Address')
                                    ->readOnly()
                                    ->maxLength(255),
                            ])->columnSpan(12)->collapsible()->collapsed(fn($record) => $record),
                        Section::make('Order Items')
                            ->schema([
                                Repeater::make('orderItems')
                                    ->hiddenLabel()
                                    ->relationship()
                                    ->schema([
                                        Select::make('product_id')
                                            ->label('Product')
                                            ->options(Product::where('stock_status', 1)->pluck('name', 'id')->toArray())
                                            ->live()
                                            ->searchable()
                                            ->afterStateUpdated(function (Get $get, Set $set) {
                                                $product = Product::find($get('product_id'));
                                                $set('price', $product->price_per_unit);
                                            })->columnSpan(4),
                                        TextInput::make('qty')
                                            ->label('Qty')
                                            ->numeric()
                                            ->default(0)
                                            ->live()
                                            ->afterStateUpdated(function (Get $get, Set $set) {
                                                $product = Product::find($get('product_id'));
                                                $subtotal = $get('price') * $get('qty');
                                                $set('total', $subtotal);
                                            })
                                            ->columnSpan(2),
                                        TextInput::make('price')
                                            ->prefix('IDR')
                                            ->readOnly()
                                            ->numeric()
                                            ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 2)
                                            ->columnSpan(3),
                                        TextInput::make('total')
                                            ->label('Subtotal')
                                            ->prefix('IDR')
                                            ->readOnly()
                                            ->numeric()
                                            ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 2)
                                            ->columnSpan(3),
                                    ])->columns(12)
                                    ->lazy()
                                    ->afterStateUpdated(function (Get $get, Set $set) {
                                        $items = $get('orderItems');
                                        $total = 0;
                                        foreach ($items as $orderItem) {
                                            $product = Product::find($orderItem['product_id']);
                                            if ($product) {
                                                $total += $product->price_per_unit * $orderItem['qty'];
                                            }
                                        }

                                        $set('total', $total);
                                    })
                            ])->columnSpan(12)->collapsible(),
                        Section::make('Summary')
                            ->schema([
                                Select::make('payment_method')->label('Payment Method')
                                    ->relationship(name: 'paymentMethod', titleAttribute: 'name')
                                    ->searchable()
                                    ->lazy(),
                                TextInput::make('total')
                                    ->label('Total Price')
                                    ->numeric()
                                    ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 2),
                                TextInput::make('tax')
                                    ->label('Tax(11%)')
                                    ->numeric()
                                    ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 2),
                                TextInput::make('grand_total')
                                    ->label('Grand Total')
                                    ->numeric()
                                    ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 2),
                            ])->columnSpan(12)->collapsible()->collapsed(fn($record) => $record),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Order::query()->orderBy('created_at', 'desc'))
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Customer')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')->label('Order Status')->badge()->color(fn(int $state): string => match ($state) {
                    0 => 'warning',
                    1 => 'info',
                    2 => 'gray',
                    3 => 'success',
                    4 => 'danger'
                })->formatStateUsing(fn(int $state) => match ($state) {
                    0 => 'Pending',
                    1 => 'Process',
                    2 => 'Delivering',
                    3 => 'Finished',
                    4 => 'Cancled'
                })
                    ->icon(fn(int $state) => match ($state) {
                        0 => 'heroicon-o-clock',
                        1 => 'heroicon-o-clock',
                        2 => 'heroicon-o-truck',
                        3 => 'heroicon-o-check-circle',
                        4 => 'heroicon-o-x-circle'
                    }),
                Tables\Columns\TextColumn::make('payment_status')->label('Payment Status')->badge()->color(fn(int $state): string => match ($state) {
                    0 => 'warning',
                    1 => 'success',
                })->formatStateUsing(fn(int $state) => match ($state) {
                    0 => 'Pending',
                    1 => 'Confirmed',
                })
                    ->icon(fn(int $state) => match ($state) {
                        0 => 'heroicon-o-clock',
                        1 => 'heroicon-o-check-circle',
                    }),
                Tables\Columns\TextColumn::make('grand_total')->currency('IDR')->label('Total'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                    Action::make('Confirm Payment')
                        ->action(function (Order $record): void {
                            $record->payment_status = 1;
                            $record->save();
                        })
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->visible(function (Order $record) {
                            return $record->payment_status === 0;
                        }),
                    Action::make('updateStatus')
                        ->label('Update Order Status')
                        ->fillForm(fn(Order $record): array => [
                            'status' => $record->status,
                        ])
                        ->form([
                            Select::make('status')
                                ->label('Status')
                                ->options([
                                    0 => "Pending",
                                    1 => "Confirm",
                                    2 => "Delivering",
                                    3 => "Finished",
                                    4 => "Cancled"
                                ])
                                ->preload()
                                ->searchable()
                                ->required(),
                        ])
                        ->action(function (array $data, Order $record): void {
                            $record->status = $data['status'];
                            $record->save();
                        })
                        ->icon('heroicon-o-check-circle')
                        ->color('primary')
                ])->button()
                    ->label('Actions')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
