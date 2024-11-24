<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $pages = [
            
            [
                'pageName' => 'Home',
                'slug' => 'home',
                'pageUrl' => 'home',
                'metaTitle' => 'Home',
                'metaKeywords' => 'Home',
                'metaDescription' => 'Home',
                'headerScript' => '',
                'footerScript' => '',
                'pageStatus' => 'publish'
            ]

        ];

        // Insert Data
        foreach ($pages as $page) {
            Page::create($page);
        }


    }
}
