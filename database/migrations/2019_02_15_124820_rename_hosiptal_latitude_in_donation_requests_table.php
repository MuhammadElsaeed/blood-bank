<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameHosiptalLatitudeInDonationRequestsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->renamecolumn('hosiptal_latitude', 'hospital_latitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('donation_requests', function (Blueprint $table) {
            $table->renamecolumn('hospital_latitude', 'hosiptal_latitude');
        });
    }

}
