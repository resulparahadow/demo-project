<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleImageController extends Controller {

    function __invoke($article_id)
    {

        $article = Article::select('file')->findOrFail($article_id);

        return response(Storage::get($article->file), 200, ['Content-type' => 'image/jpeg']);

    }
}
