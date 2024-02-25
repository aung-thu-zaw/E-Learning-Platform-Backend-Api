<?php

namespace App\Actions\Admin\Categories;

use App\Http\Traits\ImageUpload;
use App\Models\Category;

class CreateCategoryAction
{
    use ImageUpload;

    /**
     * @param  array<mixed>  $data
     */
    public function handle(array $data): Category
    {
        $image = isset($data['image']) ? $this->createImage($data['image'], 'categories') : null;

        $category = Category::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => filter_var($data['status'], FILTER_VALIDATE_BOOLEAN),
            'image' => $image,
        ]);

        return $category;
    }
}
