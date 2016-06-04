<?php

namespace App\Classes;
use Illuminate\Support\Collection;

class Contents {
    
    public static function getContents($content)
    {
        $contents = ['news' => ['title' => 'news',
                            'description' => 'News',
                            'url' => 'news',
                            'content_type' => 'NEWS'],
                'events' => ['title' => 'events',
                            'description' => 'Events',
                            'url' => 'events',
                            'content_type' => 'EV'],
                'result' => ['title' => 'result',
                            'description' => 'Result',
                            'url' => 'result',
                            'content_type' => 'RS'],
                'academic_calender' => ['title' => 'academic_calender',
                            'description' => 'Academic Calender',
                            'url' => 'academic_calender',
                            'content_type' => 'AC'], 
                'holiday_list' => ['title' => 'holiday_list',
                            'description' => 'Holiday List',
                            'url' => 'holiday_list',
                            'content_type' => 'HL'],
                'prospectus' => ['title' => 'prospectus',
                            'description' => 'Prospectus',
                            'url' => 'prospectus',
                            'content_type' => 'PS'],
                'gallery' => ['title' => 'gallery',
                            'description' => 'Gallery',
                            'url' => 'gallery',
                            'content_type' => 'GLR'],
                'rules_and_regulations' => ['title' => 'rules_and_regulations',
                            'description' => 'Rules and Regulations',
                            'url' => 'rules_and_regulations',
                            'content_type' => 'RR']
                ];
                
            
            if(!array_key_exists ( $content , $contents )) return null;
            return json_decode(json_encode($contents[$content]), FALSE);
    }
    
     public static function getCollection()
    {
        $collection = collect(['news' => ['title' => 'news',
                            'description' => 'News',
                            'url' => 'news',
                            'content_type' => 'NEWS'],
                'events' => ['title' => 'events',
                            'description' => 'Events',
                            'url' => 'events',
                            'content_type' => 'EV'],
                'result' => ['title' => 'result',
                            'description' => 'Result',
                            'url' => 'result',
                            'content_type' => 'RS'],
                'academic_calender' => ['title' => 'academic_calender',
                            'description' => 'Academic Calender',
                            'url' => 'academic_calender',
                            'content_type' => 'AC'], 
                'holiday_list' => ['title' => 'holiday_list',
                            'description' => 'Holiday List',
                            'url' => 'holiday_list',
                            'content_type' => 'HL'],
                'prospectus' => ['title' => 'prospectus',
                            'description' => 'Prospectus',
                            'url' => 'prospectus',
                            'content_type' => 'PS'],
                'gallery' => ['title' => 'gallery',
                            'description' => 'Gallery',
                            'url' => 'gallery',
                            'content_type' => 'GLR'],
                'rules_and_regulations' => ['title' => 'rules_and_regulations',
                            'description' => 'Rules and Regulations',
                            'url' => 'rules_and_regulations',
                            'content_type' => 'RR']
                ]);
                
            return $collection;
    }
}