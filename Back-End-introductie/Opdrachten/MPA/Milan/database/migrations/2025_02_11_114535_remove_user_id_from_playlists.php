<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('playlists', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Verwijder de foreign key
            $table->dropColumn('user_id'); // Verwijder de kolom
        });
    }

    public function down()
    {
        Schema::table('playlists', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Voeg 'user_id' terug als je de migratie terugdraait
        });
    }
};

