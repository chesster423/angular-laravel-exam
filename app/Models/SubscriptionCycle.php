<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionCycle extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'subscriptions_cycles';

    public function selections()
    {
        return $this->hasMany(SubscriptionSelection::class, 'subscription_cycle_id', 'id');
    }
}
