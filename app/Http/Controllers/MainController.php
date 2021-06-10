<?php

namespace App\Http\Controllers;
use App\Models\Accessories;
use App\Models\Contact;
use App\Models\WineModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function main(){
        $isadmin = false;
        if(Auth::user()) {
            $email = Auth::user()->email;
            $admin_email = env('admin_user_email');
            $isadmin = $admin_email == $email;
        }
        $mains = new WineModel();
        return view('main', ['mains' => $mains->all(),'isadmin'=>$isadmin]);
    }

    public function about_check(Request $request){
        $valid = $request->validate([
            'name'=>'required|min:5|max:30',
            'phone'=>'required|min:10|max:14',
            'email'=>'required|min:5|max:50',
            'massage'=>'required|min:5|max:500',

        ]);
        $review = new Contact();
        $review ->name = $request->input('name');
        $review ->phone = $request->input('phone');
        $review ->email = $request->input('email');
        $review ->massage = $request->input('massage');

        $review->save();
return redirect()->route('about');
    }

    public function about(){
        return view('about');
    }
    public function infoContact(){
        $abouts = new Contact();
        return view('infoContact', ['abouts' => $abouts->all()]);
    }

    public function addwine(){
        return view('addwine');
    }

    public function addAccessories(){
        return view('addAccessories');
    }

    public function Accessories(){
        $access = new Accessories();
        return view('Accessories', ['access' => $access->all()]);
    }

    public function addAccessories_check(Request $request){
        $valid = $request->validate([
            'name'=>'required|min:5|max:50',
            'price'=>'required|min:2|max:14',
            'type'=>'required|',
            'country'=>'required|min:5|max:100',
            'volume'=>'required|min:1|max:10',
            'count'=>'required|min:1|max:100',

            'image'=>'required',

        ]);
        $review = new Accessories();
        $review ->name = $request->input('name');
        $review ->price = $request->input('price');
        $review ->type = $request->input('type');
        $review ->country = $request->input('country');
        $review ->volume = $request->input('volume');
        $review ->count = $request->input('count');

        if ($request->hasFile('image')) {
            $photo_file = $request->file("image");
            $photo = $photo_file->openFile()->fread($photo_file->getSize());
            $review->image = $photo;
        }

        $review->save();
        return redirect()->route('addAccessories');
    }

    public function UpdateInfo($id){
        $info = DB::select("SELECT * FROM wine_models WHERE id =?",[$id])[0];
        return view('UpdateInfo',['el'=>$info]);
    }

    public function UpdateAccessories($id){
        $info = DB::select("SELECT * FROM accessories WHERE id =?",[$id])[0];
        return view('UpdateAccessories',['el'=>$info]);
    }

    public function basket(Request $request){
        $wines = DB::select("SELECT basket.ID AS basketID, basket.counts AS bcount, wine_models.* FROM basket INNER JOIN wine_models ON wine_models.ID = basket.Idwine WHERE basket.ID = ? and basket.isa = false ",[$request->cookie('id')]);

        $access = DB::select("SELECT basket.ID AS basketID, basket.counts AS bcount, accessories.* FROM basket INNER JOIN accessories ON accessories.id = basket.Idwine WHERE basket.ID = ? and basket.isa = true",[$request->cookie('id')]);

        return view('basket', ['wines'=>isset($wines)?$wines:NULL,'access'=>isset($access)?$access:NULL]);
    }

        public function search(Request $request){
            $search = $request->search;
            $wine = DB::select("SELECT * FROM wine_models WHERE name LIKE '%$search%'");
            return view('main', ['product'=>$wine]);
        }

    public function bokal(Request $request){
        $bokal = $request->bokal;
        $acc = DB::select("SELECT * FROM Accessories WHERE type='Бокал'");
        return view('Accessories', ['access'=>$acc]);
    }

    public function upakov(Request $request){
        $upakov = $request->upakov;
        $acc = DB::select("SELECT * FROM Accessories WHERE type='Упаковка'");
        return view('Accessories', ['access'=>$acc]);
    }

    public function dekan(Request $request){
        $dekan = $request->dekan;
        $acc = DB::select("SELECT * FROM Accessories WHERE type='Декантер'");
        return view('Accessories', ['access'=>$acc]);
    }

    public function moredetalis_id($id){
        $info = DB::select("SELECT * FROM wine_models WHERE id = ?",[$id]);
        return view('moredetalis',['mains'=>$info]);
    }

    public function moreAccessories_id($id){
        $info = DB::select("SELECT * FROM Accessories WHERE id = ?",[$id]);
        return view('moreAccessories',['access'=>$info]);
    }

    public function addwine_check(Request $request ){
      $valid = $request->validate([
          'name'=>'required|min:5|max:30',
          'price'=>'required|min:2|max:25',
          'type'=>'required|min:5|max:25',
          'storage'=>'required|min:5|max:200',
          'strength'=>'required|min:5|max:25',
          'eat'=>'required|min:5|max:100',
          'temperature'=>'required|min:5|max:50',
          'short_description'=>'required|min:5|max:100',
          'description'=>'required|min:15|max:500',
          'count'=>'required|min:1|max:100|',
          'country'=>'required|min:1|max:100|',
          'volume'=>'required|min:1|max:100|',

          'image'=>'required',

      ]);

      $review = new WineModel();
      $review ->name = $request->input('name');
      $review ->price = $request->input('price');
      $review ->type = $request->input('type');
      $review ->storage = $request->input('storage');
      $review ->strength = $request->input('strength');
      $review ->eat = $request->input('eat');
      $review ->temperature = $request->input('temperature');
      $review ->short_description = $request->input('short_description');
      $review ->description = $request->input('description');
      $review->count=$request->input('count');
      $review->country=$request->input('country');
        $review->volume=$request->input('volume');

        if ($request->hasFile('image')) {
            $photo_file = $request->file("image");
            $photo = $photo_file->openFile()->fread($photo_file->getSize());
            $review->image = $photo;
        }

      $review->save();

      return redirect()->route('addwine');
    }

    public function UpdateWine(Request $request, $id){

        $valid = $request->validate([
            'name'=>'required|min:5|max:30',
            'price'=>'required|min:2|max:25',
            'type'=>'required|min:5|max:25',
            'storage'=>'required|min:5|max:200',
            'strength'=>'required|min:1|max:25',
            'eat'=>'required|min:5|max:150',
            'temperature'=>'required|min:5|max:50',
            'short_description'=>'required|min:5|max:100',
            'description'=>'required|min:15|max:500',
            'count'=>'required|min:1|max:100|',
            'country'=>'required|min:1|max:100|',
            'volume'=>'required|min:1|max:100|',
        ]);

        DB::update("UPDATE wine_models SET name = ?, price = ?, type = ?, storage = ?, strength = ?, eat = ? , temperature = ?, short_description = ?, description = ?, count = ?, country = ?, volume = ? WHERE id = ?
        ",[$request->input('name'),$request->input('price'),$request->input('type')
            ,$request->input('storage'),$request->input('strength'),$request->input('eat'),$request->input('temperature'),$request->input('short_description'),
            $request->input('description'),$request->input('count'),$request->input('country'),$request->input('volume'),$id]);

        if ($request->file('image')) DB::update("UPDATE wine_models SET image = ? WHERE id = ?", [$request->file('image')->openFile()->fread($request->file('image')->getSize()),$id]);

        return redirect()->route('main');
    }

    public function UpdateAccessoriesInfo(Request $request, $id){

        $valid = $request->validate([
            'name'=>'required|min:5|max:50',
            'price'=>'required|min:2|max:14',
            'type'=>'required|',
            'country'=>'required|min:5|max:100',
            'volume'=>'required|min:1|max:10',
            'count'=>'required|min:1|max:100',

        ]);

        DB::update("UPDATE accessories SET name = ?, price = ?, type = ?, count = ?, country = ?, volume = ? WHERE id = ?",
            [$request->input('name'),$request->input('price'),$request->input('type'),
            $request->input('count'),$request->input('country'),$request->input('volume'),$id]);

        if ($request->file('image')) DB::update("UPDATE accessories SET image = ? WHERE id = ?", [$request->file('image')->openFile()->fread($request->file('image')->getSize()),$id]);

        return redirect()->route('Accessories');
    }

    public function deleteWine($id){
        DB::delete("DELETE FROM wine_models WHERE id = ?",[$id]);
        return redirect()->route('main');
    }

    public function deleteAccessories($id)
    {
        DB::delete("DELETE FROM accessories WHERE id = ?", [$id]);
        return redirect()->route('Accessories');
    }

    public function deleteContact($id){
        DB::delete("DELETE FROM contacts WHERE id = ?",[$id]);
        return redirect()->route('infoContact');
    }
}
