<?php

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

Route::get('/', 'HomepageController@index');

Auth::routes(['verify'=>true]);
Route::group(['middleware' => ['auth']], function() {


    Route::group(['middleware' => ['approved']], function() {
        Route::post('/tests','TestsController@store')->name('tests.store');
        Route::resource('results','ResultsController');
        Route::get('/tests/{module_id}', 'TestsController@index')->name('tests.index');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/home/{module_id}', 'HomeController@filter');

    });
    
        Route::get('/approval', 'HomeController@approval')->name('approval');
        Route::fallback(function() {
            return  redirect('/');
        });
       
    
    Route::middleware(['admin'])->group(function () {
        Route::post('/content/{id}','WebContentController@update')->name('admin.webcontent.update');
        Route::get('/webcontent','WebContentController@index')->name('admin.webcontent');
        Route::get('/studentprogress','StudentTests@index')->name('admin.studentprogress.id');
        Route::post('/studentprogress','StudentTests@filter')->name('admin.studentprogress');


        Route::get('/users', 'UserController@index')->name('admin.users.index');
        Route::get('/users/teacher', 'UserController@indexteacher')->name('teacher.users.index');
        Route::get('/users/{user_id}/approve', 'UserController@approve')->name('admin.users.approve');
        Route::get('/users/{user_id}/approve/teacher', 'UserController@teacherUserapprove')->name('teacher.user.approve');
        Route::get('/users/{user_id}/delete', 'UserController@delete')->name('admin.users.delete');
        Route::get('/users/{user_id}/block', 'UserController@block')->name('admin.users.block');

        Route::get('/teachers/{user_id}/approve', 'UserController@teacherapprove')->name('teacher.users.approve');
        Route::get('/teachers/{user_id}/block', 'UserController@teacherblock')->name('teacher.users.block');
      
        Route::resource('videos', 'VideoController');
        Route::resource('questions', 'QuestionsController');
        Route::resource('questionoptions', 'QuestionoptionsController');
     
        Route::get('/filter/questions/{module_id}', 'QuestionsController@filter');
        Route::resource('modules', 'ModulesController');
        
    });
    
    
    
    



});



Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

