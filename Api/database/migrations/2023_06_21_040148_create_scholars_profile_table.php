<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarsProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholars_profile', function (Blueprint $table) {
            $table->id('scholars_profile_id');
            $table->text('scholars_id');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('bio');
            $table->text('email');
            $table->text('work');
            $table->text('education');
            $table->text('experience');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholars_profile');
    }
}
