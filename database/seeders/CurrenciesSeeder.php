<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'id'=>1,
                'abbreviation'=>'USD',
            ],
            [
                'id'=>2,
                'abbreviation'=>'GBP',
            ],
            [
                'id'=>3,
                'abbreviation'=>'EUR',
            ],
            [
                'id'=>4,
                'abbreviation'=>'JOD',
            ],
            [
                'id'=>5,
                'abbreviation'=>'JPY',
            ]
        ];
        Currency::query()->insert($currencies);
    }
}
