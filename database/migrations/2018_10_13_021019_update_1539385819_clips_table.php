<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1539385819ClipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clips', function (Blueprint $table) {
            
if (!Schema::hasColumn('clips', 'advertiser')) {
                $table->string('advertiser')->nullable();
                }
if (!Schema::hasColumn('clips', 'brand')) {
                $table->string('brand')->nullable();
                }
if (!Schema::hasColumn('clips', 'product')) {
                $table->string('product')->nullable();
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
            $table->dropColumn('advertiser');
            $table->dropColumn('brand');
            $table->dropColumn('product');
            
        });

    }
}
