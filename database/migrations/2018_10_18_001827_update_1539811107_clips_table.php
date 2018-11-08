<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1539811107ClipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clips', function (Blueprint $table) {
            
if (!Schema::hasColumn('clips', 'ad_enabled')) {
                $table->tinyInteger('ad_enabled')->nullable()->default('1');
                }
if (!Schema::hasColumn('clips', 'total_impressions')) {
                $table->integer('total_impressions')->nullable()->unsigned();
                }
if (!Schema::hasColumn('clips', 'recommended_frequency')) {
                $table->string('recommended_frequency')->nullable();
                }
if (!Schema::hasColumn('clips', 'ad_airing_date_first')) {
                $table->date('ad_airing_date_first')->nullable();
                }
if (!Schema::hasColumn('clips', 'ad_airing_date_last')) {
                $table->date('ad_airing_date_last')->nullable();
                }
if (!Schema::hasColumn('clips', 'duration')) {
                $table->string('duration')->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clips', function (Blueprint $table) {
            $table->dropColumn('ad_enabled');
            $table->dropColumn('total_impressions');
            $table->dropColumn('recommended_frequency');
            $table->dropColumn('ad_airing_date_first');
            $table->dropColumn('ad_airing_date_last');
            $table->dropColumn('duration');
            
        });

    }
}
