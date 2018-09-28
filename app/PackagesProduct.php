<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagesProduct extends Model
{
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
