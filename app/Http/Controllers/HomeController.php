<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Random;
use App\Models\Breakdown;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    //
   
    public function index()
    {
        $random = Random::latest()->get();
        return $random;
    }    
    public function RandomName(){
         for($i=1,$i_max = rand(5,10); $i<=$i_max;$i++){
            $random = Str::random(10); 
            $random_id =  Random::create([
                'values' => $random,
                'created_at' => Carbon::now(),
            ]);
            for($y=1,$j_max = rand(5,10); $y<=$j_max;$y++){
               $alphanumeric = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 5); 
               Breakdown::insert([
                'values' => $alphanumeric,
                'random_id' => $random_id->id,
                'created_at' => Carbon::now(),
                 
            ]);
            }
         }        
    }
    public function delete($id){
        $delete = Random::find($id)->delete();
        return Redirect()->back()->with('success','Category Deleted Successfull');
    }
    public function DisplayBreakdown($id){
        $randoms  = Random::find($id);
        return $randoms->breakdowns;


    }
}
