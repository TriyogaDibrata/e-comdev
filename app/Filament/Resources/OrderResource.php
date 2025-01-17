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
                        Section::make('User Info')
                            ->schema([
                                Select::make('user_id')->label('User')
                                    ->relationship(name: 'user', titleAttribute: 'name')
                                    ->searchable()
                                    ->lazy()
                                    ->afterStateUpdated(function (Get $get, Set $set) {
                                        $user = User::find($get('user_id'));
                                        if ($user) {
                                            $set('phone', $user->phone);
                                            $set('email', $user->email);
                                        }
                                    }),
                                Forms\Components\TextInput::make('phone')
                                    ->label('Phone')
                                    ->readOnly()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
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
                                TextInput::make('total')
                                    ->label('Grand Total')
                                    ->numeric()
                                    ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 2)
                            ])->columnSpan(12)->collapsible()->collapsed(fn($record) => $record),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
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
                Tables\Actions\EditAction::make(),
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
