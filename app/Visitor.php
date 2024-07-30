<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visitor extends Model
{
    protected $table = 'visitors';
    protected $fillable = ['ip_address', 'visited_at'];
    public $timestamps = false;
    
    public static function getTotalVisitors()
    {
        $totalVisitors = DB::table('visitors')->count();
        return $totalVisitors;
    }
}
