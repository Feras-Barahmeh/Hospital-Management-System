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
        Schema::create('assistant_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->unique(['name', 'note', 'assistant_id', 'locale']);
            $table->string('name');
            $table->text('note')->nullable();

            $table->foreignId('assistant_id')
                ->references('id')
                ->on('assistants')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistant_translations');
    }
};
