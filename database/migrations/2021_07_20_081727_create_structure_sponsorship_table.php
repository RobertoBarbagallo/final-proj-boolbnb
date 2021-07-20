<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructureSponsorshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structure_sponsorship', function (Blueprint $table) {
            $table->foreignId('structure_id')->constrained('structures')->onDelete('cascade');
            $table->foreignId('sponsorship_id')->constrained('sponsorships')->onDelete('cascade');
            $table->primary(["structure_id", "sponsorship_id"]);
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
        Schema::dropIfExists('structure_sponsorship');
    }
}
