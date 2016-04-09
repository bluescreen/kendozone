<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Auth::loginUsingId(6); // 6 Admin, 5 User

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect']], function () {

// Authentication routes...
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::post('auth/invite', 'Auth\AuthController@postInvite');

// Password reset link request routes...
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');

    Route::get('/tournaments/{tournamentId}/invite/{token}', 'InviteController@register');
    Route::post('tournaments/{tournament}/invite/{inviteId}/categories', 'InviteController@registerCategories');

    Route::group(['middleware' => ['guest']],
        function () {
            Route::post('auth/login', 'Auth\AuthController@postLogin');
            Route::get('auth/login', 'Auth\AuthController@getLogin');

            // Registration routes...

            Route::get('auth/register', 'Auth\AuthController@getRegister');
            Route::post('auth/register', 'Auth\AuthController@postRegister');
            Route::get('auth/register/confirm/{token}', 'Auth\AuthController@confirmEmail');


            //Social Login
            Route::get('auth/login/{provider?}', [
                'uses' => 'Auth\AuthController@getSocialAuth',
                'as' => 'auth.getSocialAuth'
            ]);


            Route::get('/login/callback/{provider?}', [
                'uses' => 'Auth\AuthController@getSocialAuthCallback',
                'as' => 'auth.getSocialAuthCallback'
            ]);
        });

    Route::get('/', 'DashboardController@index')->middleware(['auth']);
    Route::get('/admin', 'DashboardController@index')->middleware(['auth']);

    Route::get('tournaments/deleted', 'TournamentController@getDeleted');

    Route::group(['middleware' => ['auth', 'own',]], // 'throttle:100,1'
        function () {

            Route::resource('tournaments', 'TournamentController', ['names' => ['create' => 'tournaments.create','edit' => 'tournaments.edit', 'store' => 'tournaments.store', 'update' => 'tournaments.update']]);
            Route::resource('categories', 'CategoryController');
            Route::get('tournaments/{tournament}/register', 'TournamentController@register');

            Route::resource('users', 'UserController',['names' => ['index' => 'users.index', 'create' => 'users.create','edit' => 'users.edit', 'store' => 'users.store', 'update' => 'users.update']]);
            Route::get('users/{user}/tournaments', [
                'uses' => 'UserController@getMyTournaments',
                'as' => 'users.tournaments'
            ]);


            Route::get('exportUsersExcel', 'UserController@exportUsersExcel');
            Route::resource('tournaments/{tournament}/users', 'TournamentUserController');
            Route::delete('tournaments/{tournamentId}/categories/{categoryTournamentId}/users/{userId}/delete', 'TournamentUserController@deleteUser');
            Route::put('tournaments/{tournamentId}/categories/{categoryTournamentId}/users/{userId}/confirm', 'TournamentUserController@confirmUser');
            Route::get('tournaments/{tournamentId}/trees/', 'TournamentController@generateTrees');
            Route::resource('tournaments/{tournamentId}/categories/{categoryId}/settings', 'CategorySettingsController');
            Route::resource('invites', 'InviteController');
            Route::get('tournaments/{tournament}/invite', 'InviteController@inviteUsers');
            Route::resource('settings', 'SettingsController');

            //Restoring
            Route::get('tournaments/{tournament}/restore', 'TournamentController@restore');
            Route::get('users/{user}/restore', 'UserController@restore');

            Route::post('users/{user}/uploadAvatar', 'UserController@uploadAvatar');

        });


//APIS
    Route::group(['prefix' => 'api/v1'], function () { // , 'middleware' => 'AuthApi', 'middleware' => 'simpleauth'
        Route::get('authenticate', 'Api\AuthenticateController@index');
        Route::post('authenticate', 'Api\AuthenticateController@authenticate');
        Route::resource('tournaments', 'Api\TournamentController');
    });
//        invite/{userId}/register/
//Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware(['root']);;
});
