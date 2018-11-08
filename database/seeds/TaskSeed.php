<?php

use Illuminate\Database\Seeder;

class TaskSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Image Magic', 'description' => 'add image magic to site', 'status_id' => 1, 'attachment' => null, 'due_date' => '', 'user_id' => 1,],
            ['id' => 2, 'name' => 'install functions for Google Cloud Vision', 'description' => 'needed for text recognition

have to determine best way to integrate this part.

', 'status_id' => 1, 'attachment' => null, 'due_date' => '', 'user_id' => 1,],
            ['id' => 3, 'name' => 'Dyna Video Cut', 'description' => 'not sure what this is in the screenshot but need to integrate it.', 'status_id' => 1, 'attachment' => null, 'due_date' => '', 'user_id' => 1,],
            ['id' => 4, 'name' => 'integrate the tocai server part', 'description' => 'this happens on video upload. 

', 'status_id' => 1, 'attachment' => null, 'due_date' => '', 'user_id' => 1,],
            ['id' => 5, 'name' => 'Interactivity ', 'description' => 'This has to do with the remote part and at this time is not needed. ', 'status_id' => 1, 'attachment' => null, 'due_date' => '', 'user_id' => null,],
            ['id' => 6, 'name' => 'Auto Group Detection', 'description' => 'Automotically add to a group designated by google return keywords or logos

Future addon', 'status_id' => 1, 'attachment' => null, 'due_date' => '', 'user_id' => null,],
            ['id' => 7, 'name' => 'Register New Clip', 'description' => 'this is after you manually upload or select a clip in the gallery. you can process it and determin if its one of interest.

this shows images from clip to select and send to google.', 'status_id' => 1, 'attachment' => null, 'due_date' => '', 'user_id' => 1,],
            ['id' => 8, 'name' => 'Dedup ', 'description' => null, 'status_id' => 1, 'attachment' => null, 'due_date' => '', 'user_id' => null,],
            ['id' => 9, 'name' => 'Redistribution', 'description' => null, 'status_id' => 1, 'attachment' => null, 'due_date' => '', 'user_id' => null,],

        ];

        foreach ($items as $item) {
            \App\Task::create($item);
        }
    }
}
