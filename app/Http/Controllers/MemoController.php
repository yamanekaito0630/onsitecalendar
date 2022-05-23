<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    /**
     * メモ追加
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $memo = Memo::query()
            ->where('user_id', Auth::id())
            ->where('date', 'like', $request->input('date'))
            ->first();

        if (is_null($memo)) {
            $memo = new Memo();
            $memo->user_id = Auth::id();
            $memo->date = $request->input('date');
        }
        $memo->memo = $request->input('memo');
        $memo->save();

        // 管理画面からメモを追加された場合
        if (!empty($request->input('is-admin'))){
            return redirect()->route('admin.my-page', $request->input('group-id'));
        }

        // グループ画面からメモを追加された場合
        if (!empty($request->input('group-id'))) {
            return redirect()->route('group.my-page', $request->input('group-id'));
        }
        return redirect()->route('my-page', $request->input('group-id'));
    }
}
