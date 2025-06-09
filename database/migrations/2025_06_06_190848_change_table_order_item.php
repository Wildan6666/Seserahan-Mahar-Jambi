<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->string('order_id')->change();
        });

        // Jika ingin menambahkan foreign key kembali ke kolom string, pastikan orders.id juga string
        // Kalau tidak, lewati langkah ini atau sesuaikan
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn('order_id');
            $table->unsignedBigInteger('order_id');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }
};