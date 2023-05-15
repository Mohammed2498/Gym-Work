<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $table = 'subscribers';
    protected $fillable = ['name', 'image', 'phone'];


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'subscriber_id', 'id')->withDefault();
    }
}
