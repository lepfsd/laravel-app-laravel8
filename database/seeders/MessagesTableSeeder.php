<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::truncate();
        for($i=15; $i<=45; $i++){
            Message::create([
                'nombre' => 'usuario ' . $i,
                'email' => 'seeder'. $i . '@seeder.com',
                'mensaje' => 'ejemplo para mensaje ' . $i
            ]);
        }
    }
}
