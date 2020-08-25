<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Topic;
use App\Models\Reply;

class ReplysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //所有用户id数组
        $user_ids = User::all()->pluck('id')->toArray();

        //所有话题id数组
        $topic_ids = Topic::all()->pluck('id')->toArray();

        //获取Faker实例
        $faker = app(Faker\Generator::class);

        $replys = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use ($user_ids, $topic_ids, $faker) {
            //从用户数组中随机取一个并赋值
            $reply->user_id = $faker->randomElement($user_ids);
            $reply->topic_id = $faker->randomElement($topic_ids);
        });
        //将数据集合转换为数组，并插入数据库中
        Reply::insert($replys->toArray());
    }
}
