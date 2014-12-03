<?php
require_once('../source/Catapult.php');

// below is a sample fetching 
// recordings
// IMPORTANT: edit credentials.json
// with your information
// or comment out below /w your keys
//
$cred = new Catapult\Credentials('u-mmuxnl7o2u2ijsdg2hrwdsq', 't-6fazqwatb5dvfyc6myihzdq', '6xycw6e25w6tltw3nvhkgj7tukreq6d63w4mazq');
//$cred = new Catapult\Credentials;
// dont forget to comment out the implicit version if using assoc array

$client = new Catapult\Client($cred);


try {
	$recording = new Catapult\Recording;

	/** list all recordings **/

	$recording = $recording->listRecordings()
			       ->last();

	/** make media **/
	$media = $recording->getMediaFile();


	$file = uniqid(true) . ".wav";
	printf("Fetched the last recording now saving in:  ./out/%s", $file);
	/**
         * we can now save this to disk
         */

	try {
		$media->store("./out/$file");

		printf("Saved media file succesfully!");
	} catch (Exception $e) {

		printf("Could not save media file..");	
	}
	

} catch (\CatapultApiException $e) {
	echo var_dump($e);	
}
?>
