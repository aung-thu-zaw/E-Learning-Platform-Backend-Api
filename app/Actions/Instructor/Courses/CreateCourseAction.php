<?php

namespace App\Actions\Instructor\Courses;

use App\Http\Traits\ImageUpload;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Resource;
use Illuminate\Support\Str;

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
            'uuid' => Str::uuid(),
            'instructor_id' => auth()->id(),
            'category_id' => $data['category_id'],
            'subcategory_id' => $data['subcategory_id'],
            'title' => $data['title'],
            'course_description' => $data['course_description'],
            'project_description' => $data['project_description'],
            'level' => $data['level'],
            'language' => $data['language'],
            'status' => $data['status'],
            'thumbnail' => $thumbnail,
        ]);


        if (isset($data['tags'])) {

            $course->tags()->attach($data['tags']);

        }

        if (isset($data['resources'])) {

            foreach($data['resources'] as $key => $value) {
                $filePath =  $this->createImage($value, 'resources');

                $originalTitle = $value->getClientOriginalName();

                Resource::create([
                    "course_id" => $course->id,
                    "title" => $originalTitle,
                    "file_path" => $filePath,
                ]);
            }

        }

        if (isset($data['videos'])) {

            foreach($data['videos'] as $video) {
                $videoPath =  $this->createImage($video['video_file'], 'lessons');

                Lesson::create([
                    "course_id" => $course->id,
                    "title" => $video["title"],
                    "video_path" => $videoPath,
                    'duration_seconds' => $video["duration_seconds"],
                ]);
            }

        }

        return $course;
    }
}
