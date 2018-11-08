<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5be486d3e3e65RelationshipsToIndustryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('industries', function(Blueprint $table) {
            if (!Schema::hasColumn('industries', 'clip_id')) {
                $table->integer('clip_id')->unsigned()->nullable();
                $table->foreign('clip_id', '218278_5bdb446644137')->references('id')->on('clips')->onDelete('cascade');
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
        Schema::table('industries', function(Blueprint $table) {
            if(Schema::hasColumn('industries', 'clip_id')) {
                $table->dropForeign('218278_5bdb446644137');
                $table->dropIndex('218278_5bdb446644137');
                $table->dropColumn('clip_id');
            }
            
        });
    }
}
