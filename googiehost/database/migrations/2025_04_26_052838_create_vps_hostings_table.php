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
        Schema::create('vps_hostings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('logo_image')->nullable();
            $table->string('offer_image')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('coupon_code')->nullable();
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
        Schema::dropIfExists('vps_hostings');
    }
};
