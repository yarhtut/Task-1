<?php
/**
 * Created by PhpStorm.
 * User: yarhtut
 * Date: 22/10/15
 * Time: 11:49 PM
 */

class MemberExtensions extends DataObject{


    private static $db = array(
        "Title"=> "Varchar(10)",
        "Gender"=>"text",
        "DoB" => "Date",
        "Street"=>"Varchar(100)",
        "City"=>"text",
        "Image"=>"Varchar(100)"


    );



}