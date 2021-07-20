<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('structures', function (Blueprint $table) {
            $table->foreignId('user_id')->after('id')->constrained('users')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('structures', function (Blueprint $table) {
            $table->dropForeign('structures_user_id_foreign');
            $table->dropColumn('user_id');    

            

        });
    }
}
