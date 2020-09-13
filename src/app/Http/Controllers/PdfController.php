<?php

namespace App\Http\Controllers;

use PDF;
use App\Restaurant;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function showEmployees(){
        $restaurant = Restaurant::all();
        return view('restaurant.index', compact('restaurant'));
    }

}
