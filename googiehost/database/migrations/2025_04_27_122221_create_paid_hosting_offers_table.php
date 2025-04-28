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
        Schema::create('paid_hosting_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('title');                  // e.g., "Rock–Solid Hosting, Unbelievable Price"
            $table->string('offer_text')->nullable();              // e.g., "Get up to 80% OFF, $0.6/Mo + 3 Month Free"
            $table->string('image')->nullable();       // banner image path
            $table->text('description')->nullable();               // full description about the offer
            $table->string('button_link')->nullable(); // offer activation link
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
        Schema::dropIfExists('paid_hosting_offers');
    }
};
