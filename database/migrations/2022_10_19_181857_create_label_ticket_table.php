<?php

namespace Coderflex\LaravelTicket\Database\Factories;

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
        Schema::create('label_ticket', function (Blueprint $table) {
            $table->foreignId('label_id');
            $table->foreignId('ticket_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('label_ticket');
    }
};
