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
        Schema::create('developer_project', function (Blueprint $table) {
            $table->uuid('id', 36)->primary()->unique();
            $table->foreignUuid('project_id')->constrained('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('developer_id')->constrained('developers')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_employees');
    }
};
