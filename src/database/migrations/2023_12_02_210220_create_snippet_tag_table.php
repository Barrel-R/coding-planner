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
        Schema::create('snippet_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('snippet_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('snnipet_tag', function (Blueprint $table) {
            $table->dropForeign(['snippet_id', 'tag_id']);
        });
        Schema::dropIfExists('snippet_tag');
    }
};
