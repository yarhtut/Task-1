<?php
/**
 * Created by PhpStorm.
 * User: yarhtut
 * Date: 21/10/15
 * Time: 11:13 PM
 */
class MyMember extends DataExtension{


    protected static $url = "https://api.randomuser.me/?result=3";    //url of the review to be scrapped

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
    public static function getJob($params=[]){

        $request = new RestfulService(self::setUrl());
    }

}