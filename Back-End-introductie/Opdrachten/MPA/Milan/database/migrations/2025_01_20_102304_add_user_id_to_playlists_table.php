<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Controleer of de 'user_id' kolom al bestaat
        if (!Schema::hasColumn('playlists', 'user_id')) {
            Schema::table('playlists', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id');
            });
        }

        // Vul de 'user_id' kolom voor bestaande rijen met een standaardwaarde, bijv. 1
        DB::table('playlists')->update(['user_id' => 1]);

        // Voeg de foreign key toe
        Schema::table('playlists', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('playlists', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};


