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
        Schema::table('Forum_Threads', function (Blueprint $table) {
            $table->enum('type',['Guide','Bug Report','Discussion','Question','News','Tips & Tricks','Mod','Review','Suggestion']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Forum_Threads', function (Blueprint $table) {
            //
        });
    }
};
