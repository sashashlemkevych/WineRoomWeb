<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = DB::select("SELECT * FROM orders WHERE iduser=?", [auth()->user()->id]);
        $towars = [];
        foreach ($orders as $order){
            $wines = collect(DB::select("SELECT basket.ID AS basketID, basket.counts AS bcount, wine_models.* FROM basket INNER JOIN wine_models ON wine_models.ID = basket.Idwine WHERE basket.ID = ? ",[$order->idbasket]))->toArray();
            $access = collect(DB::select("SELECT basket.ID AS basketID, basket.counts AS bcount, accessories.* FROM basket INNER JOIN accessories ON accessories.id = basket.isa WHERE basket.ID = ? ",[$order->idbasket]))->toArray();
            array_push($towars, array(
                'wines' => $wines,
                'access' => $access,
            ));
        }
//return dd($towars);
        return view('home', ['towars' => $towars]);
    }
}
