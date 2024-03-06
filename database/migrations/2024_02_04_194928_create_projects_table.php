<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('name');
            $table->text('description');
            $table->string('client');
            $table->string('technologies');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('budget', 10, 2);
            $table->enum('status', ['progress', 'completed', 'suspended'])->default('progress');
            $table->foreignUuid('developer_id')->constrained('developers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('client_id')->constrained('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
