<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1539299301ClipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('clips')) {
            Schema::create('clips', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->string('video')->nullable();
                $table->tinyInteger('ad_enabled')->nullable()->default('1');
                $table->integer('total_impressions')->nullable()->unsigned();
                $table->string('recommended_frequency')->nullable();
                $table->date('ad_airing_date_first')->nullable();
                $table->date('ad_airing_date_last')->nullable();
                $table->string('advertiser')->nullable();
                $table->string('product')->nullable();
                $table->text('description')->nullable();
                $table->text('notes')->nullable();
                $table->string('agency')->nullable();
                $table->string('sourceurl')->nullable();
                $table->string('imagespath')->nullable();
                $table->string('cai_path')->nullable();
                $table->string('caipyurl')->nullable();
                $table->string('isci_ad_id')->nullable();
                $table->string('copylength')->nullable();
                $table->string('media_content')->nullable();
                $table->string('media_filename')->nullable();
                $table->string('scheduledate')->nullable();
                $table->string('expirationdate')->nullable();
                $table->string('family')->nullable();
                $table->string('subfamily')->nullable();
                $table->string('group')->nullable();
                $table->string('caipy_clipids')->nullable();
                $table->string('reviewstate')->nullable();
                $table->tinyInteger('ignoreimport')->nullable()->default('1');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clips');
    }
}
