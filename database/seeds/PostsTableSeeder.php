<?php

use Illuminate\Database\Seeder;

use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Post::create(['title'=>"Chutes du Niagara",
                       "content"=>"Les chutes du Niagara sont parfaite pour faire trempette.",
                       "img_url"=>"https://www.niagarafallsstatepark.com/~/media/parks/niagara-falls/homepage/banner-niagara1.jpg"]);
         
          Post::create(['title'=>"Parc Zhangye Danxia",
                       "content"=>"Le Parc national de Zhangye Danxia est une vraie palette de peintre naturelle !",
                       "img_url"=>"http://www.chinadiscovery.com/assets/images/gansu/zhangye/danxia/zhangye-danxia-788.jpg"]);
           
           Post::create(['title'=>"Un bel endroit",
                       "content"=>"Ou que ce soit cet endroit est magnifique",
                       "img_url"=>"http://www.chine-pratique.fr/wp-content/uploads/2014/09/les-10-plus-beaux-endroits-dans-le-monde-qui-existent-reellement_3568219-XL.jpg"]);
           
           Post::create(['title'=>"Grand Glacier",
                       "content"=>"Un des plus grand saut de ski du monde.",
                       "img_url"=>"http://www.brewster.ca/brewster_travel/media/Images/Rocky-Mountains/Destinations/Columbia-Icefield/Activities/Glacier-Skywalk/1BN-Glacier-Skywalk-Landscape-towards-Glacier.jpg?width=1050&height=582&ext=.jpg"]);
    }
}
