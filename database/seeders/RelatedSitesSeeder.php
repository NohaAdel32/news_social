<?php

namespace Database\Seeders;

use App\Models\RelatedNewSite;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class RelatedSitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $fake= Factory::create();
      for($i=0;$i<5;$i++){
        RelatedNewSite::create([
            'name'=>$fake->sentence(1),
            'url'=>$fake->url(),
        ]);
      }
    }
}
