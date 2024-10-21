<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HelloController extends Controller
{
    public function index(): View
    {
        $controllerItem = "hogehoge";

        return view('hello', ['viewItem' => $controllerItem]);
    }
}
