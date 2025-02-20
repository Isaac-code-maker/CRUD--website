<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depoimento extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'relato', 'nota'];
}
