<?php

namespace App\Actions\Admin\Sliders;

use App\Http\Traits\ImageUpload;
use App\Models\Slider;

class CreateSliderAction
{
    use ImageUpload;

    /**
     * @param  array<mixed>  $data
     */
    public function handle(array $data): Slider
    {
        $image = isset($data['image']) ? $this->createImage($data['image'], 'sliders') : null;

        $slider = Slider::create([
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
