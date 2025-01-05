<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Master Product';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Product Details')
                    ->tabs([
                        Tab::make('General')
                            ->schema([
                                TextInput::make('name')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' || 'edit' ? $set('slug', Str::slug($state)) : null),
                                TextInput::make('slug')
                                    ->readOnly()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Product::class, 'slug', ignoreRecord: true),
                                Select::make('category_id')
                                    ->label('Category')
                                    ->options(ProductCategory::all()->pluck('name', 'id'))
                                    ->searchable()
                                    ->preload(),
                                Select::make('unit_id')
                                    ->label('Units')
                                    ->options(Unit::all()->pluck('name', 'id'))
                                    ->searchable()
                                    ->preload(),
                                RichEditor::make('description')->columnSpanFull()
                                    ->toolbarButtons([
                                        'blockquote',
                                        'bold',
                                        'bulletList',
                                        'codeBlock',
                                        'h2',
                                        'h3',
                                        'italic',
                                        'link',
                                        'orderedList',
                                        'strike',
                                        'underline',
                                    ]),
                                TextInput::make('price_per_unit')
                                    ->prefix('IDR')
                                    ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 2),
                                Select::make('stock_status')
                                    ->options([
                                        1 => 'In stocks',
                                        0 => 'Out of stocks'
                                    ])->preload()->searchable()
                            ])->columns(2),
                        Tab::make('Images')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('images')
                                    ->multiple()
                                    ->panelLayout('grid')
                            ])
                    ])
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('category.name')
                    ->searchable(),
                TextColumn::make('price_per_unit')->currency('IDR')->label('Price'),
                TextColumn::make('unit.name')->label('Units'),
                TextColumn::make('stock_status')->badge()->color(fn(int $state): string => match ($state) {
                    1 => 'success',
                    0 => 'danger'
                })->formatStateUsing(fn(int $state) => match ($state) {
                    1 => 'In Stocks',
                    0 => 'Out of Stocks'
                }),
                SpatieMediaLibraryImageColumn::make('media')->label('Images')->circular()->stacked()->limit(2)
            ])
            ->filters([
                SelectFilter::make('category_id')->label('Category')
                    ->options(fn(): array => ProductCategory::query()->pluck('name', 'id')->all())
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
