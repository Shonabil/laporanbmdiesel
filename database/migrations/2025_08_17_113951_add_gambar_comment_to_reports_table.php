<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            if (!Schema::hasColumn('reports', 'gambar')) {
                $table->string('gambar')->nullable()->after('warranty');
            }
            if (!Schema::hasColumn('reports', 'comment')) {
                $table->text('comment')->nullable()->after('gambar');
            }
        });
    }

    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            if (Schema::hasColumn('reports', 'gambar')) {
                $table->dropColumn('gambar');
            }
            if (Schema::hasColumn('reports', 'comment')) {
                $table->dropColumn('comment');
            }
        });
    }
};

