<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionSelection extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'subscriptions_selections';

    public function meal()
    {
        return $this->hasOne(Meal::class, 'id', 'meal_id');
    }
}
