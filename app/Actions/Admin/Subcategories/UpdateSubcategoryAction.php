<?php

namespace App\Actions\Admin\Subcategories;

use App\Http\Traits\ImageUpload;
use App\Models\Subcategory;

class UpdateSubcategoryAction
{
    use ImageUpload;

    /**
     * @param  array<mixed>  $data
     */
    public function handle(array $data, Subcategory $subcategory): Subcategory
    {
        $image = isset($data['image']) && ! is_string($data['image']) ? $this->updateImage($data['image'], $subcategory->image, 'subcategories') : $subcategory->image;

        $subcategory->update([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => filter_var($data['status'], FILTER_VALIDATE_BOOLEAN),
            'image' => $image,
        ]);

        return $subcategory;
    }
}
