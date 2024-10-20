<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id');
            $table->date('date');
            $table->string('shift');
            $table->integer('production_rate');
            $table->float('production_time',precision: 2);
            $table->float('working_rate',precision: 2);
            $table->float('JPH',precision: 2);
            $table->text('body');
            $table->string('image')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
