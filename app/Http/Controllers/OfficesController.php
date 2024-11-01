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
     * @return Application|Factory|View
     */
    public function index()
    {
        $offices = Office::all();
        return view('offices.index', compact('offices'));
    }

    /**
     * 物件詳細
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $office = Office::findorFail($id);
        return view('offices.show', compact('office'));
    }

    /**
     * 物件登録
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('offices.create');
    }

    /**
     * 物件編集
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $office = Office::findorFail($id);
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

        (new office())->registerOffice(
            $request->only('name', 'address', 'post_code', 'stair', 'comment')
        );

        return redirect()->route('offices.index');
    }

    /**
     * 物件更新処理
     * @param OfficeUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(OfficeUpdateRequest $request, int $id): RedirectResponse
    {
        Office::updateOffice(
            $id,
            $request->only('name', 'address', 'post_code', 'stair', 'comment')
        );

        return redirect()->route('offices.index');
    }

    /**
     * 物件削除処理
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Office::findorFail($id)->delete();

        return redirect()->route('offices.index');
    }

}
