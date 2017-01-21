<?php

namespace App\Traits;

use Cache;

trait RelatedArticles
{
    protected function getRelatedArticles($article = null)
    {
        return Cache::remember('related-article-' . $article->id, 60, function () use ($article) {
            return $this->getTagRelatedArticles($article)
                ->merge($this->getCategoryRelatedArticles($article))
                ->reject(function ($item, $key) use ($article) {
                    return $item->slug === $article->slug;
                })->unique('id');
        });
    }

    protected function getTagRelatedArticles($article = null)
    {
        if (!$article) {
            return collect();
        }

        return $article->tags->map(function ($tag) {
            return $tag->articles;
        })->flatten();
    }

    protected function getCategoryRelatedArticles($article = null)
    {
        if (!$article) {
            return collect();
        }

        return $article->category->articles;
    }
}
