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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('number', 16)->unique();
            $table->string('title', 150);
            $table->foreignId('community_id')
              ->constrained()
              ->cascadeOnDelete()
              ->cascadeOnUpdate();
            $table->foreignId('poster_id')
              ->nullable()
              ->constrained('users')
              ->nullOnDelete()
              ->cascadeOnUpdate();
            $table->timestamp('posted_at');
            $table->timestamp('edited_at')->nullable();
            $table->softDeletes('archived_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
