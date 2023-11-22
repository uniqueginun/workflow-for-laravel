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
        Schema::create('wf_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wf_service_detail_id');
            $table->unsignedTinyInteger('order');
            $table->string('description');
            $table->string('actor_type');
            $table->string('actor_id')->nullable();
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
        Schema::dropIfExists('wf_steps');
    }
};
