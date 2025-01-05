<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    protected $fillable = [
        'name',
        'unit_letter_code'
    ];

    protected $appends = [
        'merge_unit'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getAttributesMergeUnit(): string
    {
        return $this->name . '(' . $this->unit_letter_code . ')';
    }
}
