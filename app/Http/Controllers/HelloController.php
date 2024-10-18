<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HelloController extends Controller
{
    public function index(): View
    {
        $item = "りんご";

        return view('hello', ['item' => $item]);
    }
}
