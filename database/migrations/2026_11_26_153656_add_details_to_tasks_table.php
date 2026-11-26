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
        Schema::table('tasks', function (Blueprint $table) {
            if (! Schema::hasColumn('tasks', 'title')) {
                $table->string('title');
            }

            if (! Schema::hasColumn('tasks', 'description')) {
                $table->text('description');
            }

            if (! Schema::hasColumn('tasks', 'long_description')) {
                $table->text('long_description')->nullable();
            }

            if (! Schema::hasColumn('tasks', 'completed')) {
                $table->boolean('completed')->default(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            if (Schema::hasColumn('tasks', 'title')) {
                $table->dropColumn('title');
            }

            if (Schema::hasColumn('tasks', 'description')) {
                $table->dropColumn('description');
            }

            if (Schema::hasColumn('tasks', 'long_description')) {
                $table->dropColumn('long_description');
            }

            if (Schema::hasColumn('tasks', 'completed')) {
                $table->dropColumn('completed');
            }
        });
    }
};
