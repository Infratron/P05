<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
         ["La Divina Commedia", "Dante Alighieri"],
         ["Il diavolo veste prada", "Ken Follet"],
         ["Orgoglio e Pregiudizio", "Jane Austen"],
         ["Cime tempestose", "Emily Brontë"],
        ];

        foreach($books as $book){
            DB::table('books')->insert([
                'title' => $book[0],
                'author' => $book[1],
            ]);
        }
    }
}
