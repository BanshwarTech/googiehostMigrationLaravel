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
        Schema::create('paid_hostings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('plan_image')->nullable();
            $table->string('rating')->nullable();
            $table->text('listing_points')->nullable();
            $table->text('deal_points')->nullable();
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
        Schema::dropIfExists('paid_hostings');
    }
};
