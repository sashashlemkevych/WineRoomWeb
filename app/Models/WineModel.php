<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WineModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name','price','type','storage','vol','eat','temperature','short_description','description','image'];

    public function create()
    {
        return view('addwine_check');
    }
}
