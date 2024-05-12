<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up():void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['developer_id']);
            $table->dropForeign(['client_id']);

            $table->dropColumn(['developer_id']);
            $table->dropColumn(['client_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
