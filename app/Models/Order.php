<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public const PAIL = 'paid';
    public const UN_PAIL = 'unpaid';
    public const CANCELED = 'canceled';

    protected $fillable = ['user_id', 'price', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
