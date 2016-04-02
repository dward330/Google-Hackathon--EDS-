<?php

 class EnvironmentIssue{
     
     //Server Side Information
     private $imageSavingDirectory = ""; //This is the directory where images will be saved on the  web server
     private $imageName="";
     private $imageFileType ="";
     private $absPathToImage = "";
     
     //Information about the Environment Issue
     private $firstName = "";
     private $lastName = "";
     private $phoneNumber = "";
     private $email = "";
     private $zipCode = "";
     private $description = "";
     private $issueType = "";
     private $longitude = "";
     private $latitude = "";
     private $validImageSubmitted = "";
     
     
     function __construct($newEnvironmentIssueData, $directoryToSaveTo) {
       // ob_start();
        //var_dump($newEnvironmentIssueData);
       // $contents = ob_get_contents();
        //ob_end_clean();
        
        //error_log($contents);
        //error_log($newEnvironmentIssueData["firstName"]);
        
        $this->firstName = $newEnvironmentIssueData["firstName"];
        $this->lastName = $newEnvironmentIssueData["lastName"];
        $this->phoneNumber = $newEnvironmentIssueData["phoneNumber"];
        $this->email = $newEnvironmentIssueData["email"];
        $this->zipCode = $newEnvironmentIssueData["zipCode"];
        $this->description = $newEnvironmentIssueData["description"];
        $this->issueType = $newEnvironmentIssueData["issueType"];
        $this->latitude = $newEnvironmentIssueData["latitude"];
        $this->longitude = $newEnvironmentIssueData["longitude"];
     
        //This is the directory where Images will be saved to on the web server
        $this->imageSavingDirectory = $directoryToSaveTo;
     }
     
     public function getFirstName(){
         return ($this->firstName);
     }
     
     public function getLastName(){
         return ($this->lastName);
     }
     
     public function getPhoneNumber(){
         return ($this->phoneNumber);
     }
     
     public function getEmail(){
         return ($this->email);
     }
     
     public function getZipCode(){
         return ($this->zipCode);
     }
     
     public function getDescription(){
         return ($this->description);
     }
     
     public function getIssueType(){
         return ($this->issueType);
     }
     
     public function getLongitude(){
         return ($this->longitude);
     }
     
     public function getLatitude(){
         return ($this->latitude);
     }
     
     public function toString(){
         $EnvironmentIssueDataStr = ("Data on the Environment Issue:\n"
                 . "First Name: " . $this->firstName . "\n"
                 . "Last Name: " . $this->lastName . "\n"
                 . "Phone Number: " . $this->phoneNumber . "\n"
                 . "Email: " . $this->email . "\n"
                 . "Zip Code: " . $this->zipCode . "\n"
                 . "Description: " . $this->description . "\n"
                 . "Issue Type: " . $this->issueType . "\n"
                 . "Longitude: " . $this->longitude . "\n"
                 . "Latitude: " . $this->latitude . "\n");
         
         //Return Environment Issue Info with Image Data, If an Image was Submitted
         if (TRUE === $this->validImageSubmitted){
             return ($EnvironmentIssueDataStr 
                     . "Image Name: " . $this->imageName . "\n"
                     . "Image File Type: " . $this->imageFileType . "\n"
                     . "Absolute Filepath to Image: " . $this->imageSavingDirectory.$this->imageName . "\n");
         }
         //Return Environment Issue Info with No Image Data
         else{
             return ($EnvironmentIssueDataStr);
         }
     }
     
     public function addImageData ($imageName, $currentTempLocation, $imageFileType){
         $this->validImageSubmitted = TRUE;
         
         $this->imageName = $imageName;
         error_log ("Update: Image Name from CellPhone: " . $this->imageName);
         
         $this->imageFileType = $imageFileType;
         error_log ("Update: Image File Type from CellPhone: " . $this->imageFileType);
         
         //Try to Save the Image to its the Permanent Location on the Web Server
         if (move_uploaded_file($currentTempLocation, "".$this->imageSavingDirectory.$this->imageName)){
            error_log ("Update: The Image was successfully uploaded to the Web Server!");
            $this->absPathToImage = $this->imageSavingDirectory.$this->imageName;
         }
         else{
            error_log ("Error Update: The Image was not successfully uploaded to the Web Server!");
            $this->validImageSubmitted = FALSE; 
         }
     }
     
     public function getImageAbsFilePath(){
         if (TRUE === $this->validImageSubmitted){ return ($this->absPathToImage); }
         else{ return (null);}
     }
     
     public function hasImage(){
         return ($this->validImageSubmitted);
     }
     
     public function hasImageStr(){
         if ($this->validImageSubmitted){
             return "YES";
         }
         else{ return "NO"; }
     }
     
 }   

?>
