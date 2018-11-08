<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class TaskTest extends DuskTestCase
{

    public function testCreateTask()
    {
        $admin = \App\User::find(1);
        $task = factory('App\Task')->make();

        $relations = [
            factory('App\TaskTag')->create(), 
            factory('App\TaskTag')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $task, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.tasks.index'))
                ->clickLink('Add new')
                ->type("name", $task->name)
                ->type("description", $task->description)
                ->select("status_id", $task->status_id)
                ->select('select[name="tag[]"]', $relations[0]->id)
                ->select('select[name="tag[]"]', $relations[1]->id)
                ->attach("attachment", base_path("tests/_resources/test.jpg"))
                ->type("due_date", $task->due_date)
                ->select("user_id", $task->user_id)
                ->press('Save')
                ->assertRouteIs('admin.tasks.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $task->name)
                ->assertSeeIn("tr:last-child td[field-key='description']", $task->description)
                ->assertSeeIn("tr:last-child td[field-key='status']", $task->status->name)
                ->assertSeeIn("tr:last-child td[field-key='tag'] span:first-child", $relations[0]->name)
                ->assertSeeIn("tr:last-child td[field-key='tag'] span:last-child", $relations[1]->name)
                ->assertVisible("a[href='" . env("APP_URL") . "/" . env("UPLOAD_PATH") . "/" . \App\Task::first()->attachment . "']")
                ->assertSeeIn("tr:last-child td[field-key='due_date']", $task->due_date)
                ->assertSeeIn("tr:last-child td[field-key='user']", $task->user->name)
                ->logout();
        });
    }

    public function testEditTask()
    {
        $admin = \App\User::find(1);
        $task = factory('App\Task')->create();
        $task2 = factory('App\Task')->make();

        $relations = [
            factory('App\TaskTag')->create(), 
            factory('App\TaskTag')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $task, $task2, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.tasks.index'))
                ->click('tr[data-entry-id="' . $task->id . '"] .btn-info')
                ->type("name", $task2->name)
                ->type("description", $task2->description)
                ->select("status_id", $task2->status_id)
                ->select('select[name="tag[]"]', $relations[0]->id)
                ->select('select[name="tag[]"]', $relations[1]->id)
                ->attach("attachment", base_path("tests/_resources/test.jpg"))
                ->type("due_date", $task2->due_date)
                ->select("user_id", $task2->user_id)
                ->press('Update')
                ->assertRouteIs('admin.tasks.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $task2->name)
                ->assertSeeIn("tr:last-child td[field-key='description']", $task2->description)
                ->assertSeeIn("tr:last-child td[field-key='status']", $task2->status->name)
                ->assertSeeIn("tr:last-child td[field-key='tag'] span:first-child", $relations[0]->name)
                ->assertSeeIn("tr:last-child td[field-key='tag'] span:last-child", $relations[1]->name)
                ->assertVisible("a[href='" . env("APP_URL") . "/" . env("UPLOAD_PATH") . "/" . \App\Task::first()->attachment . "']")
                ->assertSeeIn("tr:last-child td[field-key='due_date']", $task2->due_date)
                ->assertSeeIn("tr:last-child td[field-key='user']", $task2->user->name)
                ->logout();
        });
    }

    public function testShowTask()
    {
        $admin = \App\User::find(1);
        $task = factory('App\Task')->create();

        $relations = [
            factory('App\TaskTag')->create(), 
            factory('App\TaskTag')->create(), 
        ];

        $task->tag()->attach([$relations[0]->id, $relations[1]->id]);

        $this->browse(function (Browser $browser) use ($admin, $task, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.tasks.index'))
                ->click('tr[data-entry-id="' . $task->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $task->name)
                ->assertSeeIn("td[field-key='description']", $task->description)
                ->assertSeeIn("td[field-key='status']", $task->status->name)
                ->assertSeeIn("tr:last-child td[field-key='tag'] span:first-child", $relations[0]->name)
                ->assertSeeIn("tr:last-child td[field-key='tag'] span:last-child", $relations[1]->name)
                ->assertSeeIn("td[field-key='due_date']", $task->due_date)
                ->assertSeeIn("td[field-key='user']", $task->user->name)
                ->logout();
        });
    }

}
