<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained();
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('phone_no')->unique();
            $table->string('ic_no')->unique()->nullable();
            $table->string('bank');
            $table->string('acc_no')->unique();
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('status')->nullable();
            $table->string('shirt_size')->nullable();
            $table->boolean('motor_license')->nullable();
            $table->boolean('car_license')->nullable();
            $table->boolean('oku_card')->nullable();
            $table->timestamp('enrolled_at')->nullable();
            $table->timestamp('resigned_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('emergency_name_1');
            $table->string('emergency_phone_no_1');
            $table->string('emergency_relation_1')->nullable();
            $table->string('emergency_name_2');
            $table->string('emergency_phone_no_2');
            $table->string('emergency_relation_2')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
