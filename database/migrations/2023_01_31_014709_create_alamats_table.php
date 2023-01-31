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
        Schema::create('alamats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('telpon');
            $table->unsignedBigInteger('provinsi_id');
            $table->foreign('provinsi_id')->references('id')->on('provinsis')->onDelete('cascade');
            $table->unsignedBigInteger('kota_id');
            $table->foreign('kota_id')->references('id')->on('kotas')->onDelete('cascade');
            $table->text('alamat');
            $table->string('detail');
            $table->enum('lokasi',['rumah','kantor']);
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
        Schema::dropIfExists('alamats');
    }
};
