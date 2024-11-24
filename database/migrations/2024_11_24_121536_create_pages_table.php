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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('pageName');
            $table->string('slug');
            $table->string('pageUrl');
            $table->string('metaTitle');
            $table->string('metaKeywords');
            $table->text('metaDescription');
            $table->text('headerScript');
            $table->text('footerScript');
            $table->enum('pageStatus', ['publish', 'unpublish'])->default('publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
