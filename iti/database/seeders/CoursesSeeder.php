<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json=Storage::disk('local')->get('/MyJSON/coursesData.json');
        $courses=json_decode($json,true);
        foreach($courses as $course){
            Course::query()->updateOrCreate([
                "name"=>$course["name"],
                "code"=>$course["code"],
                "description"=>$course["description"],
                "summary"=>$course["summary"],
                "requirement"=>$course["requirement"],
                "price"=>$course["price"],
                "User_id"=>$course["User_id"],
                "category"=>$course["category"]
            ]);
        }
    }
}