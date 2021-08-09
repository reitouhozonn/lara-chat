<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip_lists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->ipAddress('ip_address')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('group_messages_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ip_lists');
    }
}
