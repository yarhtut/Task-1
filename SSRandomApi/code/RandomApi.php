<?php
/**
 * Created by PhpStorm.
 * User: yarhtut
 * Date: 27/10/15
 * Time: 8:23 AM
 */
class RandomApi extends DataExtension{

    protected static $url = "";
    protected static $params = "";

    public static function setUrl($url){
        self::$url = $url;

    }
    public static function setParams($params){
        self::$params = $params;

    }
    /**
     * Request api json data
     */
    public function getRandomData() {
        //set Url
        $api_url = new RestfulService(self::$url);

        //read json content
        //$api_json = file_get_contents($api_url);

        $api_json = $api_url->request(self::$params);

        //$api_json = $api_url->request($api_url);
        //echo $api_url;
        //print_r($api_json);die();
        //check
        if(!isset($api_json))
        {
            SS_log::log('Not response  from Api');
            return false;

        }else{
            //$api_array = json_decode($api_json,true);
            $api_array = Convert::json2array($api_json->getBody());

        }
       //echo $api_json->getBody();
        //print_r($api_array); exit();
        return $api_array;

    }


    public function getViewableData(){
        //create arrayList
        $members = ArrayList::create();
        //echo 'running getViewableData';
        $api_array = self::getRandomData();

        //print_r($api_array);die();
        if(isset($api_array['results'])){
            $results = $api_array['results'];
            //print_r($results);die();
            foreach($results as $data) {
                //create array
                $member = array();

                $member['title'] = $data ['user']['name'] ['title'];
                $member['gender'] = $data ['user']['gender'];

                $member['firstname'] = $data ['user']['name'] ['first'];
                $member['surname'] = $data ['user']['name'] ['last'];
                $member['email'] = $data ['user'] ['email'];

                $member['img'] = $data ['user'] ['picture']['thumbnail'];


                $members->push($member);

            }

        }
      //  echo 'members';
       // print_r($members); die();
        //push array to arraylist

        return $members;
    }



    /*public function writeToDatabase(){

        $api_array = $this->getRandomData();

        foreach($api_array['results'] as $data) {
            $newMember = new MyMemberExtension();

            $newMember->Title = $data ['user']['name'] ['title'];
            $newMember->Gender = $data ['user'] ['gender'];
            $newMember->DoB = $data ['user'] ['dob'];


            $newMember->FirstName = $data ['user']['name'] ['first'];
            $newMember->Surname = $data ['user']['name'] ['last'];

            $newMember->Street = $data ['user']['location'] ['street'];
            $newMember->City = $data ['user']['location'] ['city'];

            $newMember->Email = $data ['user'] ['email'];
            $newMember->Image = $data ['user'] ['picture']['thumbnail'];

            //add to database
            $database = $newMember->write();

        }

        return $database;
    }*/



}