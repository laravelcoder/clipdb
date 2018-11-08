<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ClipTest extends DuskTestCase
{

    public function testCreateClip()
    {
        $admin = \App\User::find(1);
        $clip = factory('App\Clip')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $clip) {
            $browser->loginAs($admin)
                ->visit(route('admin.clips.index'))
                ->clickLink('Add new')
                ->type("title", $clip->title)
                ->attach("video", base_path("tests/_resources/test.jpg"))
                ->uncheck("ad_enabled")
                ->type("total_impressions", $clip->total_impressions)
                ->type("recommended_frequency", $clip->recommended_frequency)
                ->type("ad_airing_date_first", $clip->ad_airing_date_first)
                ->type("ad_airing_date_last", $clip->ad_airing_date_last)
                ->select("brand_id", $clip->brand_id)
                ->select("industry_id", $clip->industry_id)
                ->type("advertiser", $clip->advertiser)
                ->type("product", $clip->product)
                ->type("description", $clip->description)
                ->type("notes", $clip->notes)
                ->type("agency", $clip->agency)
                ->type("sourceurl", $clip->sourceurl)
                ->type("imagespath", $clip->imagespath)
                ->type("cai_path", $clip->cai_path)
                ->type("caipyurl", $clip->caipyurl)
                ->type("isci_ad_id", $clip->isci_ad_id)
                ->type("copylength", $clip->copylength)
                ->type("media_content", $clip->media_content)
                ->type("media_filename", $clip->media_filename)
                ->type("scheduledate", $clip->scheduledate)
                ->type("expirationdate", $clip->expirationdate)
                ->type("family", $clip->family)
                ->type("subfamily", $clip->subfamily)
                ->type("group", $clip->group)
                ->type("caipy_clipids", $clip->caipy_clipids)
                ->type("reviewstate", $clip->reviewstate)
                ->uncheck("ignoreimport")
                ->press('Save')
                ->assertRouteIs('admin.clips.index')
                ->assertSeeIn("tr:last-child td[field-key='title']", $clip->title)
                ->assertVisible("a[href='" . env("APP_URL") . "/" . env("UPLOAD_PATH") . "/" . \App\Clip::first()->video . "']")
                ->logout();
        });
    }

    public function testEditClip()
    {
        $admin = \App\User::find(1);
        $clip = factory('App\Clip')->create();
        $clip2 = factory('App\Clip')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $clip, $clip2) {
            $browser->loginAs($admin)
                ->visit(route('admin.clips.index'))
                ->click('tr[data-entry-id="' . $clip->id . '"] .btn-info')
                ->type("title", $clip2->title)
                ->attach("video", base_path("tests/_resources/test.jpg"))
                ->uncheck("ad_enabled")
                ->type("total_impressions", $clip2->total_impressions)
                ->type("recommended_frequency", $clip2->recommended_frequency)
                ->type("ad_airing_date_first", $clip2->ad_airing_date_first)
                ->type("ad_airing_date_last", $clip2->ad_airing_date_last)
                ->select("brand_id", $clip2->brand_id)
                ->select("industry_id", $clip2->industry_id)
                ->type("advertiser", $clip2->advertiser)
                ->type("product", $clip2->product)
                ->type("description", $clip2->description)
                ->type("notes", $clip2->notes)
                ->type("agency", $clip2->agency)
                ->type("sourceurl", $clip2->sourceurl)
                ->type("imagespath", $clip2->imagespath)
                ->type("cai_path", $clip2->cai_path)
                ->type("caipyurl", $clip2->caipyurl)
                ->type("isci_ad_id", $clip2->isci_ad_id)
                ->type("copylength", $clip2->copylength)
                ->type("media_content", $clip2->media_content)
                ->type("media_filename", $clip2->media_filename)
                ->type("scheduledate", $clip2->scheduledate)
                ->type("expirationdate", $clip2->expirationdate)
                ->type("family", $clip2->family)
                ->type("subfamily", $clip2->subfamily)
                ->type("group", $clip2->group)
                ->type("caipy_clipids", $clip2->caipy_clipids)
                ->type("reviewstate", $clip2->reviewstate)
                ->uncheck("ignoreimport")
                ->press('Update')
                ->assertRouteIs('admin.clips.index')
                ->assertSeeIn("tr:last-child td[field-key='title']", $clip2->title)
                ->assertVisible("a[href='" . env("APP_URL") . "/" . env("UPLOAD_PATH") . "/" . \App\Clip::first()->video . "']")
                ->logout();
        });
    }

    public function testShowClip()
    {
        $admin = \App\User::find(1);
        $clip = factory('App\Clip')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $clip) {
            $browser->loginAs($admin)
                ->visit(route('admin.clips.index'))
                ->click('tr[data-entry-id="' . $clip->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='title']", $clip->title)
                ->assertChecked("ad_enabled")
                ->assertSeeIn("td[field-key='total_impressions']", $clip->total_impressions)
                ->assertSeeIn("td[field-key='recommended_frequency']", $clip->recommended_frequency)
                ->assertSeeIn("td[field-key='ad_airing_date_first']", $clip->ad_airing_date_first)
                ->assertSeeIn("td[field-key='ad_airing_date_last']", $clip->ad_airing_date_last)
                ->assertSeeIn("td[field-key='brand']", $clip->brand->name)
                ->assertSeeIn("td[field-key='industry']", $clip->industry->name)
                ->assertSeeIn("td[field-key='advertiser']", $clip->advertiser)
                ->assertSeeIn("td[field-key='product']", $clip->product)
                ->assertSeeIn("td[field-key='description']", $clip->description)
                ->assertSeeIn("td[field-key='notes']", $clip->notes)
                ->assertSeeIn("td[field-key='agency']", $clip->agency)
                ->assertSeeIn("td[field-key='sourceurl']", $clip->sourceurl)
                ->assertSeeIn("td[field-key='imagespath']", $clip->imagespath)
                ->assertSeeIn("td[field-key='cai_path']", $clip->cai_path)
                ->assertSeeIn("td[field-key='caipyurl']", $clip->caipyurl)
                ->assertSeeIn("td[field-key='isci_ad_id']", $clip->isci_ad_id)
                ->assertSeeIn("td[field-key='copylength']", $clip->copylength)
                ->assertSeeIn("td[field-key='media_content']", $clip->media_content)
                ->assertSeeIn("td[field-key='media_filename']", $clip->media_filename)
                ->assertSeeIn("td[field-key='scheduledate']", $clip->scheduledate)
                ->assertSeeIn("td[field-key='expirationdate']", $clip->expirationdate)
                ->assertSeeIn("td[field-key='family']", $clip->family)
                ->assertSeeIn("td[field-key='subfamily']", $clip->subfamily)
                ->assertSeeIn("td[field-key='group']", $clip->group)
                ->assertSeeIn("td[field-key='caipy_clipids']", $clip->caipy_clipids)
                ->assertSeeIn("td[field-key='reviewstate']", $clip->reviewstate)
                ->assertChecked("ignoreimport")
                ->logout();
        });
    }

}
