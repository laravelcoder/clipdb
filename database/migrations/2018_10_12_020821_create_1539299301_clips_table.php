<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1539299301ClipsTable extends Migration
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
                $table->string('cid')->nullable();
                $table->string('title')->nullable();
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
