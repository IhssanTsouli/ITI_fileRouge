<?php
namespace Database\Seeders;

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
        $json=Storage::disk('local')->get('/files/data.json');
        $courses=json_decode($json,true);
        foreach($courses as $course){
            Course::query()->updateOrCreate([
                "name"=>$course["name"],
                "code"=>$course["code"],
                "description"=>$course["description"],
                "summary"=>$course["summary"],
                "requirement"=>$course["requirement"],
                "price"=>$course["price"],
                "user_id"=>$course["user_id"],
                "category"=>$course["category"],
                "finished_at"=>$course["finished_at"],
                "duration"=>$course["price"],
                "status"=>$course["status"],
                "slug"=>$course["slug"],
                "image"=>$course["image"],
 
            ]);
        }
    }
}