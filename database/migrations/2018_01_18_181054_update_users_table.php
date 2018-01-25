<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->string('surname');
        $table->date('date_of_birth');
        $table->string('phone');
        $table->string('address');
        $table->string('city');
        $table->string('zip');
        $table->integer('country_id')->unsigned();
        $table->boolean('is_admin');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('is_admin');
        $table->dropColumn('country_id');
        $table->dropColumn('zip');
        $table->dropColumn('city');
        $table->dropColumn('address');
        $table->dropColumn('phone');
        $table->dropColumn('date_of_birth');
        $table->dropColumn('surname');

      });
    }
}
