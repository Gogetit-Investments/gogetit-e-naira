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
            $table->unsignedInteger('state_id')->nullable();
            $table->string('lga_name', 45)->nullable();

            $table->index(["state_id"], 'stateid_id22x');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('state_id', 'stateid_id22x')
                ->references('id')->on('state')
                ->onDelete('no action')
                ->onUpdate('no action');
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
