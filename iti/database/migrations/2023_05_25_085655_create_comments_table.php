<?php

use App\Models\Comment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

 // $table->foreignIdFor(Course::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable()->default(null);
            $table->foreign('parent_id')->references('id')->on('comments')->onUpdate('cascade')->onDelete('set null');
            $table->longText('body')->nullable();
            $table->enum('status', ['enabled', 'disabled'])->default('enabled');
            
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
        Schema::dropIfExists('comments');
    }
};
