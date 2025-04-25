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
        Schema::create('service_sections', function (Blueprint $table) {
            $table->id();
            // Define the foreign key column first
            $table->unsignedBigInteger('page_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');


            // Then apply the foreign key constraint
            $table->foreign('page_id')
                ->references('id')
                ->on('manage_pages')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_sections');
    }
};
