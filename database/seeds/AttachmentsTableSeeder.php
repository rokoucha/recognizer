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
                'name' => 'checklist.png',
                'user_id' => 1,
                'checklist_id' => 1,
                'path' => 'public/attachments/checklist.png',
                'url' => '/images/checklist.png',
            ],
            [
                'name' => 'editor.png',
                'user_id' => 1,
                'checklist_id' => 1,
                'path' => 'public/attachments/checklist.png',
                'url' => '/images/editor.png',
            ],
        ];

        foreach ($attachments as $attachment) {
            Attachment::create($attachment);
        }
    }
}
