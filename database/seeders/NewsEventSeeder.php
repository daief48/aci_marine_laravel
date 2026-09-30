<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\NewsEvent::truncate();

        $events = [
            [
                'iframe_url' => 'https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2Fmhi.acimarine%2Fposts%2Fpfbid02eKQMhtazD8ZcH6rerGXKPax1mU6XRPpKXLku7Hby1xrs82d19M6GV9LEfewNiqtbl&show_text=true&width=500',
                'post_url' => 'https://web.facebook.com/mhi.acimarine/posts/pfbid02eKQMhtazD8ZcH6rerGXKPax1mU6XRPpKXLku7Hby1xrs82d19M6GV9LEfewNiqtbl',
                'text' => 'ACI Limited, has launched world renowned Mitsubishi Marine Engines in Bangladesh.',
                'is_video' => false
            ],
            [
                'iframe_url' => 'https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fweb.facebook.com%2Fmhi.acimarine%2Fvideos%2F278832725121220%2F&show_text=true&width=auto',
                'post_url' => 'https://web.facebook.com/mhi.acimarine/videos/278832725121220/',
                'text' => "Bangladesh's largest Maritime & offshore exhibition, the 5th BIMOX Expo 2023 has come to an end.",
                'is_video' => true
            ],
            [
                'iframe_url' => 'https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fweb.facebook.com%2Fmhi.acimarine%2Fvideos%2F296414403183809%2F&show_text=false&width=476&t=0',
                'post_url' => 'https://web.facebook.com/mhi.acimarine/videos/296414403183809/',
                'text' => 'ACI Limited, has launched world renowned Mitsubishi Marine Engines in Bangladesh.',
                'is_video' => true
            ],
            [
                'iframe_url' => 'https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fweb.facebook.com%2Fmhi.acimarine%2Fvideos%2F334677995781426%2F&show_text=true&width=476&t=0',
                'post_url' => 'https://web.facebook.com/mhi.acimarine/videos/334677995781426/',
                'text' => 'ACI Limited, has launched world renowned Mitsubishi Marine Engines in Bangladesh.',
                'is_video' => true
            ],
            [
                'iframe_url' => 'https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fweb.facebook.com%2Fmhi.acimarine%2Fvideos%2F1154149655901149%2F&show_text=true&width=560&t=0',
                'post_url' => 'https://web.facebook.com/mhi.acimarine/videos/1154149655901149/',
                'text' => 'ACI Limited, has launched world renowned Mitsubishi Marine Engines in Bangladesh.',
                'is_video' => true
            ],
            [
                'iframe_url' => 'https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2Fmhi.acimarine%2Fposts%2Fpfbid0auBtpWHJVNHYvkFAAdmnzgKNuZwhxZ1b6eNECqtAKFzmB2uRoQUkG3c2ouuBcmoYl&show_text=true&width=500',
                'post_url' => 'https://web.facebook.com/mhi.acimarine/posts/pfbid0auBtpWHJVNHYvkFAAdmnzgKNuZwhxZ1b6eNECqtAKFzmB2uRoQUkG3c2ouuBcmoYl',
                'text' => 'ACI Limited, has launched world renowned Mitsubishi Marine Engines in Bangladesh.',
                'is_video' => false
            ],
        ];

        foreach ($events as $i => $event) {
            \App\Models\NewsEvent::create([
                'iframe_url' => $event['iframe_url'],
                'post_url' => $event['post_url'],
                'text' => $event['text'],
                'is_video' => $event['is_video'],
                'order' => $i + 1
            ]);
        }
    }
}
