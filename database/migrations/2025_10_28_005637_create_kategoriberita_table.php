<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriBeritaTable extends Migration
{
    public function up()
    {
        Schema::create('kategoriberita', function (Blueprint $table) {
            $table->increments('kategori_id');
            $table->string('name');
            $table->text('deskripsi');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategoriberita');
    }
}

