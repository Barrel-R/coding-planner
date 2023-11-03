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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->dateTimeTz('finished_at');
            $table->dateTimeTz('due_date');
            $table->string('priority');
            $table->boolean('completed');
            $table->foreignId('project_id')->constrained();
            $table->unsignedBigInteger('assignee')->nullable();
            $table->foreign('assignee')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['project_id', 'assignee']);
        });
        Schema::dropIfExists('tasks');
    }
};
