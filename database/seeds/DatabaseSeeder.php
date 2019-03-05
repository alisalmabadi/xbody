<?php

use Illuminate\Database\Seeder;
use App\Operator;
use App\Admin;
use App\Menu;
use App\Slider;
use App\Slide;
use App\Category;
use App\Post;
use App\Province;
use App\City;
use App\OrderState;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //     $this->call(UsersTableSeeder::class);
			$this->call(AdminsTableSeeder::class);


          //$this->call(MenuTableSeeder::class);
//          $this->call(SlidersTableSeeder::class);
//          $this->call(SlidesTableSeeder::class);
//          $this->call(CategoryTableSeeder::class);
//          $this->call(PostsTableSeeder::class);
    }
}

class AdminsTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('admins')->delete();


		Admin::create([ 'name' => 'admin',
                        'lname' => 'hastam',
		               'email' => 'admin@gmail.com',
		               'bio'=>'این یک متن تست  برای توضیح درباره مدیر است.',
		               'password' => bcrypt('123456')]);
	}
}
