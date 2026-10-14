<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('subgroup')->after('group')->nullable();

            $table->dropUnique(['group', 'name']);
            $table->unique(['group', 'subgroup', 'name']);
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropUnique(['group', 'subgroup', 'name']);
            $table->unique(['group', 'name']);
            $table->dropColumn('subgroup');
        });
    }
};
