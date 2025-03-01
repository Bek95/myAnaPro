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
        Schema::create('user_url_shortened', function (Blueprint $table) {
            $table->integer('user_id')
                ->unsigned()
                ->index();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->integer('url_shortened_id')->unsigned()->index();

            $table->foreign('url_shortened_id')
                ->references('id')
                ->on('url_shortened')
                ->onDelete('cascade');

            $table->primary(['user_id', 'url_shortened_id'], 'user_url_shortened_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_url_shortened');
    }
};
