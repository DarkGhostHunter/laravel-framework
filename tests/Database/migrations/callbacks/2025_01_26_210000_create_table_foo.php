<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return (new class extends Migration {
    public function up()
    {
        Schema::create('foo', function (Blueprint $table) {
            $table->increments('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('example');
    }
})->afterUp(function () {
    Schema::create('bar', function (Blueprint $table) {
        $table->increments('id');
    });
})->beforeDown(function () {
    Schema::dropIfExists('bar');
});
