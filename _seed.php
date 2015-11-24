<?php
// $usercollections = ['parkinglot','building','user','preference'];

$parkinglot = array(
                    ['id'     =>'50','name'   =>'parking lot 50','lat'     =>'30.623746','lng'         =>'-96.337394',
                     'night'  =>true,'summer' =>true,            'football'=>false,      'construction'=>false,
                     'closest'=>true,'popular'=>true,            'history' =>true,       'business'=>true, 'diabled'=>false, 'active'      =>true],   //disabled false
                    
                    ['id'     =>'51','name'   =>'parking lot 51','lat'     =>'30.621922','lng'         =>'-96.336986',
                     'night'  =>true,'summer' =>true,            'football'=>false,      'construction'=>false,
                     'closest'=>true,'popular'=>true,            'history' =>true,       'business'=>true,'diabled'=>true, 'active'      =>true],
                    
                    ['id'     =>'100','name'   =>'parking lot 100','lat'     =>'30.607391','lng'         =>'-96.336986',
                     'night'  =>true ,'summer' =>true,             'football'=>false,      'construction'=>false,
                     'closest'=>true ,'popular'=>true,             'history' =>true,       'business'=>false, 'diabled'=>true,'active'      =>true],  // business false

                    ['id'     =>'47','name'   =>'parking lot 47  ','lat'     =>'30.621387','lng'         =>'-96.337844',
                     'night'  =>true ,'summer' =>true,             'football'=>false,      'construction'=>false,
                     'closest'=>true ,'popular'=>true,             'history' =>true,       'business'=>true, 'diabled'=>true,'active'      =>true],

                    ['id'     =>'54','name'   =>'parking lot 54'  ,'lat'     =>'30.619611','lng'         =>'-96.337095',
                     'night'  =>true ,'summer' =>true,             'football'=>false,      'construction'=>false,
                     'closest'=>true ,'popular'=>true,             'history' =>true,       'business'=>false, 'diabled'=>true,'active'      =>true],  // business false

                    ['id'     =>'55','name'   =>'parking lot 55'  ,'lat'     =>'30.617820','lng'         =>'-96.335496',
                     'night'  =>true ,'summer' =>true,             'football'=>false,      'construction'=>false,
                     'closest'=>true ,'popular'=>true,             'history' =>true,       'business'=>true, 'diabled'=>true,'active'      =>true],  
                     
                    ['id'     =>'62','name'   =>'parking lot 62'  ,'lat'     =>'30.60904','lng'         =>'-96.341855',
                     'night'  =>true ,'summer' =>true,             'football'=>false,      'construction'=>false,
                     'closest'=>true ,'popular'=>true,             'history' =>true,       'business'=>true, 'diabled'=>true,'active'      =>true],    
                     
                    ['id'     =>'69','name'   =>'parking lot 69'  ,'lat'     =>'30.608076','lng'         =>'-96.339237',
                     'night'  =>true ,'summer' =>true,             'football'=>false,      'construction'=>false,
                     'closest'=>true ,'popular'=>true,             'history' =>true,       'business'=>true, 'diabled'=>true,'active'      =>true],    
                    
                    ['id'     =>'48','name'   =>'parking lot 48'  ,'lat'     =>'30.608962','lng'         =>' -96.338164',
                     'night'  =>true ,'summer' =>true,             'football'=>false,      'construction'=>false,
                     'closest'=>true ,'popular'=>true,             'history' =>true,       'business'=>true, 'diabled'=>true,'active'      =>true],
                     
                    ['id'     =>'39','name'   =>'parking lot 39'  ,'lat'     =>'30.611169','lng'         =>'-96.343893',   // construction
                     'night'  =>true ,'summer' =>true,             'football'=>false,      'construction'=>true,
                     'closest'=>true ,'popular'=>true,             'history' =>true,       'business'=>true, 'diabled'=>true, 'active'      =>true],                          
                );
    
$building = array(
                ['id'=>'1','name'=>'HRBB',   'full_name'=>'HRBB'          ,'lat'=>'30.618917','lng'=>'-96.338078','active'=>true],
                ['id'=>'2','name'=>'Evans',  'full_name'=>'Evans library' ,'lat'=>'30.616393','lng'=>'-96.338476','active'=>true],
                ['id'=>'3','name'=>'Annex',  'full_name'=>'Annex library' ,'lat'=>'30.615975','lng'=>'-96.338023','active'=>true],   
                ['id'=>'4','name'=>'Kyle',   'full_name'=>'Kyle Field'    ,'lat'=>'30.610068','lng'=>'-96.340472','active'=>true],
                ['id'=>'5','name'=>'Zachry', 'full_name'=>'Zachry Civil Engineering'  ,'lat'=>'30.619719','lng'=>'-96.338887','active'=>true],
                ['id'=>'6','name'=>'MSC',    'full_name'=>'Memorial Student Center'   ,'lat'=>'30.612315','lng'=>'-96.341415','active'=>true],
                ['id'=>'7','name'=>'ETB',    'full_name'=>'Emerging Technologies Building '   ,'lat'=>'30.622946','lng'=>'-96.338953','active'=>true],
            );       
    
$user = array(
            [
               'id'=>'1','userid'=>'regularBill','password'=>'test','parkingpermit'=>'50',
               'first_name'=>'Bill','last_name'=>'regular', 'email'=>'bill@tamu.edu', 
               'well_lit'=>false,'easy_exit'=>false,'easy_parking'=>true,'like_walking'=>true,
               'history'   =>['1'=>['50','100','51'],
                              '2'=>['50']
                            ],
               'active'=>true
             ],
                                                              
            [
               'id'=>'2','userid'=>'visitorScott','password'=>'test','parkingpermit'=>'51', 
               'first_name'=>'Scott','last_name'=>'visitor', 'email'=>'scott@tamu.edu',
               'well_lit'=>true,'easy_exit'=>false,'easy_parking'=>true,'like_walking'=>true,
               'active'=>true
            
            ],
               
            [
             
               'id'=>'3','userid'=>'disabledJerry','password'=>'test',
               'first_name'=>'Jerry','last_name'=>'disabled', 'email'=>'jerry@tamu.edu',
               'well_lit'=>true,'easy_exit'=>false,'easy_parking'=>true,'like_walking'=>true,
               'active'=>true
               
            ],    
            [
             
               'id'=>'4','userid'=>'businessSam','password'=>'test','parkingpermit'=>'50', 
               'first_name'=>'Sam','last_name'=>'business', 'email'=>'sam@tamu.edu',
               'well_lit'=>true,'easy_exit'=>false,'easy_parking'=>true,'like_walking'=>true,
               'active'=>true
             
            ], 
        );

    
?>