<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function structure()
    {
        return $this->hasOne(ProductStructure::class, 'product_id', 'id');
    }

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }
}
