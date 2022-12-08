<?php

namespace App\Service\CronTask;

use App\Models\Article;
use App\Service\FileService\ImageService;

class ArticleDeleteService {

    public int $deleteDays;
    public $imageService;
    public $articles;

    function __construct()
    {
        $this->deleteDays = config('business_logic.days_remove_records');
        $this->imageService = new ImageService;
        $this->articles = Article::beforeCreated($this->deleteDays)->select('file')->get();
    }

    function __invoke()
    {
        foreach ($this->articles as $article) {

            $this->imageService->deleteFile($article->file);
            $article->delete();

        }
    }

}
