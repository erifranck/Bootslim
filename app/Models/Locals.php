<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locals extends Model
{
  protected $table = 'Locals';

  protected $fillable = [

    'name',
    'phone',
    'address',
    'status',
    'slug',

  ];
}
