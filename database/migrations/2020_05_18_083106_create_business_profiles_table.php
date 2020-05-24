<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->id();
            $table->string("company_name");
            $table->string("company_address");
            $table->string("company_telephone");
            $table->string("company_email")->nullable();
            $table->string("company_fax")->nullable();
            $table->string("company_province")->nullable();
            $table->string("company_city")->nullable();
            $table->string("company_registration_number");
            $table->unsignedBigInteger("user_id");
            $table->longText('photo')->nullable();
            $table->string('tax_number')->nullable();
            $table->unsignedBigInteger('business_sector_id');
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
        Schema::dropIfExists('business_profiles');
    }
}
