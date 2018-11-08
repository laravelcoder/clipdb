<?php

use Illuminate\Database\Seeder;

class UserSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            1 => [
                'role' => [1, 3, 4],
            ],
            2 => [
                'role' => [1, 3],
            ],
            3 => [
                'role' => [1, 3],
            ],
            4 => [
                'role' => [1, 3],
            ],
            5 => [
                'role' => [1, 3],
            ],

        ];

        foreach ($items as $id => $item) {
            $user = \App\User::find($id);

            foreach ($item as $key => $ids) {
                $user->{$key}()->sync($ids);
            }
        }
    }
}
