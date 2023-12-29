<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants_temporary', function (Blueprint $table) {
            $table->bigIncrements('UserID');
            $table->string('FullName');
            $table->date('DateOfBirth');
            $table->string('PlaceOfBirth');
            $table->string('PhoneNumber');
            $table->string('Email')->unique();;
            $table->string('SkillName');
            $table->string('CV')->nullable();
            $table->string('confirmation_token', 60)->unique();
            $table->string('email_token', 60)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants_temporary');
    }
};
