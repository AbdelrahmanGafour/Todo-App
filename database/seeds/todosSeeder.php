<?php

use Illuminate\Database\Seeder;
use App\Todo;

class todosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Todo::class, 10)->create();
    }
}
