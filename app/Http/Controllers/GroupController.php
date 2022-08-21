<?php

namespace App\Http\Controllers;

use App\Models\dailyAllowance;
use App\Models\Memo;
use App\Models\Onsite;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\UserOnsite;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\AddOnsiteRequest;

class GroupController extends Controller
{
    /**
     * グループトップページ
     *
     * @param Request $request
     * @param int $id
     * @return View|RedirectResponse
     */
    public function index(Request $request, int $id): View|RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        if (empty($group_user->id)) {
            return redirect()->route('my-page');
        }

        // グループを取得
        $group = Group::query()
            ->where('id', $id)
            ->first();

        $dt = Carbon::today()->format('Y-m');
        $month = Carbon::today()->format('m');
        $onsites = Onsite::query()
            ->where('group_id', '=', "$id")
            ->pluck('name', 'id')
            ->toArray();

        // 自分の給与取得
        $salary = dailyAllowance::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->latest()
            ->first();

        if (!empty($salary['id'])) {
            $one_day = UserOnsite::query()
                ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
                ->where('user_id', Auth::id())
                ->where('group_id', $id)
                ->where('date', 'like', "$dt%")
                ->where('oneday_flag', true)
                ->count();

            $half_day = UserOnsite::query()
                ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
                ->where('user_id', Auth::id())
                ->where('group_id', $id)
                ->where('date', 'like', "$dt%")
                ->where('oneday_flag', false)
                ->count();

            $half_day = $half_day / 2;
            $all = $one_day + $half_day;
            $monthly_salary = $salary['salary'] * $all;

            if (!empty($request->input('onsite'))) {
                $onsite_id = $request->input('onsite');
                $onsite_name = Onsite::query()
                    ->where('id', $onsite_id)
                    ->first()
                    ->name;

                return view('groups.search', compact('group', 'monthly_salary', 'salary', 'onsites', 'month', 'onsite_id', 'onsite_name'));
            }
            return view('groups.mypage', compact('group', 'monthly_salary', 'salary', 'onsites', 'month'));
        }
        // 登録されている現場を取得
        $registered_sites = UserOnsite::query()
            ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
            ->where('user_id', Auth::id())
            ->get();

        if (!empty($request->input('onsite'))) {
            $name = $request->input('onsite');
            $user_onsites = UserOnsite::query()
                ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
                ->where('user_id', Auth::id())
                ->where('group_id', $id)
                ->where('date', 'like', "$dt%")
                ->where('name', 'like', $name)
                ->get();

            return view('groups.search', compact('group', 'onsites', 'registered_sites', 'month', 'name', 'user_onsites'));
        }
        return view('groups.mypage', compact('group', 'onsites', 'registered_sites', 'month'));
    }

    /**
     * カレンダーに表示する現場を取得
     *
     * @param int $id
     * @return Collection|RedirectResponse
     */
    public function getOnsite(int $id): Collection|RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        if (empty($group_user->id)) {
            return redirect()->route('my-page');
        }

        return UserOnsite::query()
            ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->select(
                'name as title',
                'date as start'
            )->get();
    }

    /**
     * 現場検索時のカレンダーに表示する現場を取得
     *
     * @param int $id
     * @param int $onsite_id
     * @return Collection|RedirectResponse
     */
    public function searchOnsite(int $id, int $onsite_id): Collection|RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        if (empty($group_user->id)) {
            return redirect()->route('my-page');
        }

        return UserOnsite::query()
            ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->where('onsite_id', $onsite_id)
            ->select(
                'name as title',
                'date as start'
            )->get();
    }

    /**
     * 現場の詳細画面
     *
     * @param Request $request
     * @param int $id
     * @return View|RedirectResponse
     */
    public function detail(Request $request, int $id): View|RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        if (empty($group_user->id)) {
            return redirect()->route('my-page');
        }

        // グループを取得
        $group = Group::query()
            ->where('id', $id)
            ->first();

        $res = $request->all();
        $count = UserOnsite::query()
            ->where('user_id', Auth::id())
            ->where('date', 'like', $res['date-str'])
            ->count();

        $memo = Memo::query()
            ->where('user_id', Auth::id())
            ->where('date', 'like', $res['date-str'])
            ->first();

        // 登録されている現場を取得
        $registered_site_id = UserOnsite::query()
            ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->where('date', 'like', $res['date-str'])
            ->get('onsite_id');

        $onsites = Onsite::query()
            ->where('group_id', $id)
            ->whereNotIn('id', $registered_site_id)
            ->pluck('name', 'id')
            ->toArray();

        $registered_sites = UserOnsite::query()
            ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->where('date', 'like', $res['date-str'])
            ->get();

        return view('groups.detail', compact('res', 'group', 'onsites', 'registered_sites', 'count', 'memo'));
    }

    /**
     * 管理者画面への遷移
     *
     * @param int $id
     * @return View|RedirectResponse
     */
    public function changeMode(int $id): View|RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        if (empty($group_user->id)) {
            return redirect()->route('my-page');
        }

        // グループを取得
        $group = Group::query()
            ->where('id', $id)
            ->first();

        // 管理者権限の取得
        $is_admin = $group_user->is_admin;

        return view('groups.group', compact('group', 'is_admin'));
    }

    /**
     * 現場を追加
     *
     * @param AddOnsiteRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function addOnsite(AddOnsiteRequest $request, int $id): RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        if (empty($group_user->id)) {
            return redirect()->route('my-page');
        }

        $onsite = Onsite::query()->find($request->post('onsite-id'));

        if (is_null($onsite)) {
            return redirect()->route('group.my-page', $id)->with('error_message', '追加できませんでした。');
        }

        if ($onsite->group_id !== $id) {
            return redirect()->route('group.my-page', $id)->with('error_message', '追加できませんでした。');
        }

        // 日付の取得
        $date = $request->input('date');

        // 現場数の取得
        $count = UserOnsite::query()
            ->where('user_id', Auth::id())
            ->where('date', 'like', $date)
            ->count();

        if ($count < 2) {
            // 現場の保存
            $user_onsite = new UserOnsite();
            $user_onsite->user_id = Auth::id();
            $user_onsite->onsite_id = $request->input('onsite-id');
            $user_onsite->date = $request->input('date');
            $user_onsite->oneday_flag = true;
            $user_onsite->save();
        }

        // 現場数の取得(追加後)
         $count = UserOnsite::query()
            ->where('user_id', Auth::id())
            ->where('date', 'like', $date)
            ->count();

        if ($count >= 2) {
            $user_onsite_id = UserOnsite::query()
                ->where('user_id', Auth::id())
                ->where('date', 'like', $date)
                ->get('id');

            $update = ['oneday_flag' => false];

            UserOnsite::query()
                ->where('user_id', Auth::id())
                ->where('date', 'like', $date)
                ->whereIn('id', $user_onsite_id)
                ->update($update);
        }

        return redirect()->route('group.my-page', $id);
    }

    /**
     * oneday_flagの更新
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        if (empty($group_user->id)) {
            return redirect()->route('my-page');
        }

        $user_onsite = UserOnsite::query()
            ->where('user_id', Auth::id())
            ->where('onsite_id', $request->input('onsite-id'))
            ->where('date', 'like', $request->input('date'))
            ->first();

        // 日付の取得
        $date = $request->input('date');

        // 現場数の取得
        $count = UserOnsite::query()
            ->where('user_id', Auth::id())
            ->where('date', 'like', $date)
            ->count();

        if ($count < 2) {
            // oneday_flagをtrueにする
            if ($request->input('flag') == 'one-day') {
                $user_onsite->oneday_flag = true;
                $user_onsite->save();
            }
        }

        // oneday_flagをfalseにする
        if ($request->input('flag') == 'half-day') {
            $user_onsite->oneday_flag = false;
            $user_onsite->save();
        }

        return redirect()->route('group.my-page', $id);
    }

    /**
     * 現場削除
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(Request $request, int $id): RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        if (empty($group_user->id)) {
            return redirect()->route('my-page');
        }

        $user_onsite = UserOnsite::query()
            ->where('user_id', $request->input('member-id'))
            ->where('onsite_id', $request->input('onsite-id'))
            ->where('date', 'like', $request->input('date'))
            ->first();

        $user_onsite->delete();

        return redirect()->route('group.my-page', $id);
    }
}
