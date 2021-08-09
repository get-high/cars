<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1;$i<=3;$i++) {
            $banner = Storage::putFile('images', new File('public/assets/pictures/test_banner_'.$i.'.jpg'));
            $image = Image::factory()
                ->count(1)
                ->create(['name' => $banner]);
            Banner::factory()
                ->count(1)
                ->create(['image_id' => $image[0]->id]);
        }
    }
}
