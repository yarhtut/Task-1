<?php
/**
 * Created by PhpStorm.
 * User: yarhtut
 * Date: 27/10/15
 * Time: 2:40 PM
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

    private static  $has_one = array();


    public function writeToDatabase(){

        $api_array = RandomApi::getRandomData();

        $results = $api_array['results'];


        foreach($results as $data) {



            $this->Title = $data ['user']['name'] ['title'];
            $this->Gender = $data ['user'] ['gender'];
            $this->DoB = $data ['user'] ['dob'];


            $this->FirstName = $data ['user']['name'] ['first'];
            $this->Surname = $data ['user']['name'] ['last'];

            $this->Street = $data ['user']['location'] ['street'];
            $this->City = $data ['user']['location'] ['city'];

            $this->Email = $data ['user'] ['email'];
            $this->Image = $data ['user'] ['picture']['thumbnail'];

            //add to database

                $database = $this->write();



        }

        return $database;
    }



}