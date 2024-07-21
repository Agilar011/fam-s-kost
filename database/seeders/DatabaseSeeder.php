<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        //user seeder
        // DB::table('users')->insert([
        //     [
        //         "name" => "test",
        //         "email" => "test@gmail.com",
        //         "password" => Hash::make('test')
        //     ]
        // ]);

        $this->call([
            UserSeeder::class,
            PriceSedeer::class,
        ]);

        //dormitories seeder
        DB::table('dormitories')->insert([
            [
                "name" => "Hilmy",
                "address" => "Malang",
                "phone_number" => "081234567890"
            ],
            [
                "name" => "Daniar",
                "address" => "Surabaya",
                "phone_number" => "0812345678901"
            ],
            [
                "name" => "Wawan",
                "address" => "Madura",
                "phone_number" => "0812345678902"
            ],
            [
                "name" => "Ikmal",
                "address" => "Madura",
                "phone_number" => "0812345678902"
            ],
            [
                "name" => "Aria",
                "address" => "Madura",
                "phone_number" => "0812345678902"
            ],
            [
                "name" => "Fakhi",
                "address" => "Kediri",
                "phone_number" => "0812345678102"
            ],
            [
                "name" => "Tama",
                "address" => "Bandung",
                "phone_number" => "0812345478902"
            ],
            [
                "name" => "Faidh",
                "address" => "Lembang",
                "phone_number" => "0812345178902"
            ],
            [
                "name" => "Firman",
                "address" => "Tangulangin",
                "phone_number" => "0812345678909"
            ],
            [
                "name" => "Almas",
                "address" => "Probolinggo",
                "phone_number" => "0812345678992"
            ],
            [
                "name" => "Pace",
                "address" => "Wajak",
                "phone_number" => "0812345678992"
            ],
            [
                "name" => "Ufan",
                "address" => "Jember",
                "phone_number" => "0812345678992"
            ],
            [
                "name" => "Sinyo",
                "address" => "Muharto",
                "phone_number" => "0812345678992"
            ],
            [
                "name" => "Agil",
                "address" => "Muharto",
                "phone_number" => "0812345678992"
            ],


        ]);

        DB::table('rooms')->insert([
            [
                "room_number" => "1",
                "fk_id_dormitory" => 1
            ],
            [
                "room_number" => "2",
                "fk_id_dormitory" => 2
            ],
            [
                "room_number" => "3",
                "fk_id_dormitory" => 3,
            ],
            [
                "room_number" => "4",
                "fk_id_dormitory" => 4,
            ],
            [
                "room_number" => "5",
                "fk_id_dormitory" => 5,
            ],
            // [
            //     "room_number" => "6",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "7",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "8",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "9",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "10",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "11",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "12",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "13",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "14",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "15",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "16",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "17",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "18",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "19",
            //     "fk_id_dormitory" => NULL,
            // ],
            // [
            //     "room_number" => "20",
            //     "fk_id_dormitory" => NULL,
            // ],
        ]);

        // DB::table('room_images')->insert([
        //     [
        //         "image" => "room-images/1.png",
        //         "fk_id_room" => 1
        //     ],
        //     [
        //         "image" => "room-images/2.png",
        //         "fk_id_room" => 1
        //     ],
        //     [
        //         "image" => "room-images/3.png",
        //         "fk_id_room" => 1,
        //     ],
        //     [
        //         "image" => "room-images/4.png",
        //         "fk_id_room" => 1,
        //     ],
        //     [
        //         "image" => "room-images/5.png",
        //         "fk_id_room" => 1,
        //     ],
        // ]);

        DB::table('kind_payment_logs')->insert([
            [
                "name" => "Transfer",
                "need_image" => TRUE,
            ],
            [
                "name" => "Cash",
                "need_image" => FALSE
            ],
        ]);
    }
}
