<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('description')->nullable();
            $table->date('date')->nullable();
            $table->boolean('is_active')->default(true);
            
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_tag')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
