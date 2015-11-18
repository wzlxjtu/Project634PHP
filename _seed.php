<?php
// $usercollections = ['parkinglot','building','user','preference'];

$parkinglot = array(
                    ['id'     =>'50','name'   =>'parking lot 50','lat'     =>'30.623746','lng'         =>'-96.337394',
                     'night'  =>true,'summer' =>true,            'football'=>false,      'construction'=>false,
                     'closest'=>true,'popular'=>true,            'history' =>true,       'active'      =>true],
                    
                    ['id'     =>'51','name'   =>'parking lot 51','lat'     =>'30.621922','lng'         =>'-96.336986',
                     'night'  =>true,'summer' =>true,            'football'=>false,      'construction'=>false,
                     'closest'=>true,'popular'=>true,            'history' =>true,       'active'      =>true],
                    
                    ['id'     =>'100','name'   =>'parking lot 100','lat'     =>'30.607391','lng'         =>'-96.336986',
                     'night'  =>true ,'summer' =>true,             'football'=>false,      'construction'=>false,
                     'closest'=>true ,'popular'=>true,             'history' =>true,       'active'      =>true],
                );
    
$building = array(
                ['id'=>'1','name'=>'HRBB', 'full_name'=>'HRBB'          ,'lat'=>'','lng'=>'','active'=>true],
                ['id'=>'2','name'=>'Evans','full_name'=>'Evans library' ,'lat'=>'','lng'=>'','active'=>true],
                ['id'=>'3','name'=>'Annex','full_name'=>'Annex library' ,'lat'=>'','lng'=>'','active'=>true],   
            );    
    
$user = array(
            ['id'=>'1','userid'=>'user1','password'=>'user1','history'   =>['1'=>['50','100','51'],
                                                                            '2'=>['50']
                                                                           ],
                                                             'active'=>true],
                                                              
            ['id'=>'2','userid'=>'user2','password'=>'user2','active'=>true],
            ['id'=>'3','userid'=>'user3','password'=>'user3','active'=>true],    
        );

    
// $preference = array(
//                 ['id'=>'1','description'=>'closest','active'=>true],
//                 ['id'=>'2','description'=>'popular','active'=>true],
//                 ['id'=>'3','description'=>'history','active'=>true],
//               );    
?>