<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name')->unique();
            $table->boolean('custom_price')->nullable();
            $table->integer('price')->nullable();
            $table->integer('commission')->nullable();
            $table->string('frequency');
            $table->string('duration');
            $table->text('description');
            $table->boolean('promotion');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
