<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumInCompanyTableAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function ($table) {
            $table->integer('region_id')->after('company_address');
            $table->integer('city_id')->after('region_id');
            $table->string('street')->after('city_id');
            $table->string('address')->after('street');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function ($table) {
            $table->dropColumn('region_id');
            $table->dropColumn('city_id');
            $table->dropColumn('region_id');
            $table->dropColumn('address');

        });
    }
}
