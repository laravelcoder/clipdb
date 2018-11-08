<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1539819262VideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            if(Schema::hasColumn('videos', 'clip_id')) {
                $table->dropForeign('219968_5bc7a813020ed');
                $table->dropIndex('219968_5bc7a813020ed');
                $table->dropColumn('clip_id');
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
                        
        });

    }
}
