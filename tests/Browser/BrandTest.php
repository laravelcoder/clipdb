<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class BrandTest extends DuskTestCase
{

    public function testCreateBrand()
    {
        $admin = \App\User::find(1);
        $brand = factory('App\Brand')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $brand) {
            $browser->loginAs($admin)
                ->visit(route('admin.brands.index'))
                ->clickLink('Add new')
                ->type("name", $brand->name)
                ->attach("image", base_path("tests/_resources/test.jpg"))
                ->type("brand_url", $brand->brand_url)
                ->select("clip_id", $brand->clip_id)
                ->press('Save')
                ->assertRouteIs('admin.brands.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $brand->name)
                ->assertSeeIn("tr:last-child td[field-key='brand_url']", $brand->brand_url)
                ->logout();
        });
    }

    public function testEditBrand()
    {
        $admin = \App\User::find(1);
        $brand = factory('App\Brand')->create();
        $brand2 = factory('App\Brand')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $brand, $brand2) {
            $browser->loginAs($admin)
                ->visit(route('admin.brands.index'))
                ->click('tr[data-entry-id="' . $brand->id . '"] .btn-info')
                ->type("name", $brand2->name)
                ->attach("image", base_path("tests/_resources/test.jpg"))
                ->type("brand_url", $brand2->brand_url)
                ->select("clip_id", $brand2->clip_id)
                ->press('Update')
                ->assertRouteIs('admin.brands.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $brand2->name)
                ->assertSeeIn("tr:last-child td[field-key='brand_url']", $brand2->brand_url)
                ->logout();
        });
    }

    public function testShowBrand()
    {
        $admin = \App\User::find(1);
        $brand = factory('App\Brand')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $brand) {
            $browser->loginAs($admin)
                ->visit(route('admin.brands.index'))
                ->click('tr[data-entry-id="' . $brand->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $brand->name)
                ->assertSeeIn("td[field-key='brand_url']", $brand->brand_url)
                ->assertSeeIn("td[field-key='clip']", $brand->clip->title)
                ->logout();
        });
    }

}
