<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfficeStoreRequest;
use App\Http\Requests\OfficeUpdateRequest;
use App\Models\Office;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OfficesController extends Controller
{
    /**
     * 物件一覧
     * @return Factory|View
     */
    public function index()
    {
        $offices = Office::all();
        return view('offices.index', compact('offices'));
    }

    /**
     * 物件詳細
     * @param Office $office
     * @return Application|Factory|View
     */
    public function show(Office $office)
    {
        return view('offices.show', compact('office'));
    }

    /**
     * 物件登録
     * @return Factory|View
     */
    public function create()
    {
        return view('offices.create');
    }

    /**
     * 物件編集
     * @param Office $office
     * @return Factory|View
     */
    public function edit(Office $office)
    {
        return view('offices.edit', compact('office'));
    }

//    /**
//     * 物件登録処理(ajax)
//     * @param OfficeStoreRequest $request
//     * @return  JsonResponse
//     */
//    public function store(OfficeStoreRequest $request)
//    {
//        (new Office)->registerOffice(
//            $request->only('name', 'address', 'post_code', 'stair', 'comment')
//        );
//
//        return response()->json(['message' => '登録しました']);
//    }

    /**
     * 物件登録処理
     * @param OfficeStoreRequest $request
     * @return RedirectResponse
     */
    public function store(OfficeStoreRequest $request): RedirectResponse
    {

        Office::registerOffice(
            $request->safe(['name', 'address', 'post_code', 'stair', 'comment'])
        );

        return redirect()->route('offices.index');
    }

    /**
     * 物件更新処理
     * @param OfficeUpdateRequest $request
     * @param Office $office
     * @return RedirectResponse
     */
    public function update(OfficeUpdateRequest $request, Office $office): RedirectResponse
    {
        Office::updateOffice(
            $office,
            $request->safe(['name', 'address', 'post_code', 'stair', 'comment'])
        );

        return redirect()->route('offices.index');
    }

    /**
     * 物件削除処理
     * @param Office $office
     * @return RedirectResponse
     */
    public function destroy(Office $office): RedirectResponse
    {
        $office->delete();
        return redirect()->route('offices.index');
    }

}
