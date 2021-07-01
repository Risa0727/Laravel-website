<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\UserEntry;

class UserEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('user_entry')->insert([
        UserEntry::create([
          'title' => 'hoge2',
          'body' => 'hogehoge2'
        ]);
    }
}
