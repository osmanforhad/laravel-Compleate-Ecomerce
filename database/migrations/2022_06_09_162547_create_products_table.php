<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id')->length(20)->comment('Relationship with categories Table id');
            $table->string('name')->length(300);
            $table->string('slug')->length(300);
            $table->mediumText('small_description')->length(5000)->nullable();;
            $table->longText('description')->length(5000)->nullable();;
            $table->integer('original_price')->length(11);
            $table->integer('selling_price')->length(11);;
            $table->string('image')->nullable();
            $table->integer('qty');
            $table->string('tax')->default(0);
            $table->integer('status')->default(0)->comment('0 means unActive 1 means active');
            $table->integer('trending')->default(0)->comment('0 means notTrending 1 means trending');
            $table->string('meta_title')->length(300)->nullable();
            $table->string('meta_keywords')->length(300)->nullable();
            $table->string('meta_description')->length(400)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
