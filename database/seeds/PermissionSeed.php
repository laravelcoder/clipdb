<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'task_status_access',],
            ['id' => 18, 'title' => 'task_status_create',],
            ['id' => 19, 'title' => 'task_status_edit',],
            ['id' => 20, 'title' => 'task_status_view',],
            ['id' => 21, 'title' => 'task_status_delete',],
            ['id' => 22, 'title' => 'task_management_access',],
            ['id' => 23, 'title' => 'task_management_create',],
            ['id' => 24, 'title' => 'task_management_edit',],
            ['id' => 25, 'title' => 'task_management_view',],
            ['id' => 26, 'title' => 'task_management_delete',],
            ['id' => 27, 'title' => 'task_tag_access',],
            ['id' => 28, 'title' => 'task_tag_create',],
            ['id' => 29, 'title' => 'task_tag_edit',],
            ['id' => 30, 'title' => 'task_tag_view',],
            ['id' => 31, 'title' => 'task_tag_delete',],
            ['id' => 32, 'title' => 'task_access',],
            ['id' => 33, 'title' => 'task_create',],
            ['id' => 34, 'title' => 'task_edit',],
            ['id' => 35, 'title' => 'task_view',],
            ['id' => 36, 'title' => 'task_delete',],
            ['id' => 37, 'title' => 'task_calendar_access',],
            ['id' => 38, 'title' => 'task_calendar_create',],
            ['id' => 39, 'title' => 'task_calendar_edit',],
            ['id' => 40, 'title' => 'task_calendar_view',],
            ['id' => 41, 'title' => 'task_calendar_delete',],
            ['id' => 42, 'title' => 'clip_mgmt_access',],
            ['id' => 43, 'title' => 'clip_access',],
            ['id' => 44, 'title' => 'clip_create',],
            ['id' => 45, 'title' => 'clip_edit',],
            ['id' => 46, 'title' => 'clip_view',],
            ['id' => 47, 'title' => 'clip_delete',],
            ['id' => 48, 'title' => 'industry_access',],
            ['id' => 49, 'title' => 'industry_create',],
            ['id' => 50, 'title' => 'industry_edit',],
            ['id' => 51, 'title' => 'industry_view',],
            ['id' => 52, 'title' => 'industry_delete',],
            ['id' => 58, 'title' => 'detection_access',],
            ['id' => 59, 'title' => 'single_channel_access',],
            ['id' => 60, 'title' => 'multi_channel_access',],
            ['id' => 61, 'title' => 'all_channel_access',],
            ['id' => 71, 'title' => 'sources_mgmt_access',],
            ['id' => 72, 'title' => 'ftp_access',],
            ['id' => 73, 'title' => 'ftp_create',],
            ['id' => 74, 'title' => 'ftp_edit',],
            ['id' => 75, 'title' => 'ftp_view',],
            ['id' => 76, 'title' => 'ftp_delete',],
            ['id' => 82, 'title' => 'brand_access',],
            ['id' => 83, 'title' => 'brand_create',],
            ['id' => 84, 'title' => 'brand_edit',],
            ['id' => 85, 'title' => 'brand_view',],
            ['id' => 86, 'title' => 'brand_delete',],
            ['id' => 87, 'title' => 'gallery_access',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
