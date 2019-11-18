<?php

use App\Models\ReadingSession;
use Illuminate\Database\Seeder;

class ReadingSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: Chain reading session based off of previous one ie: 1 - 26, 26 - 51
        factory(ReadingSession::class)->create();
    }
}
