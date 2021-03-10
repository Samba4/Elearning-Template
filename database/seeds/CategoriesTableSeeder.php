<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->icon = '<i class="fas fa-laptop"></i>';
        $category->name = "Bureautique";
        $category->slug = "bureautique";
        $category->save();

        $category = new Category();
        $category->icon = '<i class="fas fa-code"></i>';
        $category->name = "Développement";
        $category->slug = "developpement";
        $category->save();

        $category = new Category();
        $category->icon = '<i class="fas fa-project-diagram"></i>';
        $category->name = "Gestion de projet";
        $category->slug = "gestion-de-projet";
        $category->save();

        $category = new Category();
        $category->icon = '<i class="fas fa-comments-dollar"></i>';
        $category->name = "Marketing & Communication";
        $category->slug = "marketing-communication";
        $category->save();

        $category = new Category();
        $category->icon = '<i class="fas fa-terminal"></i>';
        $category->name = "Systèmes & Réseaux";
        $category->slug = "systemes-reseaux";
        $category->save();

        $category = new Category();
        $category->icon = '<i class="far fa-question-circle"></i>';
        $category->name = "Autres";
        $category->slug = "autres";
        $category->save();
    }
}
