<?php

namespace Database\Seeders;

use App\Models\Books;
use App\Models\BookStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Books::create([
            'ISBN_number' => '0326598756231',
            'book_title' => 'Mobile Communications',
            'author_fname' => 'Jochen',
            'author_lname' => 'Schiller',
            'edition' => 'Second Edition',
            'number_of_copies' => 5,
            'publish_date' => '2003-01-01',
            'publisher' => 'Pearson Education Limited',
            'created_by' => 1,
        ]);

        BookStatus::create([
            'book_id' => 1,
            'number_of_availible_copies' => 5,
        ]);

        Books::create([
            'ISBN_number' => '9780989722680',
            'book_title' => 'The Missing Link. And Introduction to Web Development Programming',
            'author_fname' => 'Micheal',
            'author_lname' => 'Mendez',
            'edition' => 'First Edition',
            'number_of_copies' => 5,
            'publish_date' => '2014-01-01',
            'publisher' => 'Suny Open Textbooks',
            'created_by' => 1,
        ]);

        BookStatus::create([
            'book_id' => 2,
            'number_of_availible_copies' => 5,
        ]);
    }
}
