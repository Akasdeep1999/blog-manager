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
        Schema::create('seos', function (Blueprint $table) {
            $table->id();

            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();

            $table->string('page_title')->nullable();
            $table->string('page_slug')->nullable();

            $table->string('author')->nullable();
            $table->string('locale')->nullable();

            $table->string('og_title')->nullable();
            $table->string('ogimage')->nullable();
            $table->longText('og_description')->nullable();

            $table->string('twitter_card')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_title')->nullable();
            $table->longText('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seos');
    }
};
