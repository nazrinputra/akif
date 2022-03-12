<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn(['commission', 'custom_price']);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['commission', 'custom_price']);
        });

        Schema::table('queues', function (Blueprint $table) {
            $table->dropColumn(['move', 'package_custom_price']);
        });

        Schema::dropIfExists('commissions');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('queue_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->morphs('claimable');
            $table->string('value');
            $table->timestamps();
        });

        Schema::table('queues', function (Blueprint $table) {
            $table->string('package_custom_price')->nullable();
            $table->integer('move')->nullable();
        });

        Schema::table('packages', function (Blueprint $table) {
            $table->boolean('custom_price')->nullable();
            $table->integer('commission')->nullable();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->boolean('custom_price')->nullable();
            $table->integer('commission')->nullable();
        });
    }
}
