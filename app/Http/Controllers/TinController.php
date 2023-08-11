<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tin;
use Illuminate\Http\Request;

class TinController extends Controller
{
    public function index() {
        $tin = Tin::paginate(5);
        return view('tin', ['tin'=>$tin]);
    }
}
