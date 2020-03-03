<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetCascadeToOndeleteForForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('checklists', function (Blueprint $table) {
            $table->dropForeign(['user']);
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        Schema::table('attachments', function (Blueprint $table) {
            $table->dropForeign(['user']);
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->dropForeign(['checklist']);
            $table->foreign('checklist_id')
                  ->references('id')
                  ->on('checklists')
                  ->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('checklists', function (Blueprint $table) {
            $table->dropForeign(['users']);
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
        });
        Schema::table('attachments', function (Blueprint $table) {
            $table->dropForeign(['users']);
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            $table->dropForeign(['checklist']);
            $table->foreign('checklist_id')
                  ->references('id')
                  ->on('checklists');
        });

        Schema::enableForeignKeyConstraints();
    }
}
