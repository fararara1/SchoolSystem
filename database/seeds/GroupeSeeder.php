<?php
use App\Groupe;
use Illuminate\Database\Seeder;

class GroupeSeeder extends Seeder
{
    public function run()
    {
        Groupe::create(['nom' => 'Groupe A']);
        Groupe::create(['nom' => 'Groupe B']);
        Groupe::create(['nom' => 'Groupe C']);
    }
}
