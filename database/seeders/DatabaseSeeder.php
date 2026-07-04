<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $User = User::factory()->create([
            'name' => 'Camilo Martinez',
            //'email' => 'camilo@example.com',
        ]);

        //crear 10 categorias
        $Categorias = Category::factory(10)->create();

        //crear 50 tereas asignadas al usuario admin
        Task::factory(50)->create([
            'user_id' => $User->id,
            'category_id' => $Categorias->random()->id,
        ]);

        //crear 20 tareas adicionales para otros usuarios
        Task::factory(20)->create();
    }
}
