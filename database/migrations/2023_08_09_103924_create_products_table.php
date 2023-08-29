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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('pname');
            $table->string('category_id');
            $table->string('price');
            $table->string('dprice');
            $table->string('sku');
            $table->string('age');
            $table->string('products');
            $table->string('areyou');
            $table->text('pdesc');
            $table->text('psdesc');
            $table->string('mtitle');
            $table->text('mdesc');
            $table->string('otitle');
            $table->text('odesc');
            $table->string('mainimg');
            $table->string('subimg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
