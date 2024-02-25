<?php

namespace App\Actions\Admin\Categories;

use App\Http\Traits\ImageUpload;
use App\Models\Category;

class UpdateCategoryAction
{
    use ImageUpload;

    /**
     * @param  array<mixed>  $data
     */
    public function handle(array $data, Category $category): Category
    {
        $image = isset($data['image']) && ! is_string($data['image']) ? $this->updateImage($data['image'], $category->image, 'categories') : $category->image;

        $category->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => filter_var($data['status'], FILTER_VALIDATE_BOOLEAN),
            'image' => $image,
        ]);

        return $category;
    }
}
