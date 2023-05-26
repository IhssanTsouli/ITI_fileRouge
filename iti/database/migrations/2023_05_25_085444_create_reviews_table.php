<?php

use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 

  // $table->foreignIdFor(Course::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->longText('content')->nullable();
            $table->timestamp('date')->nullable();
            $table->integer('rate')->nullable();
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
