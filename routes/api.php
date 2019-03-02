<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function() {

    // auth
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');

    //cities 
    Route::get('/governorates', 'HomeController@listGovernorates');
    Route::get('/governorates/{governorate_id}/cities', 'HomeController@listGovernorateCities');
    Route::get('/cities', 'HomeController@listCities');

    //application information
    route::get('/settings', 'HomeController@settings');

    Route::group(['middleware' => 'auth:api'], function() {

        //article
        Route::get('/articles', 'HomeController@listArticles');
        Route::get('/categories', 'HomeController@listCategories');
        Route::get('/categories/{category_id}/articles', 'HomeController@listCategoryArticles');
        //get favourite articles

        Route::get('/favourite-articles', 'HomeController@listClientFacouriteArticles');
        //favourite and unfavourite an article
        Route::post('/articles/favourite', 'HomeController@favouriteArticle');

        //get all blood types
        Route::get('/bloodtypes', 'HomeController@listBloodTypes');

        //add donation request
        route::post('/donation-request', 'HomeController@createDonationRequest');

        //get client notification 
        Route::get('/notifications', 'HomeController@getNotifications');

        //set client notification subscription
        route::post('/notifications/subscriptions', 'HomeController@setNotificationsSubscription');

        //contact us
        Route::post('/contact', 'HomeController@contact');

        //get client profile
        Route::get('/profile', 'Authcontroller@profile');
    });
}
);
