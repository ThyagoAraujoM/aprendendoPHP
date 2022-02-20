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
    Schema::table('events', function (Blueprint $table) {
      // especificando que vai ser adicionado uma chave estrangeira e atrela ela
      // a um usuário de outra tabela
      $table->foreignId('user_id')->constrained();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('events', function (Blueprint $table) {
      // deleta os registros que estão atrelados ao user, para não deixar um registro sem pai
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
    });
  }
};
