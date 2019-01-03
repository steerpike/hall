<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //factory(App\Link::class, 50)->make();
    
        factory(App\Link::class, 50)->create()->each(function ($link) {
            $machineTags = array(
                'writing:research=medieval',
                'writing:research=tutorials',
                'writing:research=methodology',
                'personal:family=fionn',
                'personal:family=jude',
                'personal:family=sophie'
            );        
            $link->attachMachineTag($machineTags[array_rand($machineTags)])->save();
        });
    }
}
