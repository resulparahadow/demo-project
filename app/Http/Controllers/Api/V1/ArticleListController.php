<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\ApiV1Controller;
use App\Http\Requests\Api\V1\ArticleCreateRequest as Request;
use App\Http\Resources\Article\ArticleListResource;
use App\Models\Article;

class ArticleListController extends ApiV1Controller {

    function __invoke()
    {
        $articles = Article::paginate(10);

        return $this->success([
            'articles' => ArticleListResource::collection($articles)->response()->getData(true)
        ]);
    }
}
