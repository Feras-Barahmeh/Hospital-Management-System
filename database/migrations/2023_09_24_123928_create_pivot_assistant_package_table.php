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
          // pivot_
        Schema::create('assistant_package', function (Blueprint $table) {
            $table->id();

            $table->foreignId('package_id')
                ->references('id')
                ->on('packages')
                ->onDelete('cascade');

            $table->foreignId('assistant_id')
                ->references('id')
                ->on('assistants')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_assistant_package');
    }
};
