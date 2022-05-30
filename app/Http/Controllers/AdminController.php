<?php

namespace App\Http\Controllers;

use App\Models\dailyAllowance;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Memo;
use App\Models\Onsite;
use App\Models\User;
use App\Models\UserOnsite;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * 管理画面トップページ
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

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        // グループを取得
        $group = Group::query()
            ->where('id', $id)
            ->first();

        // 登録している現場を取得
        $onsites = Onsite::query()
            ->where('group_id', $id)
            ->pluck('name', 'id')
            ->toArray();

        // 所属しているメンバーを取得
        $user_id = GroupUser::query()
            ->where('group_id', "$id")
            ->pluck('user_id')
            ->toArray();

        $members = User::query()
            ->whereIn('id', $user_id)
            ->pluck('name', 'id')
            ->toArray();

        if (!empty($request->input('onsite'))) {
            $name = $request->input('onsite');
            $onsite = Onsite::query()
                ->where('group_id', $id)
                ->where('name', 'like', $name)
                ->first();

            return view('admins.search_onsite', compact('group', 'onsites', 'members', 'onsite'));
        }

        if (!empty($request->input('member-id'))) {
            $target = User::query()
                ->where('id', $request->input('member-id'))
                ->first();

            return view('admins.search_member', compact('group', 'onsites', 'members', 'target'));
        }

        return view('admins.mypage', compact('group', 'onsites', 'members'));
    }

    /**
     * 現場の名前をカレンダーに返す
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

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }
// Eager Loading
//        $userOnsites = UserOnsite::query()->with('onsite')->get();
//        dd($userOnsites);

        return UserOnsite::query()
            ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
            ->where('group_id', $id)
            ->select(
                'name as title',
                'date as start'
            )
            ->distinct()
            ->get();
    }

    /**
     * 現場検索結果
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

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        return UserOnsite::query()
            ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
            ->where('group_id', $id)
            ->where('onsite_id', $onsite_id)
            ->select(
                'name as title',
                'date as start'
            )->distinct()
            ->get();
    }

    /**
     * 作業員検索結果
     *
     * @param int $id
     * @param int $member_id
     * @return Collection|RedirectResponse
     */
    public function searchMember(int $id, int $member_id): Collection|RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        return UserOnsite::query()
            ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
            ->where('group_id', $id)
            ->where('user_id', $member_id)
            ->select(
                'name as title',
                'date as start'
            )->distinct()
            ->get();
    }

    /**
     * 日付の詳細
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

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        // グループを取得
        $group = Group::query()
            ->where('id', $id)
            ->first();

        $res = $request->all();
        $memo = Memo::query()
            ->where('user_id', Auth::id())
            ->where('date', 'like', $res['date-str'])
            ->first();

        // 登録されている現場を取得
        $registered_sites = UserOnsite::query()
            ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
            ->where('group_id', $id)
            ->where('date', 'like', $res['date-str'])
            ->groupBy('name')
            ->get();

        return view('admins.detail', compact('group', 'res', 'registered_sites', 'memo'));
    }

    /**
     * 現場に行った作業員リスト
     *
     * @param Request $request
     * @param int $id
     * @return View|RedirectResponse
     */
    public function memberList(Request $request, int $id): View|RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        // グループを取得
        $group = Group::query()
            ->where('id', $id)
            ->first();

        $res = $request->input('date');
        $date = $request->input('date-display');

        $onsite = Onsite::query()
            ->where('id', $request->input('onsite-id'))
            ->get();

        $members = UserOnsite::query()
            ->join('users', 'user_onsite.user_id', '=', 'users.id')
            ->where('onsite_id', $request->input('onsite-id'))
            ->where('date', 'like', $res)->get();

        $number = UserOnsite::query()
            ->join('users', 'user_onsite.user_id', '=', 'users.id')
            ->where('onsite_id', $request->input('onsite-id'))
            ->where('date', 'like', $res)->count();

        return view('admins.member_list', compact('group', 'date', 'onsite', 'members', 'number'));
    }

    /**
     * 給与リスト
     *
     * @param int $id
     * @return View|RedirectResponse
     */
    public function salaryList(int $id): View|RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        // グループを取得
        $group = Group::query()
            ->where('id', $id)
            ->first();

        $dt = Carbon::today()->format('Y-m');
        $month = Carbon::today()->format('m');

        $members = GroupUser::query()
            ->join('users', 'group_user.user_id', '=', 'users.id')
            ->where('group_id', $id)->get();

        foreach ($members as $member) {
            $name = User::query()
                ->where('id', $member['user_id'])
                ->first();

            $salary = dailyAllowance::query()
                ->where('user_id', $member['user_id'])
                ->where('group_id', $id)
                ->latest()
                ->first();

            $one_day = UserOnsite::query()
                ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
                ->where('user_id', $member['user_id'])
                ->where('group_id', $id)
                ->where('date', 'like', "$dt%")
                ->where('oneday_flag', true)
                ->count();

            $half_day = UserOnsite::query()
                ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
                ->where('user_id', $member['user_id'])
                ->where('group_id', $id)
                ->where('date', 'like', "$dt%")
                ->where('oneday_flag', false)
                ->count();

            $half_day = $half_day / 2;
            $all = $one_day + $half_day;

            if (is_null($salary)) {
                $monthly_salaries[] = [$name, 0];
            } else {
                $monthly_salaries[] = [$name, $salary['salary'] * $all];
            }
        }


        return view('admins.salary_list', compact('group', 'monthly_salaries', 'month'));
    }

    /**
     * 現場追加処理
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function storeOnsite(Request $request, int $id): RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        $onsite = new Onsite();
        $onsite->name = $request->input('onsite-name');
        $onsite->group_id = $id;
        $onsite->save();

        return redirect()->route('admin.my-page', $id);
    }

    /**
     * 給与追加処理
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function storeSalary(Request $request, int $id): RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }


        $user_id = $request->input('user-id');
        $daily_allowance = dailyAllowance::query()
            ->where('user_id', $user_id)
            ->where('group_id', $id)
            ->get();

        if (!empty($daily_allowance[0]->id)) {
            dailyAllowance::query()
                ->where('user_id', "$user_id")
                ->latest()
                ->first()
                ->update([
                    'end_date' => Carbon::today()->toDateString()
                ]);
        }
        $daily_allowance = new dailyAllowance();
        $daily_allowance->user_id = $request->input('user-id');
        $daily_allowance->group_id = $id;
        $daily_allowance->salary = $request->input('salary');
        $daily_allowance->start_date = Carbon::today()->toDateString();
        $daily_allowance->end_date = null;
        $daily_allowance->save();

        return redirect()->route('admin.my-page', $id);
    }

    /**
     * 現場管理
     *
     * @param int $group_id
     * @return View|RedirectResponse
     */
    public function editOnsites(int $group_id): View|RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $group_id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        // グループを取得
        $group = Group::query()
            ->where('id', $group_id)
            ->first();

        // 登録している現場を取得
        $onsites = Onsite::query()
            ->where('group_id', $group_id)
            ->pluck('name', 'id')
            ->toArray();

        return view('admins.onsite_management', compact('group', 'onsites'));
    }

    /**
     * 作業員一覧
     *
     * @param int $group_id
     * @return View|RedirectResponse
     */
    public function members(int $group_id): View|RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $group_id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        // グループを取得
        $group = Group::query()->findOrFail($group_id);

        // メンバー編集画面
        // 所属しているメンバーを取得
        $members = GroupUser::query()
            ->join('users', 'group_user.user_id', '=', 'users.id')
            ->where('group_id', $group_id)
            ->get();

        return view('admins.employee_management', compact('group', 'members'));
    }

    /**
     *
     * 日当履歴
     * @param int $group_id
     * @param int $user_id
     * @return View|RedirectResponse
     */
    public function membersDetail(int $group_id, int $user_id): View|RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $group_id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        // グループを取得
        $group = Group::query()
            ->find($group_id);


        // 所属メンバーの取得
        $member = User::query()->findOrFail($user_id);

        $daily_allowances = dailyAllowance::query()
            ->where('user_id', $user_id)
            ->where('group_id', $group_id)
            ->latest('created_at')
            ->get();

        return view('admins.daily_allowance_history', compact('group', 'daily_allowances', 'member'));
    }

    /**
     * グループ編集画面
     *
     * @param int $group_id
     * @return View|RedirectResponse
     */
    public function editGroup(int $group_id): View|RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $group_id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        // グループを取得
        $group = Group::query()
            ->where('id', $group_id)
            ->first();

        return view('admins.group_edit', compact('group'));
    }

    /**
     * グループ編集
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function updateGroup(Request $request, int $id): RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        if ($request->input('watchword') === null || $request->input('name') === null) {
            return redirect()->route('admin.my-page', $id)->with('error_message', '処理に失敗しました。');
        }

        $count = Group::query()
            ->where('watchword', 'like', $request->input('watchword'))
            ->count();

        $group = Group::query()
            ->where('id', $id)
            ->first();

        if ($count === 1 && $group->watchword !== $request->input('watchword')) {
            return redirect()->route('admin.my-page', $id)->with('error_message', '同じ合言葉が存在します。');
        }

        $group->name = $request->input('name');
        $group->watchword = $request->input('watchword');
        $group->save();

        return redirect()->route('admin.my-page', $id);
    }

    /**
     * 管理者権限変更
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function updateMode(Request $request, int $id): RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        $group_user = GroupUser::query()
            ->where('user_id', $request->input('member-id'))
            ->where('group_id', $id)
            ->first();

        if ($group_user->is_admin) {
            return redirect()->route('admin.my-page', $id)->with('error_message', '既に管理者です。');
        }

        $group_user->is_admin = true;
        $group_user->save();

        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        $group_user->is_admin = false;
        $group_user->save();

        return redirect()->route('admin.my-page', $id);
    }

    /**
     * グループ削除
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroyGroup(int $id): RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        $group = Group::query()
            ->where('id', $id)
            ->first();

        $group->delete();

        return redirect()->route('my-page');
    }

    /**
     * 現場削除
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function destroyOnsite(Request $request, int $id): RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        $onsite_id = $request->input('onsite-id');
        Onsite::query()
            ->where('id', $onsite_id)
            ->delete();

        return redirect()->route('admin.my-page', $id);
    }

    /**
     * メンバー削除
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function destroyMember(Request $request, int $id): RedirectResponse
    {
        // 参加してないグループへのURLアクセスはリダイレクト
        $group_user = GroupUser::query()
            ->where('user_id', Auth::id())
            ->where('group_id', $id)
            ->first();

        // 管理者権限の確認
        if (is_null($group_user) || !$group_user->is_admin) {
            return redirect()->route('my-page');
        }

        $member_id = $request->input('member-id');
        $member = GroupUser::query()
            ->where('user_id', $member_id)
            ->where('group_id', $id)
            ->first();

        if ($member->is_admin) {
            return redirect()->route('admin.my-page', $id)->with('error_message', '管理者は退会できません。');
        }

        GroupUser::query()
            ->where('user_id', $member_id)
            ->where('group_id', $id)
            ->delete();

        dailyAllowance::query()
            ->where('user_id', $member_id)
            ->where('group_id', $id)
            ->delete();

        UserOnsite::query()
            ->join('onsites', 'user_onsite.onsite_id', '=', 'onsites.id')
            ->where('user_id', $member_id)
            ->where('group_id', $id)
            ->delete();

        return redirect()->route('admin.my-page', $id)->with('success_message', '退会させました。');
    }
}
