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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string("hotel_name");
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            $table->integer("rooms_num");
            $table->integer("tags_num");
            $table->integer("facilities_num");
            $table->decimal("total_price");
            $table->decimal("net_price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
