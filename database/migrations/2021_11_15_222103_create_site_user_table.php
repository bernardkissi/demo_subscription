<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->index()->constrained('users')->cascadeOnDelete();
            $table->foreignId('site_id')->unsigned()->index()->constrained('sites')->cascadeOnDelete();
            $table->integer('subscription_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_user');
    }
}
