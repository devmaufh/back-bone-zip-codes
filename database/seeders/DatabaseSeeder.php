<?php

namespace Database\Seeders;

use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
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
        FederalEntity::factory(32)->create();
        Municipality::factory(10)->create();
        SettlementType::factory(5)->create();
        ZipCode::factory(150)->create();
        Settlement::factory(2500)->create();
    }
}
