<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignUserIdToMesagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {   
            $table->index('id');
            $table->foreign('user_to')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_from')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('messages_user_to_foreign');
            $table->dropForeign('messages_user_from_foreign');
            $table->dropIndex('messages_id_index');
        });
    }
}
