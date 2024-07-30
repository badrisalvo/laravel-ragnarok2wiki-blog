<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueCode extends Model
{

    protected $fillable = ['code', 'used'];
}
