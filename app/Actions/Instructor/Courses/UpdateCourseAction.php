<?php

namespace App\Actions\Instructor\Courses;

use App\Http\Traits\ImageUpload;
use App\Models\Course;

class UpdateCourseAction
{
    use ImageUpload;

    /**
     * @param  array<mixed>  $data
     */
    public function handle(array $data, Course $course): Course
    {
        $thumbnail = isset($data['thumbnail']) && ! is_string($data['thumbnail']) ? $this->updateImage($data['thumbnail'], $course->thumbnail, 'courses') : $course->thumbnail;

        $course->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => $data['status'],
            'thumbnail' => $thumbnail,
        ]);

        return $course;
    }
}
