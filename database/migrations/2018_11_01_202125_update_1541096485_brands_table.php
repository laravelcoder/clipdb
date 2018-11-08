<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1541096485BrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            if(Schema::hasColumn('brands', 'industry_id')) {
                $table->dropForeign('219969_5bc7a94a17249');
                $table->dropIndex('219969_5bc7a94a17249');
                $table->dropColumn('industry_id');
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
        Schema::table('brands', function (Blueprint $table) {
                        
        });

    }
}
