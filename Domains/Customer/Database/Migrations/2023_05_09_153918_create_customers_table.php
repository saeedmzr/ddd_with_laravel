<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('Firstname');
            $table->string('Lastname');
            $table->date('DateOfBirth');
            $table->bigInteger('PhoneNumber')->unsigned()->unique();
            $table->string('Email')->unique();
            $table->string('BankAccountNumber')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['Firstname', 'Lastname', 'DateOfBirth']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
