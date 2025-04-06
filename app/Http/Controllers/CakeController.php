<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;

class CakeController extends Controller
{
    public function index() {
        $cakes = Cake::where("name", "тирамису")->first();
//        foreach($cakes as $cake) {
//            dump($cake->toArray());
//        }
        dump($cakes->toArray());
    }
}
