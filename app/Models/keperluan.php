<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class keperluan extends Model
{
    //
    use HasFactory, Notifiable, HasApiTokens;

    protected $timestamp = false;
    protected $guarded = ['id'];

    public function tamu() {
        return $this->hasMany(Tamu::class);
    }
}
