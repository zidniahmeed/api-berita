<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->bigInteger('id_tipe');
            $table->text('title');
            $table->text('berita');
            $table->text('slug');
            $table->string('thumbnail');
            $table->enum('status',['enable','disable','pending']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beritas');
    }
};
