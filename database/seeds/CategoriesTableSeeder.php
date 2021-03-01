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
        $category->save();

        $category = new Category();
        $category->icon = '<i class="fas fa-business-time"></i>';
        $category->name = "Business";
        $category->save();

        $category = new Category();
        $category->icon = '<i class="fas fa-database"></i>';
        $category->name = "Data";
        $category->save();

        $category = new Category();
        $category->icon = '<i class="fas fa-code"></i>';
        $category->name = "Développement";
        $category->save();

        $category = new Category();
        $category->icon = '<i class="fas fa-project-diagram"></i>';
        $category->name = "Gestion de projet";
        $category->save();

        $category = new Category();
        $category->icon = '<i class="fas fa-comments-dollar"></i>';
        $category->name = "Marketing & Communication";
        $category->save();

        $category = new Category();
        $category->icon = '<i class="fas fa-school"></i>';
        $category->name = "Pédagogie";
        $category->save();

        $category = new Category();
        $category->icon = '<i class="fas fa-terminal"></i>';
        $category->name = "Systèmes & Réseaux";
        $category->save();

        $category = new Category();
        $category->icon = '<i class="far fa-question-circle"></i>';
        $category->name = "Autres";
        $category->save();
    }
}
