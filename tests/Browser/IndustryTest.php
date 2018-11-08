<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class IndustryTest extends DuskTestCase
{

    public function testCreateIndustry()
    {
        $admin = \App\User::find(1);
        $industry = factory('App\Industry')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $industry) {
            $browser->loginAs($admin)
                ->visit(route('admin.industries.index'))
                ->clickLink('Add new')
                ->type("name", $industry->name)
                ->type("slug", $industry->slug)
                ->select("clip_id", $industry->clip_id)
                ->press('Save')
                ->assertRouteIs('admin.industries.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $industry->name)
                ->assertSeeIn("tr:last-child td[field-key='slug']", $industry->slug)
                ->assertSeeIn("tr:last-child td[field-key='clip']", $industry->clip->title)
                ->logout();
        });
    }

    public function testEditIndustry()
    {
        $admin = \App\User::find(1);
        $industry = factory('App\Industry')->create();
        $industry2 = factory('App\Industry')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $industry, $industry2) {
            $browser->loginAs($admin)
                ->visit(route('admin.industries.index'))
                ->click('tr[data-entry-id="' . $industry->id . '"] .btn-info')
                ->type("name", $industry2->name)
                ->type("slug", $industry2->slug)
                ->select("clip_id", $industry2->clip_id)
                ->press('Update')
                ->assertRouteIs('admin.industries.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $industry2->name)
                ->assertSeeIn("tr:last-child td[field-key='slug']", $industry2->slug)
                ->assertSeeIn("tr:last-child td[field-key='clip']", $industry2->clip->title)
                ->logout();
        });
    }

    public function testShowIndustry()
    {
        $admin = \App\User::find(1);
        $industry = factory('App\Industry')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $industry) {
            $browser->loginAs($admin)
                ->visit(route('admin.industries.index'))
                ->click('tr[data-entry-id="' . $industry->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $industry->name)
                ->assertSeeIn("td[field-key='slug']", $industry->slug)
                ->assertSeeIn("td[field-key='clip']", $industry->clip->title)
                ->logout();
        });
    }

}
