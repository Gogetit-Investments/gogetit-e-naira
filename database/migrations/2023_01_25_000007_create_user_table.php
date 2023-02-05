<?php

// namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'user';

    /**
     * Run the migrations.
     * @table user
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username', 100);
            $table->string('first_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            $table->string('other_names', 45)->nullable();
            $table->unsignedInteger('role_id')->nullable();
            $table->string('email', 100);
            $table->string('password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('status', 45)->default('ACTIVE');
            $table->unsignedInteger('added_by')->nullable();
            $table->unsignedInteger('coordinator_id')->nullable();
            $table->unique(["email"], 'email_UNIQUE');
            $table->unique(["username"], 'username_UNIQUE');
            $table->unique(["phone_number"], 'phoneNumber_UNIQUE');

            $table->index(["role_id"], 'roleId_idx');
            $table->index(["added_by"], 'addedBy_idx5');
            $table->index(["coordinator_id"], 'coordinator_Id');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('role_id', 'roleId_idx')
                ->references('id')->on('role')
                ->onDelete('no action')
                ->onUpdate('no action');

                $table->foreign('added_by', 'addedBy_idx5')
                ->references('id')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

                $table->foreign('coordinator_id', 'coordinator_Id')
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
