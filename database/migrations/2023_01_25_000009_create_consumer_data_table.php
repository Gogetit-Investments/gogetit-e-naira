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
            $table->string('registration_number', 45)->nullable();
            // $table->unsignedInteger('tier_id');
            $table->string('tier_id', 32)->references('code')->on('tier');
            $table->integer('bvn');
            $table->integer('nin');
            $table->string('phone_number');
            // $table->string('title', 45)->nullable();
            $table->string('title_code', 32)->references('code')->on('title');
            $table->string('last_name', 45)->nullable();
            $table->string('first_name', 45)->nullable();
            $table->string('middle_name', 45)->nullable();
            $table->string('postal_code', 45)->nullable();
            $table->string('contact_address', 500)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('lga', 32)->references('lga_code')->on('lga');
            // $table->unsignedInteger('lga', 45)->nullable();
            // $table->unsignedInteger('state')->nullable();
            $table->string('state_code', 32)->references('state_code')->on('state');
            // $table->string('country', 45)->nullable();
            $table->string('country', 32)->references('country_code')->on('country');
            $table->string('dob', 45)->nullable();
            // $table->string('country_of_birth', 45)->nullable();
            $table->string('country_of_birth', 32)->references('country_code')->on('country');
            $table->string('state_of_birth', 32)->references('state_code')->on('state');
            // $table->unsignedInteger('state_of_origin')->nullable();
            $table->string('referral_code', 45)->nullable();
            $table->double('commission')->nullable();
            $table->unsignedInteger('added_by')->nullable();

            // $table->unique(["tier_id"], 'tier_id_UNIQUE');

            $table->unique(["registration_number"], 'registration_number_UNIQUE');
            $table->unique(["bvn"], 'bvn_UNIQUE');
            $table->unique(["phone_number"], 'phone_number_UNIQUE');
            $table->unique(["nin"], 'nin_UNIQUE');

            $table->index(["added_by"], 'addedBy_idx2');

            // $table->index(["tier_id"], 'tierId_idx');

            // $table->index(["state"], 'state_id33x');
            // $table->index(["lga"], 'lga_id33x');

            // $table->index(["state_of_origin"], 'state_of_origin_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('added_by', 'addedBy_idx2')
                ->references('id')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            // $table->foreign('tier_id', 'tierId_idx')
            //     ->references('code')->on('tier')
            //     ->onDelete('no action')
            //     ->onUpdate('no action');

            // $table->foreign('state', 'state_id33x')
            //     ->references('state_code')->on('state')
            //     ->onDelete('no action')
            //     ->onUpdate('no action');

            //     $table->foreign('lga', 'lga_id33x')
            //     ->references('lga_code')->on('lga')
            //     ->onDelete('no action')
            //     ->onUpdate('no action');

            // $table->foreign('state_of_origin', 'state_of_origin_idx')
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
