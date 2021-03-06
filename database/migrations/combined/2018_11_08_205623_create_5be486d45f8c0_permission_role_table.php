<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5be486d45f8c0PermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('permission_role')) {
            Schema::create('permission_role', function (Blueprint $table) {
                $table->integer('permission_id')->unsigned()->nullable();
                $table->foreign('permission_id', 'fk_p_218016_218017_role_p_5be486d45faa6')->references('id')->on('permissions')->onDelete('cascade');
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('role_id', 'fk_p_218017_218016_permis_5be486d45fbab')->references('id')->on('roles')->onDelete('cascade');
                
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
        Schema::dropIfExists('permission_role');
    }
}
