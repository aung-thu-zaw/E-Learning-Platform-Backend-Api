<?php

namespace App\Actions\Admin\BlogContents;

use App\Http\Traits\ImageUpload;
use App\Models\BlogContent;

class UpdateBlogContentAction
{
    use ImageUpload;

    /**
     * @param  array<mixed>  $data
     */
    public function handle(array $data, BlogContent $blogContent): BlogContent
    {
        $thumbnail = isset($data['thumbnail']) && ! is_string($data['thumbnail']) ? $this->updateImage($data['thumbnail'], $blogContent->thumbnail, 'blog-contents') : $blogContent->thumbnail;

        $blogContent->update([
            'blog_category_id' => $data['blog_category_id'],
            'author_id' => auth()->id(),
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => $data['status'],
            'published_at' => $data["status"] === 'published' && $blogContent->published_at === null ? now() : $blogContent->published_at,
            'thumbnail' => $thumbnail,
        ]);

        return $blogContent;
    }
}
