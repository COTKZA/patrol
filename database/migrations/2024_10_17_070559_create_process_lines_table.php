<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('process_lines', function (Blueprint $table) {
            $table->id('LineID');
            $table->string('LaneName', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('process_lines');
    }
};
