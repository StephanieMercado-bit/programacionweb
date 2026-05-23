<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cocinero extends Model
{
    protected $table = 'cocinero';
    public $timestamps = false;
    protected $fillable = ['id_usuario'];
}