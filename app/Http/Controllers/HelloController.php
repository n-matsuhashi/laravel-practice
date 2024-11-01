<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HelloController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $controllerItem = "hogehoge";

        return view('hello', ['viewItem' => $controllerItem]);
    }
}
