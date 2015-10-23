<?php
/**
 * Created by PhpStorm.
 * User: yarhtut
 * Date: 21/10/15
 * Time: 11:13 PM
 */
class MyMember extends DataExtension{

    //assigned $url
    protected static $url = "https://api.randomuser.me/?result=3";


    /**
     * @param $url URL of Api call
     */
    public static function setUrl($url)
    {
        self::$url = $url;
    }


    /**
     * @param $url URL of Api call
     */
    public static function getViewableData($params=[])
    {
        //create arrayList
        $members = ArrayList::create();

        $api_array = self::requestApiCall($params[]);

        if (isset($api_array['results'])) {

            foreach ($api_array['results'] as $data) {
                //create array
                $member = array();

                $members->push($member);


            }
        }

        return $members;
    }


    /**
     * @param $url
     * @param array $params
     */
    public static function requestApiCall($url,$params=[]){

        $response = new RestfulService(self::setUrl());

        if(!$response) {

            SS_Log::log('No response from API' . $url, SS_Log::WARN);
            return false;

        }else{

            $api_array = Convert::json2array($response);
        }

        return $api_array;
    }




}