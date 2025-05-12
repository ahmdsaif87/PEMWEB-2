<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use hasFactory;
    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo(Categories::class, 'product_category_id');
    }
}
