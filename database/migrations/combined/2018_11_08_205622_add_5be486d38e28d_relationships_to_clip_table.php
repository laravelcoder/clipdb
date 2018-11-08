<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5be486d38e28dRelationshipsToClipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clips', function(Blueprint $table) {
            if (!Schema::hasColumn('clips', 'brand_id')) {
                $table->integer('brand_id')->unsigned()->nullable();
                $table->foreign('brand_id', '218039_5bc7a9c21cb82')->references('id')->on('brands')->onDelete('cascade');
                }
                if (!Schema::hasColumn('clips', 'industry_id')) {
                $table->integer('industry_id')->unsigned()->nullable();
                $table->foreign('industry_id', '218039_5bc128a1e54af')->references('id')->on('industries')->onDelete('cascade');
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
        Schema::table('clips', function(Blueprint $table) {
            if(Schema::hasColumn('clips', 'brand_id')) {
                $table->dropForeign('218039_5bc7a9c21cb82');
                $table->dropIndex('218039_5bc7a9c21cb82');
                $table->dropColumn('brand_id');
            }
            if(Schema::hasColumn('clips', 'industry_id')) {
                $table->dropForeign('218039_5bc128a1e54af');
                $table->dropIndex('218039_5bc128a1e54af');
                $table->dropColumn('industry_id');
            }
            
        });
    }
}
