<?php

namespace App\Http\Resources\Article;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class ArticleShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $file = $this->getTempUrlOfImage();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'file' => $file
        ];
    }

    public function getTempUrlOfImage(): string
    {
        return URL::temporarySignedRoute(
            'article.image', now()->addMinutes(config('business_logic.temp_url_expiration')), ['article_id' => $this->id]
        );
    }
}
