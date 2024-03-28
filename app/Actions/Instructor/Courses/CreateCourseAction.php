<?php

namespace App\Actions\Instructor\Courses;

use App\Http\Traits\ImageUpload;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Resource;
use App\Models\VideoQuality;
use App\Services\VideoTranscoderService;
use Illuminate\Support\Str;

class CreateCourseAction
{
    use ImageUpload;

    /**
     * @param  array<mixed>  $data
     */
    public function handle(array $data): Course
    {
        $thumbnail = isset($data['thumbnail']) ? $this->createImage($data['thumbnail'], 'courses/thumbnails') : null;

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
            foreach ($data['resources'] as $key => $value) {
                $filePath = $this->createImage($value, 'courses/resources');

                $originalTitle = $value->getClientOriginalName();

                Resource::create([
                    'course_id' => $course->id,
                    'title' => $originalTitle,
                    'file_path' => $filePath,
                ]);
            }
        }

        $totalDuration = 0;
        if (isset($data['videos'])) {
            foreach ($data['videos'] as $video) {
                // $videoFileName = $this->createImage($video['video_file'], 'courses/lessons');

                // if ($videoFileName) {
                $videoQualities = (new VideoTranscoderService())->transcodeVideo('good.mp4');
                // }

                $lesson = Lesson::create([
                    'section_id' => 1,
                    'title' => $video['title'],
                    'video_path' => 'good.mp4',
                    'duration_seconds' => $video['duration_seconds'],
                ]);

                foreach ($videoQualities as $quality) {
                    VideoQuality::create([
                        'lesson_id' => $lesson->id,
                        'label' => $quality['label'],
                        'resolution' => $quality['resolution'],
                        'url' => $quality['url'],
                    ]);
                }

                $totalDuration += $video['duration_seconds'];
            }
        }

        $course->update(['duration_seconds' => $totalDuration]);

        return $course;
    }
}
