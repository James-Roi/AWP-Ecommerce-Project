<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stock()
    {
        return $this->has(Stock::class);
    }

    public function packages_product()
    {
        return $this->hasMany(PackagesProduct::class);
    }
}
