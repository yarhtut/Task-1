<?php
/**
 * Created by PhpStorm.
 * User: yarhtut
 * Date: 16/10/15
 * Time: 7:38 AM
 */
class RandomUser extends Member{

    private static $db = array(
        "Title"=> "Varchar(10)",
        "Gender"=>"text",
        "DoB" => "Date",
        "Street"=>"Varchar(100)",
        "City"=>"text",
        "Image"=>"Varchar(100)"


    );

   /* private static $has_one = array(
        'Image'=>'Image'
    );*/




}