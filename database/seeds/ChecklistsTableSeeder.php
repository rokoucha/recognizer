<?php

use App\Checklist;
use Illuminate\Database\Seeder;

class ChecklistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checklists = [
            [
                'name' => 'Before creating PR',
                'user' => 1,
                'checks' => json_encode([
                    'ordered' => true,
                    'children' => [
                        [
                            'title' => 'Checked which commits are included',
                            'checked' => true,
                            'ordered' => false,
                            'children' => [],
                        ],
                        [
                            'title' => 'Comments are written ',
                            'checked' => true,
                            'ordered' => false,
                            'children' => [
                                [
                                    'title' => 'Issues are linked',
                                    'checked' => true,
                                    'ordered' => false,
                                    'children' => [],
                                ],
                                [
                                    'title' => 'Purpose are written',
                                    'checked' => true,
                                    'ordered' => false,
                                    'children' => [],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Projects are set',
                            'checked' => false,
                            'ordered' => false,
                            'children' => [],
                        ],
                        [
                            'title' => 'Milestone are set',
                            'checked' => false,
                            'ordered' => false,
                            'children' => [],
                        ],
                    ],
                ]),
                'description' => 'checklist',
                ],
                            [
                'name' => 'Before creating PR',
                'user' => 1,
                'checks' => json_encode([
                    'ordered' => true,
                    'children' => [
                        [
                            'title' => 'Checked which commits are included',
                            'checked' => true,
                            'ordered' => false,
                            'children' => [],
                        ],
                        [
                            'title' => 'Comments are written ',
                            'checked' => true,
                            'ordered' => false,
                            'children' => [
                                [
                                    'title' => 'Issues are linked',
                                    'checked' => true,
                                    'ordered' => false,
                                    'children' => [],
                                ],
                                [
                                    'title' => 'Purpose are written',
                                    'checked' => true,
                                    'ordered' => false,
                                    'children' => [],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Projects are set',
                            'checked' => false,
                            'ordered' => false,
                            'children' => [],
                        ],
                        [
                            'title' => 'Milestone are set',
                            'checked' => false,
                            'ordered' => false,
                            'children' => [],
                        ],
                    ],
                ]),
                'description' => 'checklist',
            ],
            [
                'name' => 'Tasks',
                'user' => 1,
                'checks' => json_encode([
                    'ordered' => false,
                    'children' => [
                        [
                            'title' => 'Buy milk',
                            'checked' => true,
                            'ordered' => false,
                            'children' => [],
                        ],
                        [
                            'title' => 'Throw away the rubbish',
                            'checked' => true,
                            'ordered' => false,
                            'children' => [],
                        ],
                        [
                            'title' => 'Read books',
                            'checked' => false,
                            'ordered' => false,
                            'children' => [],
                        ],
                    ],
                ]),
                'description' => 'Tasklist',
            ],
        ];

        foreach ($checklists as $checklist) {
            Checklist::create($checklist);
        }
    }
}
