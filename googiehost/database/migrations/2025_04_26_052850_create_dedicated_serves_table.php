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
        Schema::create('dedicated_serves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('logo_image')->nullable();
            $table->string('read_review_url')->nullable();
            $table->string('deal_points')->nullable();
            $table->string('discount')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('rating')->nullable();
            $table->string('short_desc')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            // Then apply the foreign key constraint
            $table->foreign('page_id')
                ->references('id')
                ->on('manage_pages')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dedicated_serves');
    }
};
