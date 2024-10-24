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
            /*
                name                -> string           -> obbligatorio, no default
                slug                -> string           -> obbligatorio, no default, unica
                price               -> decimal          -> obbligatorio, no default, senza segno
                description         -> text             -> obbligatorio, no default
                img                 -> string           -> facoltativo, default (null)
                quantity            -> integer          -> obbligatorio, default (0), senza segno
                category            -> string           -> obbligatorio, no default
                tags                -> text             -> facoltativo, no default
                visible             -> boolean          -> obbligatorio, default (true)
            */
            $table->string('name', 64);
            $table->string('slug', 64)->unique();
            $table->decimal('price', 5, 2)->unsigned();
            $table->text('description');
            $table->string('img', 2048)->nullable();
            $table->integer('quantity')->default(0);
            $table->string('category', 16);
            $table->text('tags')->nullable();
            $table->boolean('visible')->default(true);
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
