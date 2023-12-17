<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\PersonClassController;
use App\Http\Controllers\InvitedController;
use App\Http\Controllers\Admin\EmployeeController;



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

/** Routes For Store Home Page */
Route::get('/', function () {
    return redirect()->route('invite');
});
Route::get('/invite', [App\Http\Controllers\HomeController::class, 'invite'])->name('invite');
/********************************************************************************************************* */


/** Routes For User */
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('inviteds/userInviteStore', [InvitedController::class, 'userInviteStore'])->name('inviteds/userInviteStore');
Route::get('inviteds/inviteReg', [App\Http\Controllers\HomeController::class, 'inviteReg'])->name('inviteds/inviteReg');
/********************************************************************************************************* */


/** Routes For Admin */
Route::prefix('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin/home');
    Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin/login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin/login');
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin/logout');

    Route::middleware('auth:admin')->group(function () {
        route::resource('titles', TitleController::class);
        route::resource('personclasses', PersonClassController::class);
        route::resource('inviteds', InvitedController::class);
        route::post('inviteds/search', [InvitedController::class, 'search'])->name('inviteds/search');
        Route::get('exportAll',[InvitedController::class,'exportAll'])->name('exportAll');
        Route::get('exportInvited',[InvitedController::class,'exportInvited'])->name('exportInvited');
        Route::get('exportRegister',[InvitedController::class,'exportRegister'])->name('exportRegister');


        //////// Event Day ///////////////////
        route::get('eventday/all', [InvitedController::class, 'allInvitation'])->name('eventday/all');
        route::get('eventday/show/{id}', [InvitedController::class, 'showDayInvitation'])->name('eventday/show');
        route::get('eventday/edit/{id}', [InvitedController::class, 'editDayInvitation'])->name('eventday/edit');
        route::post('eventday/update/{id}', [InvitedController::class, 'updateDayInvitation'])->name('eventday/update');
        route::delete('eventday/destroy/{id}', [InvitedController::class, 'destroyDayInvitation'])->name('eventday/destroy');
        route::post('eventday/search', [InvitedController::class, 'searchAllInvitation'])->name('eventday/search');

        /////////////////// Seats /////////////////////////////////////////////
        route::get('eventday/seat/edit/{id}', [InvitedController::class, 'editInvitedSeat'])->name('eventday/seat/edit');
        route::post('eventday/seat/update/{id}', [InvitedController::class, 'updateInvitedSeat'])->name('eventday/seat/update');
        route::post('eventday/seat/update/{id}', [InvitedController::class, 'updateInvitedSeat'])->name('eventday/seat/update');
        route::get('eventday/seat/plan/{id}', [InvitedController::class, 'showSeatPlan'])->name('eventday/seat/plan');
        route::get('eventday/seat/all', [InvitedController::class, 'allSeats'])->name('eventday/seat/all');
        route::get('eventday/seat/empty', [InvitedController::class, 'emptySeats'])->name('eventday/seat/empty');
        route::get('eventday/seat/reports', [InvitedController::class, 'seatReports'])->name('eventday/seat/reports');

        route::get('eventday/seat/editInvited/{id}', [InvitedController::class, 'editSeatInvited'])->name('eventday/seat/editInvited');
        route::post('eventday/seat/updateInvited/{id}', [InvitedController::class, 'updateSeatInvited'])->name('eventday/seat/updateInvited');
        route::post('eventday/seat/search', [InvitedController::class, 'searchSeat'])->name('eventday/seat/search');

        /////////////////////////// user Invite Routes //////////////////////////////////////////////////
        route::get('userInvite/index', [InvitedController::class, 'userInviteIndex'])->name('userInvite/index');
        route::get('userInvite/show/{id}', [InvitedController::class, 'userInviteShow'])->name('userInvite/show');
        route::get('userInvite/edit/{id}', [InvitedController::class, 'userInviteEdit'])->name('userInvite/edit');
        route::post('userInvite/update/{id}', [InvitedController::class, 'userInviteUpdate'])->name('userInvite/update');
        route::delete('userInvite/destroy/{id}', [InvitedController::class, 'userInviteDestroy'])->name('userInvite/destroy');
        route::post('userInvite/search', [InvitedController::class, 'userInviteSearch'])->name('userInvite/search');

         //////// Employee Routes ///////////////////
         route::get('employees/index', [EmployeeController::class, 'index'])->name('employees/index');
         route::get('employees/create', [EmployeeController::class, 'create'])->name('employees/create');
         route::post('employees/store', [EmployeeController::class, 'store'])->name('employees/store');
         route::get('employees/show/{id}', [EmployeeController::class, 'show'])->name('employees/show');
         route::get('employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employees/edit');
         route::post('employees/update/{id}', [EmployeeController::class, 'update'])->name('employees/update');
         route::delete('employees/destroy/{id}', [EmployeeController::class, 'destroy'])->name('employees/destroy');
         route::get('employees/showPermission/{id}', [EmployeeController::class, 'showPermission'])->name('employees/showPermission');
         route::post('employees/changePermission/{id}', [EmployeeController::class, 'changePermission'])->name('employees/changePermission');
         route::get('profile/edit', [EmployeeController::class, 'editProfile'])->name('profile/edit');
         route::post('profile/update', [EmployeeController::class, 'updateProfile'])->name('profile/update');

        ////////////////////////////// qrcode ///////////////////////////////////////////////////////////
        route::get('qrcode', [InvitedController::class, 'qrcode'])->name('qrcode');
    });
});
/********************************************************************************************************* */
