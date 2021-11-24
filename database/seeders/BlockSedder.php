<?php

namespace Database\Seeders;

use App\Models\Block;
use Illuminate\Database\Seeder;

class BlockSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Block::insert([
            [
            'page' => 'home',
            'name' => 'features',
            'title_ar' => 'الميزات الإبداعية',
            'title_en' => 'Creative Features',
            'text_ar' =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
            'text_en' =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
            ],

            [
            'page' => 'home',
            'name' => 'services',
            'title_ar' => 'خدمات وكالات تكنولوجيا المعلومات',
            'title_en' => 'IT Agency Services',
            'text_ar' =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
            'text_en' =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
            ],

            [
            'page' => 'home',
            'name' => 'development',
            'title_ar' => 'تطوير مواقع الويب وبرامج الهاتف',
            'title_en' => 'Web & Mobile Development',
            'text_ar' =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.',
            'text_en' =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.',
            ],

            [
            'page' => 'home',
            'name' => 'why_us',
            'title_ar' => 'لماذا أخترتنا',
            'title_en' => 'Why Choose Us',
            'text_ar' =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
            'text_en' =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
            ],

            [
            'page' => 'home',
            'name' => 'projects',
            'title_ar' => 'المشاريع',
            'title_en' => 'Projects',
            'text_ar' =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
            'text_en' =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
            ],

            [
            'page' => 'home',
            'name' => 'clients_says',
            'title_ar' => 'ماذا يقول عملاؤنا',
            'title_en' => 'What Our Clients Says',
            'text_ar' =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
            'text_en' =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
            ],
        ]);
    }
}
