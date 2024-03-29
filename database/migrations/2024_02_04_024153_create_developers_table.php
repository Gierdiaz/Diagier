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
        Schema::create('developers', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('name');
            $table->string('email');
            $table->string('github');
            $table->text('bio')->nullable();
            $table->string('technologies');
            $table->string('college');
            $table->string('course');
            $table->text('certifications')->nullable();
            $table->string('company');
            $table->enum('level', [
                'intern',
                'junior',
                'intermediate',
                'senior',
                'lead',
                'manager',
                'director',
                'vp',
                'executive',
                'admin',
                'specialist',
                'consultant',
            ]);
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->enum('work_mode', ['home_office', 'presential', 'hybrid']);
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};
