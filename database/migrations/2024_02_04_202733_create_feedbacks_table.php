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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->text('comment');
            $table->string('reviewer');
            $table->text('attachments')->nullable();
            $table->integer('rating');
            $table->enum('feedback', ['positive', 'negative', 'neutral'])->default('positive');
            $table->foreignUuid('task_id')->constrained('tasks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->comment('Responsible for the creation of the project');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
