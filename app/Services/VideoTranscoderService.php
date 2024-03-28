<?php

namespace App\Services;

use FFMpeg\Format\Video\X264;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Support\Facades\File;

class VideoTranscoderService
{
    /**
     * @return array<mixed>
     */

    public function transcodeVideo(string $videoFileName): array
    {
        // Check if the directory exists, if not, create it
        if (!File::exists(public_path('videos'))) {
            File::makeDirectory(public_path('videos'));
        }

        // Open the uploaded video
        $ffmpeg = FFMpeg::fromDisk('public')->open('courses/lessons/'.$videoFileName);

        // Define video formats (qualities) with their respective resolutions
        $formats = [
            ['format' => (new X264('aac', 'libx264'))->setKiloBitrate(6000), 'resolution' => '2K'], // Adjust bitrate as needed
            ['format' => (new X264('aac', 'libx264'))->setKiloBitrate(3000), 'resolution' => '1080p'], // Adjust bitrate as needed
            ['format' => (new X264('aac', 'libx264'))->setKiloBitrate(1500), 'resolution' => '720p'], // Adjust bitrate as needed
            ['format' => (new X264('aac', 'libx264'))->setKiloBitrate(750), 'resolution' => '480p'], // Adjust bitrate as needed
            ['format' => (new X264('aac', 'libx264'))->setKiloBitrate(500), 'resolution' => '360p'], // Adjust bitrate as needed
            ['format' => (new X264('aac', 'libx264'))->setKiloBitrate(300), 'resolution' => '240p'], // Adjust bitrate as needed
        ];

        $videoQualities = [];

        // Transcode the video into different qualities
        foreach ($formats as $index => $formatData) {
            $format = $formatData['format'];
            $resolution = $formatData['resolution'];

            $ffmpeg->export()
                   ->inFormat($format)
                   ->toDisk('public')
                   ->save("courses/lessons/qualities/{$resolution}.mp4");

            // Store video quality information
            $videoQualities[] = [
                'label' => 'Quality ' . ($index + 1) . ' - ' . $resolution,
                'resolution' => $resolution,
                'url' => "videos/{$resolution}.mp4"
            ];
        }

        return $videoQualities;
    }
}
