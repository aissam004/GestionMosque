<?php

namespace Database\Seeders;

use App\Models\Marque;
use App\Models\Materiel;
use App\Models\Modele;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $types=Type::factory(5)->create();

        Marque::factory(8)->create()->each(function ($marque) use ($types){
            // Seed the relation with 5 purchases
            $type=$types->random(1)[0];

            $modeles = Modele::factory(rand(1,6))->make(['type_id'=>rand(1,5)]);

            $marque->modeles()->saveMany($modeles);

            foreach($modeles as $modele){
                $materiels=Materiel::factory(rand(1,3))->make();
                $modele->materiels()->saveMany($materiels);
            };

        });
    }
}
