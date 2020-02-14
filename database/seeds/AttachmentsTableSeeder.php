<?php

use App\Attachment;
use Illuminate\Database\Seeder;

class AttachmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attachments = [
            [
                'name' => 'pr.png',
                'user' => 1,
                'checklist' => 1,
                'path' => '/upload/pr.png'
            ],
            [
                'name' => 'good.png',
                'user' => 1,
                'checklist' => 1,
                'path' => '/upload/good-pr.png'
            ],
        ];

        foreach ($attachments as $attachment) {
            Attachment::create($attachment);
        }
    }
}
