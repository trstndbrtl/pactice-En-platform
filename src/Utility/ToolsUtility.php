<?php

namespace App\Utility;



class ToolsUtility
{
    /**
     * function to return string formatted for path
     *
     * @param $title_for_path
     */
    public static function cleanPathForUrl(string $title_for_path): string {
        setlocale(LC_CTYPE, 'en_US.UTF8');
        $title_for_path = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $title_for_path);
        $title_for_path = preg_replace('~[^\-\pL\pN\s]+~u', '-', $title_for_path);
        $title_for_path = str_replace(' ', '-', $title_for_path);
        $title_for_path = str_replace('--', '-', $title_for_path);
        $title_for_path = trim($title_for_path, "-");
        $title_for_path = strtolower($title_for_path);
        return $title_for_path;
    }
    
    /**
     * Function to return START date formatted for database CRUD
     *
     * @param $start_day
     * @param $start_hours
     */
    public static function getStartDateAndHour(string $start_day, string $start_hours): string {

        $date_form = $start_day . ' ' . $start_hours;
        $date_created = date_create($date_form);
        $date_formatted = date_format($date_created, 'Y-m-d H:i:s');
        return $date_formatted;

    }

    /**
     * Function to return END date formatted for database CRUD
     *
     * @param $start_day
     * @param $end_day
     * @param $end_hours
     * @param $active
     */
    public static function getEndDateAndHour(string $start_day, string $end_day, string $end_hours, string $active): string {

        if($active) {
            $date_form_end = $end_day . ' ' . $end_hours;
            $date_created_end = date_create($date_form_end);
            $date_formatted_end = date_format($date_created_end, 'Y-m-d H:i:s');
        }else{
            $date_form_end = $start_day . ' ' . $end_hours;
            $date_created_end = date_create($date_form_end);
            $date_formatted_end = date_format($date_created_end, 'Y-m-d H:i:s');
        }

        return $date_formatted_end;
        
    }

    /**
     * Function to return verd for homepage
     *
     * @return array
     */
    public static function getVerbHomePage(): array {

        $arrX = array("do", "be","have", "eat", "know","learn", "sing");
        // get 2 random indexes Verb
        $randIndex = array_rand($arrX, 2);
        
        return [$arrX[$randIndex[0]], $arrX[$randIndex[1]]];

    }
    
}
