<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tamu extends Model
{
    //
    use HasFactory, Notifiable, HasApiTokens;

    protected $guarded = ['id'];

    public function keperluan() {
        return $this->belongsTo(keperluan::class);
    }
}
