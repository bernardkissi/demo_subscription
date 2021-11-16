<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->index()->constrained('users');
            $table->foreignId('site_id')->unsigned()->index()->constrained('sites');
            $table->foreignId('plan_id')->unsigned()->index()->constrained('plans');
            $table->dateTime('starts_on');
            $table->dateTime('expires_at')->nullable();
            $table->dateTime('next_due_date')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
