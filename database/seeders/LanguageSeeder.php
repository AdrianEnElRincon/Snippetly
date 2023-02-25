<?php

namespace Database\Seeders;

use App\Enums\Languages;
use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Languages::cases() as $lang) {
            Language::create([
                'name' => $lang->name,
                'value' => $lang->value,
            ]);
        }
    }
}
