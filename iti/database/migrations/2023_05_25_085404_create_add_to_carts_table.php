<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

 // $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            // $table->foreignIdFor(Course::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('add_to_carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("User_id")->unsigned()->nullable();
            $table->foreign("User_id")
            ->references("id")
            ->on('users')
            ->onDelete('cascade');
            $table->bigInteger("courses_id")->unsigned()->nullable();
            $table->foreign("courses_id")
            ->references("id")
            ->on('courses')
            ->onDelete('cascade');
            $table->string('payment_id')->nullable();
            $table->string('browser_name')->nullable();
            $table->integer('qty')->nullable()->default(1);
            $table->integer('price')->nullable()->default(0);
            $table->string('status')->nullable()->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_to_carts');
    }
};
