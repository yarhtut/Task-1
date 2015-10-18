<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);


class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */

	private static $allowed_actions = array (

	);

	/**
	 * Request api json data
	 */


	public function getRandomData() {

		//api key or params
		//$key = '';

		//set Url
		$api_url = 'http://api.randomuser.me/?results=3';

		//read json content
		$api_json = file_get_contents($api_url);

		//check
		if(!isset($api_json))
		{
			SS_log::log('Not response  from Api');
			return false;

		}else{

			$api_array = json_decode($api_json,true);


		}
		//print_r($members); exit();
		return $api_array;

	}

	/*
	 * View able data to .SS
	 */

	public function getViewableData(){
		//create arrayList
		$members = ArrayList::create();

		$api_array = $this->getRandomData();


		if(isset($api_array['results'])){

			foreach($api_array['results'] as $data) {
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
			//print_r($members);exit();
			//push array to arraylist
			$this->writeToDatabase();
			return $members;
	}


	/**
	 *  Save Data Array to  Member Table
	 */
	public function writeToDatabase(){

		$api_array = $this->getRandomData();

		foreach($api_array['results'] as $data) {
			$newMember = new RandomUser();

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
	}



	public function init() {
		parent::init();
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
	}



}
