<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name','price','type','image','count', 'country', 'volume'];
    public function create()
    {
        return view('addAccessories_check');
    }
}
