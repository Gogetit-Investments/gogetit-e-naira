<?php

// namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantDataTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'merchant_data';

    /**
     * Run the migrations.
     * @table merchant_data
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('registration_number', 45)->nullable();
            $table->string('tin', 45)->nullable();
            $table->string('business_name', 45)->nullable();
            $table->string('director_bvn', 45)->nullable();
            $table->string('director_first_name', 45)->nullable();
            $table->string('director_last_name', 45)->nullable();
            $table->string('director_other_names', 45)->nullable();
            $table->string('director_dob', 45)->nullable();
            $table->string('director_phone_number', 45)->nullable();
            $table->string('director_email', 45)->nullable();
            $table->string('city', 100)->nullable();
            $table->unsignedInteger('state')->nullable();
            $table->string('country', 45)->nullable();
            $table->string('address', 200)->nullable();
            $table->integer('account_number')->nullable();
            $table->string('account_name', 100)->nullable();
            $table->unsignedInteger('bank_id')->nullable();
            $table->unsignedInteger('added_by')->nullable();
            $table->unsignedInteger('lga')->nullable();
            $table->unsignedInteger('state_of_origin')->nullable();

            $table->index(["bank_id"], 'bankId_idx2');

            $table->index(["added_by"], 'addedBy_idx3');

            $table->index(["state"], 'state_id44x');

            $table->index(["lga"], 'lgaId_idx');

            $table->index(["state_of_origin"], 'stateOfOrigin_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('added_by', 'addedBy_idx3')
                ->references('id')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('bank_id', 'bankId_idx2')
                ->references('id')->on('bank')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('state', 'state_id44x')
                ->references('id')->on('state')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('lga', 'lgaId_idx')
                ->references('id')->on('lga')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('state_of_origin', 'stateOfOrigin_idx')
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
