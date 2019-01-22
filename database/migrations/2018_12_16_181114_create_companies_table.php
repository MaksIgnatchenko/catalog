<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->unsignedInteger('company_owner_id')->unique();
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('speciality_id');
            $table->unsignedInteger('type_id');
            $table->string('logo')->nullable();
            $table->unsignedInteger('company_images_limit');
            $table->unsignedInteger('team_images_limit');
            $table->string('status');
            $table->date('date_change_status')->nullable();
            $table->text('about_us');
            $table->text('our_services');
            $table->decimal('latitude', 10, 8)->default(0);
            $table->decimal('longitude', 11, 8)->default(0);
            $table->json('work_days');
            $table->json('phones');
            $table->string('website');
            $table->timestamps();
            $table->foreign('company_owner_id')->references('id')->on('company_owners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
