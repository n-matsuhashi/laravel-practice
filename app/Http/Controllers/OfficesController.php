<?php

namespace App\Http\Controllers;

use App\Models\Office;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class OfficesController extends Controller
{
    /**
     * 物件一覧
     * @return Application|Factory|View
     */
    public function index()
    {
        $offices = Office::all();
        return view('offices.index', ['offices' => $offices]);
    }

    /**
     * 物件詳細
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $office = Office::findorFail($id);
        return view('offices.show', ['office' => $office]);
    }

    /**
     * 物件登録
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('offices.create');
    }

}
