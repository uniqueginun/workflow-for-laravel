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
        Schema::create('wf_main', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('model_type');
            $table->string('model_id')->index();
            $table->unsignedBigInteger('wf_service_detail_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('department_id')->nullable()->index();
            $table->unsignedBigInteger('next_step');
            $table->string('action');
            $table->string('status');
            $table->string('notes')->nullable();
            $table->json('params')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('wf_service_detail_id')
                ->references('id')
                ->on('wf_service_details');

            $table->foreign('next_step')
                ->references('id')
                ->on('wf_steps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wf_main');
    }
};
