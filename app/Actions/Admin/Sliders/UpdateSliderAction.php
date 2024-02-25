<?php

namespace App\Actions\Admin\Sliders;

use App\Http\Traits\ImageUpload;
use App\Models\Slider;

class UpdateSliderAction
{
    use ImageUpload;

    /**
     * @param  array<mixed>  $data
     */
    public function handle(array $data, Slider $slider): Slider
    {
        $image = isset($data['image']) && ! is_string($data['image']) ? $this->updateImage($data['image'], $slider->image, 'sliders') : $slider->image;

        $slider->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'button' => $data['button'],
            'url' => $data['url'],
            'status' => filter_var($data['status'], FILTER_VALIDATE_BOOLEAN),
            'image' => $image,
        ]);

        return $slider;
    }
}
