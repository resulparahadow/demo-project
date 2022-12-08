<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'    => 'article',
    'as'        => 'article.',
    'namespace' => 'App\Http\Controllers\Api\V1'
], function () {

    Route::get('', 'ArticleListController')->name('list');
    Route::get('{article_id}', 'ArticleShowController')->name('show');
    Route::post('', 'ArticleCreateController')->name('create');

});
