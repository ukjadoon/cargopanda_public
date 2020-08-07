<?php

use App\DocumentDefinition;
use Illuminate\Database\Seeder;

class DocumentDefinitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DocumentDefinition::class, 40)->create();
    }
}
