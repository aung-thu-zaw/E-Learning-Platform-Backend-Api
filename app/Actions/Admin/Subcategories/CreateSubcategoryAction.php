<?php

namespace App\Actions\Admin\Subcategories;

use App\Http\Traits\ImageUpload;
use App\Models\Subcategory;

class CreateSubcategoryAction
{
    use ImageUpload;

    /**
     * @param  array<mixed>  $data
     */
    public function handle(array $data): Subcategory
    {
        $image = isset($data['image']) ? $this->createImage($data['image'], 'subcategories') : null;

        $subcategory = Subcategory::create([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => filter_var($data['status'], FILTER_VALIDATE_BOOLEAN),
            'image' => $image,
        ]);

        return $subcategory;
    }
}
