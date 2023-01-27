<?php

// namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerDataTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'consumer_data';

    /**
     * Run the migrations.
     * @table consumer_data
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('registration_number');
            $table->unsignedInteger('tier_id');
            $table->integer('bvn');
            $table->integer('nin');
            $table->string('first_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            $table->string('other_names', 45)->nullable();
            $table->string('postal_code', 45)->nullable();
            $table->string('address', 45)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('lga', 45)->nullable();
            $table->unsignedInteger('state')->nullable();
            $table->string('country', 45)->nullable();
            $table->string('dob', 45)->nullable();
            $table->string('country_of_birth', 45)->nullable();
            $table->unsignedInteger('state_of_origin')->nullable();
            $table->string('referral_code', 45)->nullable();
            $table->unsignedInteger('added_by')->nullable();

            // $table->unique(["tier_id"], 'tier_id_UNIQUE');

            $table->unique(["registration_number"], 'registration_number_UNIQUE');
            $table->unique(["bvn"], 'bvn_UNIQUE');

            $table->unique(["nin"], 'nin_UNIQUE');

            $table->index(["added_by"], 'addedBy_idx2');

            $table->index(["tier_id"], 'tierId_idx');

            $table->index(["state"], 'state_id33x');

            $table->index(["state_of_origin"], 'state_of_origin_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('added_by', 'addedBy_idx2')
                ->references('id')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('tier_id', 'tierId_idx')
                ->references('id')->on('tier')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('state', 'state_id33x')
                ->references('id')->on('state')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('state_of_origin', 'state_of_origin_idx')
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
