<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Phillip Madsen', 'email' => 'wecodelaravel@gmail.com', 'password' => '$2y$10$5Q40FSDXoA5hoRws.YDDyOv2PjqDCztuQHnXlgpn0t8G.dT9d/PHy', 'remember_token' => '', 'approved' => 1,],
            ['id' => 2, 'name' => 'Mark Hurst', 'email' => 'mark.hurst@sling.com', 'password' => '$2y$10$PC/1MhqBS4koTxDcXqnNOOeok6eOhRw013sAJDaPaRjsaeb3V3FRe', 'remember_token' => null, 'approved' => 1,],
            ['id' => 3, 'name' => 'Drew Major', 'email' => 'drew.major@sling.com', 'password' => '$2y$10$OzRvc3F3KCja01RcRrtYGOYcadKrbVUzqcC0VFRVuEsDnrs4kHgx2', 'remember_token' => null, 'approved' => 1,],
            ['id' => 4, 'name' => 'Jorg Nonnenmacher', 'email' => 'jorg.nonnenmacher@sling.com', 'password' => '$2y$10$CZn/FgVteweqr8fnvEKcTO0il5S.DCH/2VR2GhTx32sXOwvr2r5wC', 'remember_token' => null, 'approved' => 1,],
            ['id' => 5, 'name' => 'Adam Harral', 'email' => 'adam.harral@sling.com', 'password' => '$2y$10$JDyrsKsRYI768Uq7hXANv.60mCY62c7v00Z8fzKv/lv0qTRMurFHG', 'remember_token' => null, 'approved' => 1,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
