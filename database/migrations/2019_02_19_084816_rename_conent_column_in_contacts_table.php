<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameConentColumnInContactsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('contacts', function (Blueprint $table) {
            $table->renameColumn('conent', 'content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('contacts', function (Blueprint $table) {
            $table->renameColumn('content', 'conent');
        });
    }

}
