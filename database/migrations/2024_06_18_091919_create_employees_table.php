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
        Schema::disableForeignKeyConstraints();

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('identification', 100)->unique();
            $table->dateTime('birth');
            $table->integer('salary');
            $table->enum('martial_status', ["single","married","divorced"]);
            $table->decimal('bonus', 8, 2)->nullable();
            $table->unsignedInteger('order')->default(1)->index();
            $table->foreignId('department_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
