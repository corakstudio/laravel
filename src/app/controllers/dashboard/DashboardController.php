<?php

namespace CorakStudio\Rising\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function add($a, $b){
    	$result = $a + $b;
		return view('Rising::dashboard', compact('result'));
    }
}
