<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('jadwals', function (Blueprint $table) {
        $table->string('day')->after('id');
        $table->string('hour')->after('day');
    });
}

public function down()
{
    Schema::table('jadwals', function (Blueprint $table) {
        $table->dropColumn(['day', 'hour']);
    });
}

};
