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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', 'Api\AuthController@login');
    Route::post('signup','Api\AuthController@signup');
    Route::post('signup/token', 'Api\AuthController@sendActivationToken');
    Route::get('signup/activate/{token}', 'Api\AuthController@signupActivate');
    Route::middleware('auth:api')->group(function() {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('user', 'Api\AuthController@user');
    });

    Route::post('linetoken', 'Api\AuthController@lineToken');
    Route::post('kprofile', 'Api\AuthController@kakaoProfile');
});

Route::get('auth/lineauth', 'Api\AuthController@lineAuth');

Route::prefix('password')->group(function() {
    Route::post('create', 'Api\PasswordResetController@create');
    Route::get('find/{token}', 'Api\PasswordResetController@find');
    Route::post('reset', 'Api\PasswordResetController@reset');
});

Route::prefix('document')/*->middleware('auth:api')*/->group(function() {
    Route::get('/', 'Api\DocumentsController@getDocuments');
    Route::post('/', 'Api\DocumentsController@uploadDocument');
    Route::get('/{id}', 'Api\DocumentsController@getDocument');
    Route::put('/{id}', 'Api\DocumentsController@documentSetting');
    Route::delete('/{id}', 'Api\DocumentsController@deleteDocument');

    Route::get('/{doc_id}/request', 'Api\DocumentsController@getSignRequests');
    Route::post('/{doc_id}/request', 'Api\DocumentsController@addSignRequest');
});

// Route::put('/drequest/{doc_id}', 'Api\DocumentsController@editSignRequest')->middleware('auth:api');
// Route::delete('/drequest/{doc_id}', 'Api\DocumentsController@deleteSignRequest')->middleware('auth:api');

Route::prefix('annotation')->group(function() {
    Route::get('/', 'Api\AnnotationsController@index');
    Route::delete('/{id}', 'Api\AnnotationsController@deleteAnnotation');
    Route::prefix('text')->group(function() {
        Route::post('/', 'Api\AnnotationsController@addTextAnnotation');
        Route::put('/{id}', 'Api\AnnotationsController@updateTextAnnotation');
    });
    Route::prefix('image')->group(function() {
        Route::post('/', 'Api\AnnotationsController@addImageAnnotation');
        Route::put('/{id}', 'Api\AnnotationsController@updateImageAnnotation');
    });
    Route::prefix('checkbox')->group(function() {
        Route::post('/', 'Api\AnnotationsController@addCheckBoxAnnotation');
        Route::put('/{id}', 'Api\AnnotationsController@updateCheckBoxAnnotation');
    });
    Route::prefix('radiobutton')->group(function() {
        Route::post('/', 'Api\AnnotationsController@addRadioButtonAnnotation');
        Route::put('/{id}', 'Api\AnnotationsController@updateRadioButtonAnnotation');
    });
});

Route::prefix('pdf')->group(function() {
    Route::put('/{id}', 'Api\PDFsController@export');
});

Route::prefix('fpdf')->group(function() {
    Route::get('text', 'Api\PDFController@addText');
});

Route::post('registeruser', 'Api\HomeController@register');



Route::get('dropbox-return', 'Api\HomeController@dropbox_return');
Route::get('drop-return', 'Api\HomeController@dropbox_return_fromdropbox');
Route::get('onedrive_return', 'Api\HomeController@onedrive_return');
//Route::get('files', 'Api\HomeController@google_files');

Route::get('terms', 'Api\HomeController@terms');
Route::get('privacy', 'Api\HomeController@privacy');

Route::post('introsubmit', 'Api\HomeController@introsubmit');
Route::post('file-upload-get', 'Api\HomeController@file_upload_get');
