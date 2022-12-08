<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\ApiV1Controller;
use App\Http\Requests\Api\V1\ArticleCreateRequest as Request;
use App\Http\Resources\Article\ArticleListResource;
use App\Models\Article;
use App\Service\FileService\ImageService;

class ArticleCreateController extends ApiV1Controller {

    function __invoke(Request $request, ImageService $imageSerive)
    {

        $filePath = $imageSerive->putFile($request->file('file'));

        $data = $request->validated();

        $data['file'] = $filePath;

        $article = Article::create($data);

        return $this->success([
            'article' => new ArticleListResource($article)
        ]);

    }
}
