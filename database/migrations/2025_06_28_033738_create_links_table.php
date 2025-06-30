<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->text('original_url');
            $table->string('short_slug', 32)->unique();
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('set null');
            $table->timestamps();
            $table->unsignedBigInteger('clicks')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
