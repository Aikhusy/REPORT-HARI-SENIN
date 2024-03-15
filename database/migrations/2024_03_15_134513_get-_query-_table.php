<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('get_query_table', function (Blueprint $table) {
            $table->id();
            $table->string('result_name');
            $table->json('query_result');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('get_query_table');
    }
};
