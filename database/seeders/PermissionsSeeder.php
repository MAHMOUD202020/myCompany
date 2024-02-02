<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [


            ['name' => 'role.index'],
            ['name' => 'role.create'],
            ['name' => 'role.update'],
            ['name' => 'role.destroy'],
            ['name' => 'role.trash'],
            ['name' => 'role.restore'],
            ['name' => 'role.finalDelete'],
            ['name' => 'role.permission'],

            ['name' => 'admin.index'],
            ['name' => 'admin.create'],
            ['name' => 'admin.update'],
            ['name' => 'admin.destroy'],
            ['name' => 'admin.trash'],
            ['name' => 'admin.restore'],
            ['name' => 'admin.finalDelete'],

            ['name' => 'blog.index'],
            ['name' => 'blog.create'],
            ['name' => 'blog.update'],
            ['name' => 'blog.destroy'],
            ['name' => 'blog.trash'],
            ['name' => 'blog.restore'],
            ['name' => 'blog.finalDelete'],

            ['name' => 'category.index'],
            ['name' => 'category.create'],
            ['name' => 'category.update'],
            ['name' => 'category.destroy'],
            ['name' => 'category.trash'],
            ['name' => 'category.restore'],
            ['name' => 'category.finalDelete'],
            ['name' => 'category.sort'],

            ['name' => 'block.index'],
            ['name' => 'block.update'],
            ['name' => 'block.toggleView'],

            ['name' => 'contact.index'],
            ['name' => 'contact.create'],
            ['name' => 'contact.update'],
            ['name' => 'contact.destroy'],
            ['name' => 'contact.trash'],
            ['name' => 'contact.restore'],
            ['name' => 'contact.finalDelete'],
            ['name' => 'contact.sort'],


            ['name' => 'message.index'],
            ['name' => 'message.destroy'],


            ['name' => 'partner.index'],
            ['name' => 'partner.create'],
            ['name' => 'partner.update'],
            ['name' => 'partner.destroy'],
            ['name' => 'partner.trash'],
            ['name' => 'partner.restore'],
            ['name' => 'partner.finalDelete'],
            ['name' => 'partner.sort'],


            ['name' => 'project.index'],
            ['name' => 'project.create'],
            ['name' => 'project.update'],
            ['name' => 'project.destroy'],
            ['name' => 'project.trash'],
            ['name' => 'project.restore'],
            ['name' => 'project.finalDelete'],

            ['name' => 'services.index'],
            ['name' => 'services.create'],
            ['name' => 'services.update'],
            ['name' => 'services.destroy'],
            ['name' => 'services.trash'],
            ['name' => 'services.restore'],
            ['name' => 'services.finalDelete'],


            ['name' => 'slider.index'],
            ['name' => 'slider.create'],
            ['name' => 'slider.update'],
            ['name' => 'slider.destroy'],

            ['name' => 'newsletter.index'],
            ['name' => 'newsletter.destroy'],
            ['name' => 'newsletter.restore'],
            ['name' => 'newsletter.finalDelete'],



        ];

        Permission::insert(
            $data
        );
    }
}
