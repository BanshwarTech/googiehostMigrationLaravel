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
        Schema::create('dedicated_server_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('title');
            $table->decimal('price', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->string('number_rating')->nullable();
            $table->string('star_rating')->nullable();
            $table->string('performance')->nullable();
            $table->string('speed')->nullable();
            $table->string('support')->nullable();
            $table->text('description')->nullable();
            $table->string('response_time')->nullable();
            $table->string('server_uptime')->nullable();
            $table->string('live_status')->nullable();
            $table->string('button_link')->nullable();
            $table->string('list_heading')->nullable();
            $table->text('list_point')->nullable();
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
        Schema::dropIfExists('dedicated_server_offers');
    }
};
