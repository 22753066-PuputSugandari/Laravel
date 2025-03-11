
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('techer', function (Blueprint $table) {
            $table->string('image')->nullable()->after('status');
        });
    }

    public function down()
    {
        Schema::table('techer', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
