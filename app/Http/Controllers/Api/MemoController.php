<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Http\Requests\MemoRequest;
use App\Models\Memo;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $memos = Memo::all();
        return $memos;
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    public function store(MemoRequest $request)
    {
        //
        // インスタンスの作成
        $memo = new Memo;

        // 値の用意
        $memo->title = $request->title;
        $memo->body = $request->body;

        // インスタンスに値を設定して保存
        $memo->save();

        // 登録後のデータを返す(idが追加される)
        return $memo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Memoモデルから1件を取得
        $memo = Memo::find($id);
        return $memo;
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(MemoRequest $request, $id)
    {
        //
        // ここはidで探して持ってくる以外はstoreと同じ
        $memo = Memo::find($id);

        // 値の用意
        $memo->title = $request->title;
        $memo->body = $request->body;

        // 保存
        $memo->save();

        // 更新後のデータを返す
        return $memo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $memo = Memo::find($id);
        $memo->delete();
    }
}
