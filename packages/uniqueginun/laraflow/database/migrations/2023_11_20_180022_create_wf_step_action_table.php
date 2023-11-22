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
        Schema::create('wf_step_action', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wf_service_detail_id');
            $table->unsignedTinyInteger('current_step');
            $table->string('action')->index();
            $table->unsignedTinyInteger('next_step');
            $table->string('title');
            $table->tinyInteger('sort');
            $table->string('status')->index();
            $table->boolean('close_afterwards')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('wf_service_detail_id')
                ->references('id')
                ->on('wf_service_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wf_step_action');
    }
};
