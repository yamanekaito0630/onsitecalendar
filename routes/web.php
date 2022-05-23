<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MemoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->group(function() {
        //グループに所属していないときのユーザー画面
        Route::get('/', 'index')->name('my-page');
        Route::get('/get-onsite', 'getOnsite')->name('get-onsite');
        Route::post('/detail', 'detail');

        Route::get('/edit_user', 'editUser')->name('edit.user');
        Route::get('/edit_group', 'editGroup')->name('edit.group');

        Route::get('/create', 'create')->name('create');
        Route::get('/join', 'join')->name('join');
        Route::get('/show', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::post('/delete', 'destroy')->name('delete');
    });

    Route::controller(GroupController::class)->group(function() {
        // グループに所属したときの画面
        Route::any('/group/{id}', 'index')->name('group.my-page');
        Route::get('/group/{id}/get-onsite', 'getOnsite')->name('group.get-onsite');
        Route::get('/group/{id}/{onsite_id}/search-onsite','searchOnsite');
        Route::post('/group/{id}/detail', 'detail');
        Route::get('/group/{id}/change_mode', 'changeMode')->name('change-mode');
        Route::post('/group/{id}/add_onsite', 'addOnsite')->name('group.add_onsite');
        Route::post('/group/{id}/update', 'update')->name('group.update');
        Route::post('/group/{id}/delete', 'destroy')->name('group.delete');
    });

    Route::controller(AdminController::class)->group(function() {
        // 管理画面
        Route::any('/group/{id}/admin/', 'index')->name('admin.my-page');
        Route::get('/group/{id}/admin/get-onsite', 'getOnsite')->name('group.get-onsite');
        Route::get('/group/{id}/admin/search-onsite/{onsite_id}', 'searchOnsite');
        Route::get('/group/{id}/admin/search-member/{member_id}', 'searchMember');
        Route::post('/group/{id}/admin/detail', 'detail');
        Route::post('/group/{id}/admin/list', 'memberList')->name('admin.member');
        Route::get('/group/{id}/admin/salaries', 'salaryList')->name('admin.salary');

        Route::post('/group/{id}/admin/store_onsite', 'storeOnsite')->name('admin.store.onsite');
        Route::post('/group/{id}/admin/store_salary', 'storeSalary')->name('admin.store.salary');

        Route::get('/group/{group_id}/admin/onsites', 'editOnsites')->name('admin.edit.onsites');
        Route::get('/group/{group_id}/admin/edit_group', 'editGroup')->name('admin.edit.group');

        Route::get('/group/{group_id}/admin/members', 'members')->name('admin.members');
        Route::get('/group/{group_id}/admin/members/{user_id}', 'membersDetail')->name('admin.members.detail');

        Route::post('/group/{id}/admin/update_group', 'updateGroup')->name('admin.update.group');
        Route::post('/group/{id}/admin/update_mode', 'updateMode')->name('admin.update.mode');

        Route::post('/group/{id}/admin/delete_group', 'destroyGroup')->name('admin.delete.group');
        Route::post('/group/{id}/admin/delete_onsite', 'destroyOnsite')->name('admin.delete.onsite');
        Route::post('/group/{id}/admin/delete_member', 'destroyMember')->name('admin.delete.member');
    });

    // メモの追加処理
    Route::post('/memo/store', [MemoController::class, 'store'])->name('memo.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
