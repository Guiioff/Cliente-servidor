<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->integer('carga_horaria');
            $table->string('curso');
        });
        if (config('database.default') === 'mysql') {
            DB::statement("SET GLOBAL max_allowed_packet=32777216;");
            DB::statement("ALTER TABLE disciplinas ADD ementa MEDIUMBLOB");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disciplinas');
    }
};
