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
        Schema::create('snippets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('code');
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('snippets', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'tag_id']);
        });
        Schema::dropIfExists('snippets');
    }
};
