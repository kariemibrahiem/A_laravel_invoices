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
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments("id");
            $table->string("invoice_name");
            $table->date("date");
            $table->date("due_date");
            $table->string("product");
            $table->string("section");
            $table->string("discoint");
            $table->string("rate_vate");
            $table->decimal("value_vate");
            $table->decimal("total" , 8 ,2);
            $table->string("status");
            $table->integer("value_status");
            $table->text("note")->nullable();
            $table->string("user");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
