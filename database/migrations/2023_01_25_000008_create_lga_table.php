<?php

// namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLgaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'lga';

    /**
     * Run the migrations.
     * @table lga
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('lga_code', 32)->index();
            // $table->string('lga_code', 45)->nullable();
            $table->string('lga_name', 45)->nullable();
            $table->string('state_code', 32)->references('state_code')->on('state');
            // $table->unsignedBigInteger('state_code');

            // $table->index(["state_code"], 'state_code_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            // $table->foreign('state_code', 'state_code_idx')
            //     ->references('state_code')->on('state')
            //     ->onDelete('no action')
            //     ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
