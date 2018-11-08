<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1539823436VideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            if(Schema::hasColumn('videos', 'duration')) {
                $table->dropColumn('duration');
            }
            
        });
Schema::table('videos', function (Blueprint $table) {
            
if (!Schema::hasColumn('videos', 'ad_duration')) {
                $table->time('ad_duration')->nullable();
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
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('ad_duration');
            
        });
Schema::table('videos', function (Blueprint $table) {
                        $table->time('duration')->nullable();
                
        });

    }
}
