<?php

// namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinatorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'coordinator';

    /**
     * Run the migrations.
     * @table coordinator
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('agent_id')->nullable();

            $table->index(["user_id"], 'userId_idx2');

            $table->index(["agent_id"], 'agentId_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('user_id', 'userId_idx2')
                ->references('id')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('agent_id', 'agentId_idx')
                ->references('id')->on('user')
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
