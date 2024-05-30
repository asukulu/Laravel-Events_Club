<?php
use App\Models\Event;
use Faker\Provider\ka_GE\DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('event')->insert([
          'title' => Str::random(10),
           'name' => Str::random(10),
           'description' => Str::random(10),
            'venue' =>Str::random(10),
            'slug' =>Str::random(10),
            'organiser'=>Str::random(10),
            'date' =>DateTime::dateTime(),
            'time' =>time()::random(6),
            'image'=>Str::random(10),
          
            

       ]);
     }
    }
    
    
        {
            Event::create([
    'title' => 'Football',
    'name'=>'Sports',
    'description'=> ' beatae sint laudantium consequatur. Magni occaecati itaque sint et sit tempore. Nesciunt
    amet quidem. Iusto deleniti cum autem ad quia aperiam.',
    'venue' => 'walsall',
    'slug' =>'Footbal',
    'organiser' =>'Georges',
    'price' =>'0',
    'date'=>'22/01/28',
    'time'=>'11:45:05',
    'image'=>'https://images.unsplash.com/photo-1518657205760-dafa7ef924de?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1350&q=80',
    
            
                            
             ]);
             }
                    
             Event::create([
                'title' => 'Tenis',
                'name'=>'Sports',
                'description'=> ' beatae sint laudantium consequatur. Magni occaecati itaque sint et sit tempore. Nesciunt
                amet quidem. Iusto deleniti cum autem ad quia aperiam.',
                'venue' => 'walsall',
                'slug' =>'Tenis',
                'organiser' =>'Tez',
                'price' =>'0',
                'date'=>'21/06/21',
                'time'=>'11:45:05',
                'image'=>'https://images.unsplash.com/photo-1583275478661-1c31970669fa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80',
                
                        
                                        
                         ]);
                   
                         Event::create([
                            'title' => 'Rugby',
                            'name'=>'Sports',
                            'description'=> '
                            voluptatem sit aliquam. Dolores voluptatum est.
                            Aut molestias et maxime. Fugit autem facilis quos vero. Eius quibusdam possimus est.',
                            'venue' => 'walsall',
                            'slug' =>'Rugby',
                            'organiser' =>'Georges',
                            'price' =>'0',
                            'date'=>'21/07/12',
                            'time'=>'12:45:05',
                            'image'=>' https://images.unsplash.com/photo-1598201098158-0a174b9a4619?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80 ',
                            
                                    
                                                    
                                     ]);
                             
                                     Event::create([
                                      'title' => ' Karate',
                                      'name'=>'Sports',
                                      'description'=> ' voluptatem sit aliquam. Dolores voluptatum est.
                                      Aut molestias et maxime. Fugit autem facilis quos vero. Eius quibusdam possimus est.',
                                      'venue' => 'walsall',
                                      'slug' =>'Karate',
                                      'organiser' =>'Georges',
                                      'price' =>'0',
                                      'date'=>'21/11/01',
                                      'time'=>'12:45:05',
                                      'image'=>'https://images.unsplash.com/photo-1542937307-2d46ff7444a1?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                                      
                                                     
                                               ]);

        
                         Event::create([
                          'title' => 'Live Music',
                          'name'=>' Culture',
                          'description'=> 'A consectetur quos aliquam. In iste aliquid et aut similique suscipit. Consequatur qui
                          quaerat iste minus hic expedita. Consequuntur error magni et laboriosam. Aut aspernatur.',
                          'venue' => 'walsall',
                          'slug' =>'Live Music',
                          'organiser' =>'Antonio',
                          'price' =>'0',
                          'date'=>'21/09/21',
                          'time'=>'09:45:05',
                          'image'=>'https://images.unsplash.com/photo-1598387845849-1a16ae8fe2fb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1355&q=80',
                 
                                   ]);


        
                                     Event::create([
                                        'title' => 'Live Show',
                                        'name'=>'Culture',
                                        'description'=> 'Ea quaerat et quisquam. Deleniti sunt quam. Adipisci consequatur id in occaecati.
                                        Et sint et. Ut ducimus quod nemo ab voluptatum.',
                                        'venue' => 'walsall',
                                        'slug' =>'Live Show',
                                        'organiser' =>'Eugene',
                                        'price' =>'0',
                                        'date'=>'21/10/21',
                                        'time'=>'09:05:05',
                                        'image'=>' https://images.unsplash.com/photo-1559735779-a10ef39b02fd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                                        
                                                
                                                                
                                                 ]);
                                                             
        
                                                 Event::create([
                                                  'title' => 'Come Together',
                                                  'name'=>'Culture',
                                                  'description'=> ' beatae sint laudantium consequatur. Magni occaecati itaque sint et sit tempore. Nesciunt
                                                  amet quidem. Iusto deleniti cum autem ad quia aperiam.
                                                  ',
                                                  'venue' => 'walsall',
                                                  'slug' =>'Come Together',
                                                  'organiser' =>'Eugene',
                                                  'price' =>'0',
                                                  'date'=>'21/04/11',
                                                  'time'=>'09:05:05',
                                                  'image'=>' https://images.unsplash.com/photo-1556484687-30636164638b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1267&q=80',
                                                  
                                                      
                                                  
                                                  
                                                                          
                                                           ]);
 
                                                 Event::create([
                                                    'title' => 'Fundraising',
                                                    'name'=>'Others',
                                                    'description'=> 'Ea quaerat et quisquam. Deleniti sunt quam. Adipisci consequatur id in occaecati.
                                                    Et sint et. Ut ducimus quod nemo ab voluptatum.',
                                                    'venue' => 'walsall',
                                                    'slug' =>'Fundraising',
                                                    'organiser' =>'Patrick',
                                                    'price' =>'0',
                                                    'date'=>'21/08/05',
                                                    'time'=>'10:15:05',
                                                    'image'=>'https://images.unsplash.com/photo-1560073743-0a45c01b68c4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1267&q=80',
                                                    
                                                            
                                                                            
                                                             ]);
                                                                                                                          
                                           
                         Event::create([
                          'title' => 'Cinema Show',
                          'name'=>'Others',
                          'description'=> ' beatae sint laudantium consequatur. Magni occaecati itaque sint et sit tempore. Nesciunt
                          amet quidem. Iusto deleniti cum autem ad quia aperiam.',
                          'venue' => 'walsall',
                          'slug' =>'Cinema Show',
                          'organiser' =>'Georges',
                          'price' =>'0',
                          'date'=>'21/05/21',
                          'time'=>'10:15:05',
                          'image'=>'https://images.unsplash.com/photo-1572188863110-46d457c9234d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                          
                                  
                                                  
                                   ]);   
                                   
                                   
                                                      
                         Event::create([
                          'title' => 'Movie Night',
                          'name'=>'Others',
                          'description'=> 'A consectetur quos aliquam. In iste aliquid et aut similique suscipit. Consequatur qui
                          quaerat iste minus hic expedita. Consequuntur error magni et laboriosam. Aut aspernatur',
                          'venue' => 'walsall',
                          'slug' =>'Movie Night',
                          'organiser' =>'Georges',
                          'price' =>'0',
                          'date'=>'21/05/03',
                          'time'=>'10:15:05',
                          'image'=>'https://images.unsplash.com/photo-1590179068383-b9c69aacebd3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80',
                          
                                  
                                                  
                                   ]);                    


                                                      
                         Event::create([
                          'title' => 'Fishing',
                          'name'=>'Others',
                          'description'=> 'A consectetur quos aliquam. In iste aliquid et aut similique suscipit. Consequatur qui
                          quaerat iste minus hic expedita. Consequuntur error magni et laboriosam. Aut aspernatur',
                          'venue' => 'walsall',
                          'slug' =>'Fishing',
                          'organiser' =>'John',
                          'price' =>'0',
                          'date'=>'21/08/03',
                          'time'=>'11:45:05',
                          'image'=>'https://images.unsplash.com/photo-1505441716189-50b06af1f43b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                          
                                  
                                                  
                                   ]);                    
        

                                   Event::create([
                                    'title' => 'Theatre',
                                    'name'=>'Others',
                                    'description'=> 'A consectetur quos aliquam. In iste aliquid et aut similique suscipit. Consequatur qui
                                    quaerat iste minus hic expedita. Consequuntur error magni et laboriosam. Aut aspernatur',
                                    'venue' => 'walsall',
                                    'slug' =>'Theatre',
                                    'organiser' =>'John',
                                    'price' =>'0',
                                    'date'=>'21/05/01',
                                    'time'=>'11:45:05',
                                    'image'=>'https://images.unsplash.com/photo-1527224857830-43a7acc85260?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1351&q=80',
                                    
                                            
                                                            
                                             ]);                    


                        
                                             Event::create([
                                                   'title' => 'Food Competion',
                                                   'name'=>'Culture',
                                                   'description'=> ' beatae sint laudantium consequatur. Magni occaecati itaque sint et sit tempore. Nesciunt
                                                   amet quidem. Iusto deleniti cum autem ad quia aperiam.',
                                                   
                                                   'venue' => 'walsall',
                                                   'slug' =>'Food Competion',
                                                   'organiser' =>'Eugene',
                                                   'price' =>'0',
                                                   'date'=>'21/06/21',
                                                   'time'=>'11:45:05',
                                                   'image'=>'https://images.unsplash.com/photo-1601118964938-228a89955311?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80',
                                                    

                                                                          
                                                   ]);

                                                   Event::create([
                                                    'title' => 'Marathon',
                                                    'name'=>'Culture',
                                                    'description'=> ' beatae sint laudantium consequatur. Magni occaecati itaque sint et sit tempore. Nesciunt
                                                    amet quidem. Iusto deleniti cum autem ad quia aperiam.',
                                                    
                                                    'venue' => 'walsall',
                                                    'slug' =>'Marathon',
                                                    'organiser' =>'Eugene',
                                                    'price' =>'0',
                                                    'date'=>'21/012/01',
                                                    'time'=>'11:45:05',
                                                    'image'=>'https://images.unsplash.com/photo-1570004119777-2b1786b0e5bd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                                                     
 
                                                                           
                                                    ]);

