<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    protected $fillable = ['body'];

}

// Properti $fillable ini memastikan kolom body dapat diisi secara mass assignment, 
//sehingga Laravel mengizinkan input body dari formulir untuk langsung disimpan ke database.
