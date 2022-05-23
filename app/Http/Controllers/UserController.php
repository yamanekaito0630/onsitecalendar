<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Models\UserOnsite;
use App\Models\dailyAllowance;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * ユーザートップページ
     *
     * @return View
     */
    public function index(): View
    {
        return view('users.mypage');
    }

    /**
     * カレンダーに表示する現場の取得
     *
     * @return Collection
     */
    public function getOnsite(): Collection
    {
        return UserOnsite::query()
            ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
            ->where('user_id', Auth::id())
            ->select(
                'name as title',
                'date as start'
            )->get();
    }

    /**
     * 日程詳細画面
     *
     * @param Request $request
     * @return View
     */
    public function detail(Request $request): View
    {
        $res = $request->all();
        $memo = Memo::query()
            ->where('user_id', Auth::id())
            ->where('date', 'like', $res['date-str'])
            ->first();

        return view('users.detail', compact('res', 'memo'));
    }

    /**
     * グループ作成画面
     *
     * @return View
     */
    public function create(): View
    {
        return view('users.create_group');
    }

    /**
     * グループ参加画面
     *
     * @return View
     */
    public function join(): View
    {
        return view('users.join_group');
    }

    /**
     * 参加できるグループを追加
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function store(Request $request): View|RedirectResponse
    {
        if (!empty($request->input('create'))) {
            // 受け取ったデータ
            $group_name = $request->input('group_name');
            $watchword = $request->input('watchword');

            $group = Group::query()
                ->where('watchword', 'like', $watchword)
                ->first();

            // 合言葉の確認
            if (!is_null($group)) {
                $error_message = '・同じ合言葉のグループが存在しています。';
                return view('users.create_group', compact('error_message', 'group_name'));
            }

            // グループテーブル取得
            $group = new Group();

            // グループにデータを保存
            $group->name = $group_name;
            $group->watchword = $watchword;
            $group->save();

            // User_Groupテーブルにデータを保存
            $group_user = new GroupUser();
            $group_user->user_id = Auth::id();
            $group_user->group_id = Group::query()->max('id');
            $group_user->is_admin = true;
            $group_user->save();
        }

        if (!empty($request->input('join'))) {
            $group_user = GroupUser::query()
                ->where('user_id', Auth::id())
                ->where('group_id', $request->input('group-id'))
                ->first();

            if (is_null($group_user)) {
                // User_Groupテーブルにデータを保存
                $group_user = new GroupUser();
                $group_user->user_id = Auth::id();
                $group_user->group_id = $request->input('group-id');
                $group_user->is_admin = false;
                $group_user->save();
            } else {
                $error_message = 'すでに参加しています。';
                return view('users.join_group', compact('error_message'));
            }
        }

        return redirect()->route('my-page');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function show(Request $request): View
    {
        // 入力された値を取得
        $watchword = $request->input('watchword');

        // グループを入力されたアドレスで検索
        $group = Group::query()
            ->where('watchword', 'like', $watchword)
            ->first();

        // グループが存在するかを確認
        if (!empty($group->id)) {
            return view('users.join_group', compact('group'));
        }
        $error_message = 'グループが見つかりませんでした。';
        return view('users.join_group', compact('error_message', 'watchword'));
    }

    /**
     * @return View
     */
    public function editUser(): View
    {
        return view('users.user_info_edit');
    }

    /**
     * @return View
     */
    public function editGroup(): View
    {
        // 所属しているグループを取得
        $user_id = Auth::id();
        $group_id = GroupUser::query()
            ->where('user_id', $user_id)
            ->pluck('group_id')
            ->toArray();

        $groups = Group::query()
            ->whereIn('id', $group_id)
            ->pluck('name', 'id')
            ->toArray();

        return view('users.group', compact('groups'));
    }

    /**
     * ユーザー情報の更新
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        // 名前変更
        if (!empty($request->input('user-name'))) {
            $user = User::query()
                ->where('id', Auth::id())
                ->first();
            $user->name = $request->input('name');
            $user->save();
        }

        // パスワード変更
        if (!empty($request->input('user-password'))) {
            $user = User::query()
                ->where('id', Auth::id())
                ->first();
            $user->password = Hash::make($request->input('user-password'));
            $user->save();
        }

        return redirect()->route('my-page');
    }

    /**
     * ユーザー削除
     *
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        User::query()
            ->where('id', Auth::id())
            ->delete();

        dailyAllowance::query()
            ->where('user_id', Auth::id())
            ->delete();

        GroupUser::query()
            ->where('user_id', Auth::id())
            ->delete();

        return redirect()->route('my-page');
    }
}
