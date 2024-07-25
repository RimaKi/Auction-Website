<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name'=>'Facebook','icon'=>'Type/Facebook.png'],
            ['name'=>'YouTube', 'icon'=>'Type/YouTube.png'],
            ['name'=>'Instagram', 'icon'=>'Type/Instagram.png'],
            ['name'=>'Tiktok', 'icon'=>'Type/Tiktok.png'],
            ['name'=>'Twitter', 'icon'=>'Type/Twitter.png'],
            ['name'=>'Telegram', 'icon'=>'Type/Telegram.png'],
            ['name'=>'Snapchat', 'icon'=>'Type/Snapchat.png']
        ];
        foreach ($types as $type){
            $typeModel = Type::create([
                'name'=>$type['name']
            ]);
            Media::create([
                'path'=>$type['icon'],
                'type'=>'photo',
                'fileable_id'=>$typeModel->id,
                'fileable_type'=>Type::class
            ]);
        }
    }
}
