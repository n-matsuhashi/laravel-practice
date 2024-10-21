<?php

namespace App\Http\Controllers;

use App\Models\Office;

use Illuminate\View\View;

class OfficesController extends Controller
{
    /**
     * 物件一覧
     * @return View
     */
    public function index(): View
    {
        $offices = Office::all();
        return view('offices.index', ['offices' => $offices]);
    }

    /**
     * 物件詳細
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $office = Office::findorFail($id);
        return view('offices.show', ['office' => $office]);
    }
}
