<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->string('neighborhood');
            $table->string('number');
            $table->foreignId('user_id')->nullable()->constrained('user');
            $table->foreignId('company_id')->nullable()->constrained('company');
            $table->foreignId('point_id')->nullable()->constrained('company');
            $table->foreignId('city_id')->constrained('city');
            $table->foreignId('state_id')->constrained('state');
            $table->timestamps();
        });
    }
    
    // model Address {
    //     city      City      @relation(fields: [cityId], references: [id])
    //     state     State     @relation(fields: [stateId], references: [id])
    //   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
