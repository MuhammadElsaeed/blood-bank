<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTokenColumnInClientsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('token', 'api_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('api_token', 'token');
        });
    }

}
