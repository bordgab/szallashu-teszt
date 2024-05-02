<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
            $table->id('companyId');
            $table->string('companyName', 255);
            $table->string('companyRegistrationNumber', 255);
            $table->string('companyFoundationDate', 10);
            $table->string('country', 128);
            $table->string('zipCode', 32);
            $table->string('city', 128);
            $table->string('streetAddress', 255);
            $table->decimal('latitude', 6, 3);
            $table->decimal('longitude', 6, 3);
            $table->string('companyOwner', 128);
            $table->integer('employees', false,true);
            $table->string('activity', 128);
            $table->boolean('active')->nullable()->default(0);
            $table->string('email', 255);
            $table->string('password', 255);
        });

        DB::unprepared('
            CREATE TRIGGER prevent_update_foundation_date BEFORE UPDATE ON companies FOR EACH ROW
                BEGIN
                    SET NEW.companyFoundationDate = OLD.companyFoundationDate;
                END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
        DB::unprepared('DROP TRIGGER prevent_update_foundation_date');
    }
}
