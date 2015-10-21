<?php
/**
 * Created by PhpStorm.
 * User: yarhtut
 * Date: 21/10/15
 * Time: 11:13 PM
 */
class MyMember extends DataExtension{


    private static $db = array(
        "Title"=> "Varchar(10)",
        "Gender"=>"text",
        "DoB" => "Date",
        "Street"=>"Varchar(100)",
        "City"=>"text",
        "Image"=>"Varchar(100)"


    );

}