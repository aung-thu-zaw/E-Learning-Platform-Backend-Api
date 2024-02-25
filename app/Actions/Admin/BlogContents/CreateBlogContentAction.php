<?php

namespace App\Actions\Admin\BlogContents;

use App\Http\Traits\ImageUpload;
use App\Models\BlogContent;

class CreateBlogContentAction
{
    use ImageUpload;

    /**
     * @param  array<mixed>  $data
     */
    public function handle(array $data): BlogContent
    {
        $thumbnail = isset($data['thumbnail']) ? $this->createImage($data['thumbnail'], 'blog-contents') : null;

        $blogContent = BlogContent::create([
            'blog_category_id' => $data['blog_category_id'],
            'author_id' => auth()->id(),
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => $data['status'],
            'thumbnail' => $thumbnail,
        ]);

        if ($data['status'] === 'published') {
            $blogContent->update(['published_at' => now()]);
        }

        return $blogContent;
    }
}
