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
        Schema::create('wf_main_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wf_main_id');
            $table->unsignedBigInteger('sender_id')->index();
            $table->string('sender_name');
            $table->unsignedBigInteger('receiver_id')->index();
            $table->string('receiver_name');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('action');
            $table->string('status');
            $table->unsignedTinyInteger('current_step');
            $table->unsignedTinyInteger('next_step');
            $table->string('notes')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();

            $table->foreign('wf_main_id')
                ->references('id')
                ->on('wf_main');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wf_main_details');
    }
};
