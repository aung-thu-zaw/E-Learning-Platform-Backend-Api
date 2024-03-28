<?php

namespace App\Console\Commands;

use App\Models\Course;
use App\Models\LessonWatchTime;
use Illuminate\Console\Command;

class UpdateCourseWatchTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'courses:update-watch-time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the watch time of all courses based on lesson watch time seconds.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Updating course watch time...');

        $courses = Course::all();

        foreach ($courses as $course) {

            $totalWatchTime = LessonWatchTime::whereHas('lesson', function ($query) use ($course) {
                $query->where('course_id', $course->id);
            })->sum('watch_time_seconds');

            $course->courseWatchTime()->update(['watch_time_seconds' => $totalWatchTime]);

            $this->info("Updated watch time for course: {$course->id}");
        }

        $this->info('Course watch time updated successfully.');
    }
}
