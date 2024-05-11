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
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('level');
            $table->string('level2');
            $table->string('level3');
            $table->string('level4');
<<<<<<< HEAD

            $table->string('level6');
=======
            $table->string('level5');
>>>>>>> 7498ed6b607ac4fcb6ffcfd46a5fb1a8ae98246b
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
    }
};