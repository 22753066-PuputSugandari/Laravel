<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->enum('status', ['Pending', 'Diterima', 'Ditolak'])->default('Pending');
        });
    }
    
    public function down()
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
    
};
