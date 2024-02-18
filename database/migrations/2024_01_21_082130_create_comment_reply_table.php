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
    Schema::create('comment_reply', function (Blueprint $table) {
      $table->foreignId('comment_id')
        ->constrained()
        ->cascadeOnDelete()
        ->cascadeOnUpdate();

      $table->foreignId('reply_id')
        ->constrained('comments')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('comment_reply');
  }
};
