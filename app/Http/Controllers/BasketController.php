<?php

namespace App\Http\Controllers;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers;
use ArrayObject;
use DateTime;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Logger\ConsoleLogger;

class BasketController extends Controller
{
    public function addToBasket($id, Request $request)
    { if( auth()->user() == NULL){
        return redirect()->route('login');
    }
        $tmp = (new DateTime())->format('His');
        if ($request->cookie('id') == NULL) {
            DB::insert("INSERT INTO orders(idbasket,iduser, created, create_at) VALUES(?,?,?,?)", [$tmp,auth()->user()->id, false, new \DateTime()]);
            DB::insert("INSERT INTO basket(ID,idwine,isa,counts) VALUES(?,?,?,?)", [$tmp, $id, NULL, $request->input('Count')]);
            return redirect()->route('moredetalis_id', [$id])->withCookie(cookie('id', $tmp, 30));
        } else {
            $basket = DB::select("SELECT * FROM basket WHERE ID = ?", [$request->cookie('id')]);
            $add = true;
            foreach ($basket as $el) {
                if ($el->idwine == $id && $el->isa == false) {
                    DB::update("UPDATE basket SET counts = counts + ? WHERE ID = ? AND idwine = ?", [$request->input('Count'), $request->cookie('id'), $id]);
                    $add = false;
                    break;
                }

            }
            if ($add) DB::insert("INSERT INTO basket(ID,idwine,isa,counts) VALUES(?,?,?,?)", [$request->cookie('id'), $id, NULL,$request->input('Count')]);
            return redirect()->route('moredetalis_id', [$id]);
        }

    }

    public function addToBasketAcc($id, Request $request)
    {
        $tmp = (new DateTime())->format('His');
        if ($request->cookie('id') == NULL) {
            DB::insert("INSERT INTO orders(idbasket,iduser, created, create_at) VALUES(?,?,?,?)", [$tmp,auth()->user()->id, false, new \DateTime()]);
            DB::insert("INSERT INTO basket(ID,idwine,isa,counts) VALUES(?,?,?,?)", [$tmp, NULL, $id, $request->input('Count')]);
            return redirect()->route('moreAccessories_id', [$id])->withCookie(cookie('id', $tmp, 30));
        } else {
            $basket = DB::select("SELECT * FROM basket WHERE ID = ?", [$request->cookie('id')]);
            $add = true;
            foreach ($basket as $el) {
                if ($el->idwine == $id && $el->isa == true) {
                    DB::update("UPDATE basket SET counts = counts + ? WHERE ID = ? AND isa = ?", [$request->input('Count'), $request->cookie('id'), $id]);
                    $add = false;
                    break;
                }

            }
            if ($add) DB::insert("INSERT INTO basket(ID,idwine,isa,counts) VALUES(?,?,?,?)", [$request->cookie('id'), NULL, $id, $request->input('Count')]);
            return redirect()->route('moreAccessories_id', [$id]);
        }

    }

    public function deleteBasket($id, Request $request)
    {
        DB::delete("DELETE FROM basket WHERE ID = ? AND idwine = ? ", [$request->cookie('id'), $id]);
        return redirect()->route('basket');

    }

    public function deleteBasketA($id, Request $request)
    {
        DB::delete("DELETE FROM basket WHERE ID = ? AND isa = ?", [$request->cookie('id'), $id]);
        return redirect()->route('basket');

    }

/*public function orderview(Request $request){
        $frst = DB::select("SELECT basket.ID AS basketID, basket.counts AS bcount, wine_models.*  FROM basket INNER JOIN wine_models ON wine_models.id = basket.idwine  WHERE basket.ID = ?",[$request->cookie('id')]);
        $tmp = true;

        foreach ($frst as $el){
            if($el->bcount <= $el->count) {
                DB::update("UPDATE wine_models SET count = count - ? WHERE id = ?", [$el->bcount, $el->id]);
                $tmp = false;
            }
        }
        if($tmp) {
            Log::info('count error');
            echo "<script>window.alert('Кількість товару в корзині більше ніж в наявності!')</script>";
        }
        else {
            $validator = Validator::make($request->all(), [
                'PIB' => 'required|max:50',
                'email' => 'required|max:50',
                'phone' => 'required|max:12',
                'address' => 'required|max:50',
            ]);
            if ($validator->fails()) {
                return redirect()->route('add')
                    ->withErrors($validator)
                    ->withInput();
            }
            foreach($frst as $el){
                for($i=0;$i<$el->bcount;$i++){
                    DB::insert("INSERT INTO orders(PIB, email, phone, address, basketid) VALUES(?,?,?,?,?)",[$request->input('PIB'),$request->input('email'),$request->input('phone'),$request->input('address'),$el->id]);
                }
            }

            DB::delete("DELETE FROM basket WHERE ID =?",[$request->cookie('id')]);
        }
        return redirect()->route('main');
    }*/
}
