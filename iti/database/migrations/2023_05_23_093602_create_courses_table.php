<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

 // $table->foreignIdFor(User::class, 'teacher_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
 // $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->longText('description');
            $table->longText('summary')->nullable();
            $table->longText('requirement')->nullable();
            $table->integer('price')->default(0);
            $table->bigInteger("user_id")->unsigned()->nullable();
            $table->foreign("user_id")
            ->references("id")
            ->on('users')
            ->onDelete('cascade');  
            $table->string('category');  
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->string('duration')->nullable();
            $table->enum('status', ['enabled', 'disabled', 'ongoing', 'cancelled', 'completed'])->default('enabled');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
