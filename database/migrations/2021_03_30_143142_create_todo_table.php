<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('list')->max(255);
            $table->string('description')->max(255);
            $table->boolean('completed')->default(false);
            $table->timestamp('start_date')->useCurrent();
            $table->timestamp('complete_date')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo');
    }
}
