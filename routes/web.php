<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PolicyController;
use FontLib\Table\Type\name;
use App\Events\messageEvent;
use App\Events\PusherBroadcast;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/reset', function () {
    return view('auth.passwords.reset');
});

Auth::routes();
/*------------------------------------Dashboard------------------------------------*/
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    /*------------------------------------Task------------------------------------*/
    Route::get('/tasks', 'TasksController@taskjob')->name('task.tasks');
    Route::get('/notasks', 'TasksController@notaskjob')->name('task.notasks');
    Route::get('/createTask', 'TasksController@create')->name('task.createTask');
    Route::get('/taskuser', 'TasksController@taskuser')->name('task.taskuser');
    Route::post('/createTask', 'TasksController@store');
    Route::get('/tasks', 'TasksController@taskjob')->name('task.tasks');
    Route::get('/receiveDocument', 'TasksController@receiveDoc')->name('task.receiveDocument');
    Route::get('/receiveDocument/{id}', 'TasksController@documents')->name('task.document');
    Route::post('/taskDocument', 'TasksController@receivedocStore')->name('task.storeDoc');
    Route::get('/update/{id}', 'TasksController@updateview')->name('task.update');
    Route::put('/tasksupdate/{id}', 'TasksController@updateview');
    Route::get('/taskprogressall', 'TasksController@taskprogressall')->name('task.taskprogressall');
    Route::get('/tasksprogress/{id}', 'TasksController@taskProg')->name('task.taskprogress');
    Route::post('/task-post', 'TasksController@TaskPost')->name('task.taskpost');
    Route::post('/precheck/{id}', 'TasksController@Precheck')->name('task.precheck');
    Route::post('/postcheck/{id}', 'TasksController@Postcheck')->name('task.postcheck');
    Route::get('/commentview', 'TasksController@commentsview')->name('task.commentview');
    //Route::get('/taskcomment', 'TasksController@commentsview')->name('task.comment');
    Route::post('/taskcomment', 'TasksController@comments')->name('task.comments');
    Route::put('/approve/{id}', 'TasksController@approveTask')->name('task.approve');
    Route::put('/complete/{id}', 'TasksController@completeTask')->name('task.complete');
    Route::post('/save-post', 'TasksController@PostProcess')->name('task.post');
    Route::get('/assignjunior/{id}', 'TasksController@AssignJunior')->name('task.junior');
    Route::put('/assignjunior/{id}', 'TasksController@AssignJuniorStoreData');

    /*-----------------------------live chat--------------------------------*/
    Route::get('/index', 'PusherController@index')->name('chat.room');
    Route::post('/broadcast', 'PusherController@broadcast');
    Route::post('/receive', 'PusherController@receive');


    /*---------------------------------------System User-------------------------------------*/
    Route::get('/adduser', 'UserController@index')->name('user.useradd');
    Route::post('/adduser', 'RegController@create')->name('adduser');
    Route::get('/userlist', 'UserController@addview')->name('user.userlist');
    Route::get('/edituser/{id}', 'UserController@editview')->name('user.edit');
    Route::put('/edituser/{id}', 'RegController@edit');
    Route::get('/deleteuser/{id}', 'UserController@delete');
    Route::get('/userpermission/{id}', 'UserController@permission')->name('user.permission');
    // Route::put('/userpermission/{id}', 'UserController@changepermission');

    /*-----------------------------------Role & Permission--------------------------------------*/
    Route::get('/role-permission', 'RolePermissionController@index')->name('role.index');
    Route::post('/role', 'RolePermissionController@store');
    Route::put('/role-update/{id}', 'RolePermissionController@edit')->name('role.update');
    Route::get('/permission', 'RolePermissionController@permission')->name('role.permission');
    Route::post('/permission', 'RolePermissionController@addPermission');
    Route::get('/change-permission/{id}', 'RolePermissionController@changePermission')->name('role.change-permission');
    //Route::post('/setPermission', 'RolePermissionController@changePermissionStore')->name('role.setPermission');
    Route::post('/setPermission', 'RolePermissionController@changePermissionStore')->name('role.setPermission');
    Route::get('/create', 'RolePermissionController@createPermission')->name('role.create');
    Route::get('/assignPermission', 'RolePermissionController@assignPermission')->name('role.assign');


    /*------------------------------------Setting------------------------------------*/
    Route::get('/generalsetting', 'GeneralSettingController@general')->name('settings.general');
    Route::put('/settingupdate/{id}', 'GeneralSettingController@updatesetting')->name('settings.update');
    Route::post('/generalsetting', 'GeneralSettingController@store');
    Route::get('/profilesetting', 'ProfileSettingController@profilesetting')->name('settings.profile');

    /*------------------------------------Setting------------------------------------*/
    Route::get('/error/409', 'ErrorLog@error409')->name('error.409');
    Route::get('/error/forbidden', 'ErrorLog@error403')->name('error.403');

    /*------------------------------------Pdf generator------------------------------------*/
    Route::get('/pdf/sample', 'PDFController@generate');
    Route::post('pdf/dispatch/document', 'PDFController@DispatchPDF')->name('pdf.dispatch');
    //Route::post('pdf/dispatchDocs', 'PDFController@generatedispatch');
});

Route::get('/dashboard', function () {
    // Only authenticated users can access this route

})->middleware('auth');
