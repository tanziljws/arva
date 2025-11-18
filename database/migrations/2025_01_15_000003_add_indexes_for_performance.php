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
        Schema::table('likes', function (Blueprint $table) {
            $table->index(['gallery_id', 'ip_address']);
            $table->index('gallery_id');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->index(['gallery_id', 'is_approved']);
            $table->index('gallery_id');
            $table->index('is_approved');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->dropIndex(['gallery_id', 'ip_address']);
            $table->dropIndex(['gallery_id']);
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropIndex(['gallery_id', 'is_approved']);
            $table->dropIndex(['gallery_id']);
            $table->dropIndex(['is_approved']);
        });
    }
};
