<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_papers', function (Blueprint $table) {
            $table->id('upload_papers_id');
            $table->unsignedBigInteger('scholars_id');
            $table->string('title', 191);
            $table->string('description', 191);
            $table->string('website', 191)->nullable();
            $table->string('file', 191);
            $table->date('publish_date');
            $table->tinyInteger('ban')->default(0);
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
        Schema::dropIfExists('upload_papers');
    }
}
