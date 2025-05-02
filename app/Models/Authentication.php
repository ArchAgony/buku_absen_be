<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Authentication extends Model
{
    //
    use hasFactory, Notifiable, HasApiTokens;

    protected $guarded = ['id'];
}
