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
            ['name'=>'YouTube','icon'=>'iconTypes/Facebook.png'],
            ['name'=>'Facebook', 'icon'=>'iconTypes/YouTube.png'],
            ['name'=>'Instagram', 'icon'=>'iconTypes/Instagram.png'],
            ['name'=>'Tiktok', 'icon'=>'iconTypes/Tiktok.png'],
            ['name'=>'Twitter', 'icon'=>'iconTypes/Twitter.png'],
            ['name'=>'Telegram', 'icon'=>'iconTypes/Telegram.png'],
            ['name'=>'Snapchat', 'icon'=>'iconTypes/Snapchat.png']
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
