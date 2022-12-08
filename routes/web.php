<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Web'
], function (){

    Route::get('article/{article_id}/image', 'ArticleImageController')->middleware('signed')->name('article.image');

});
