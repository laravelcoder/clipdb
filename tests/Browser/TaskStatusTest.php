<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class TaskStatusTest extends DuskTestCase
{

    public function testCreateTaskStatus()
    {
        $admin = \App\User::find(1);
        $task_status = factory('App\TaskStatus')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $task_status) {
            $browser->loginAs($admin)
                ->visit(route('admin.task_statuses.index'))
                ->clickLink('Add new')
                ->type("name", $task_status->name)
                ->press('Save')
                ->assertRouteIs('admin.task_statuses.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $task_status->name)
                ->logout();
        });
    }

    public function testEditTaskStatus()
    {
        $admin = \App\User::find(1);
        $task_status = factory('App\TaskStatus')->create();
        $task_status2 = factory('App\TaskStatus')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $task_status, $task_status2) {
            $browser->loginAs($admin)
                ->visit(route('admin.task_statuses.index'))
                ->click('tr[data-entry-id="' . $task_status->id . '"] .btn-info')
                ->type("name", $task_status2->name)
                ->press('Update')
                ->assertRouteIs('admin.task_statuses.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $task_status2->name)
                ->logout();
        });
    }

    public function testShowTaskStatus()
    {
        $admin = \App\User::find(1);
        $task_status = factory('App\TaskStatus')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $task_status) {
            $browser->loginAs($admin)
                ->visit(route('admin.task_statuses.index'))
                ->click('tr[data-entry-id="' . $task_status->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $task_status->name)
                ->logout();
        });
    }

}
