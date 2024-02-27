<?php

namespace App\Actions\Admin\Courses;

use App\Http\Traits\ImageUpload;
use App\Models\Category;
use App\Models\Course;

class CreateCourseAction
{
    use ImageUpload;

    /**
     * @param  array<mixed>  $data
     */
    public function handle(array $data): Course
    {
        $thumbnail = isset($data['thumbnail']) ? $this->createImage($data['thumbnail'], 'courses') : null;

        $course = Course::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'status' =>  $data['status'],
            'thumbnail' => $thumbnail,
        ]);

        return $course;
    }
}
