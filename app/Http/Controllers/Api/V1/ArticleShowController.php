<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\ApiV1Controller;
use App\Http\Resources\Article\ArticleShowResource;
use App\Models\Article;

class ArticleShowController extends ApiV1Controller {

    function __invoke($article_id)
    {
        $article = Article::findOrFail($article_id);

        return $this->success([
            'article' => new ArticleShowResource($article)
        ]);
    }
}
