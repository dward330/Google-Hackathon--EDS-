/* 
 * This Script will load the Environment Issues into the View. 
 * When the user requests for more entries, this script will load more. 
 */

var loadIssues = angular.module("loadIssues",[]);

loadIssues.service('dataSharingService', function() {
  //Create new object to hold data shared between controllers
  var dataContainer = function(){ //private variable
    this.dataValue="";
      
    //Sets data Value
    this.setValue = function(value){
        this.dataValue = value;
    };
  
    //Returns the data Stored
    this.getValue = function(){
        return this.dataValue;
    };
  };   
    
  this.data = new dataContainer();
});

loadIssues.controller("loadIssuesCtrl",["$scope", "$http","$parse", "$rootScope","$timeout", "dataSharingService", function ($scope, $http, $parse, $rootScope,$timeout, dataSharingService){
    $scope.listOfIssues = new Array();
    $scope.linkedSuccessfully = "Angular Correctly Linked!";
    $scope.navigator = {}; //Creates a Issue Navigator Object
    var map;//For containing Google Maps Object
    
    //Initialize Google Maps Info for the Environmental Issue
    $scope.initializeGoogleMaps = function (lat, long) {
        //Create and Store Map Center
        var issueLocation = new google.maps.LatLng(lat,long);
        
        //Create all the Map's Options
        var mapOptions = {
          center: issueLocation,
          zoom: 18,
          mapTypeId: google.maps.MapTypeId.HYBRID //shows satellite and labels
        };
        
        //Create New Map
        map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
        
        //Create a new Animated Marker
        var issueMarker=new google.maps.Marker({
            position: issueLocation,
            animation: google.maps.Animation.BOUNCE
        });
        
        //Place Marker on the map
        issueMarker.setMap(map);
        
        //If User Moves Map, place the map back on its center a second later
        google.maps.event.addListener(map,'center_changed',function(){
            $timeout(function () {
                map.panTo(issueMarker.getPosition());
            }, 1000);
        });
        
        //If possible with a given location: Tilt map at 45 degrees
        map.setTilt(45);
    };
    
    //Post Request to grab Environment Issues
    $http.post("http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/retrieveEnvironmentIssues.php", {x:'10',y:'0'}).
    success(function(data, status, headers, config) {
    // this callback will be called asynchronously
    // when the response is available
       //alert("Post Request to retrieveEnvironmentIssues.php was\n successfully called.");
       
        $scope.listOfIssues = data;
        dataSharingService.data.setValue(data);
        $rootScope.$broadcast('EnvironmentIssuesGathered!');
    }).
    error(function(data, status, headers, config) {
    // called asynchronously if an error occurs
    // or server returns response with an error status.
        alert("There was an error trying to retrieveEnvironmentIssues.php was");
    });  
    
    $scope.delete = function (idToDelete){
        //Update Issue Navigator: Go to the next issue
        if ( angular.element("#modaltest").hasClass('in') ){
            //Issue Navigator is Visible
            //alert ("Navigator is Visible");
            /* Will need to refactor this so it doesnt keep looping once id is found*/
            for (index = 0; index < ($scope.listOfIssues.length); index++){
                //Found the issue we want to delete
                if (idToDelete.toString() == $scope.listOfIssues[index].id.toString()){
                    
                    /* If this is the last issue and there is more than one issue,
                     * load the previous issue 
                     */
                    if ( (index == ($scope.listOfIssues.length -1)) && ($scope.listOfIssues.length > 1) ){ 
                        //alert("last issue, more than one");
                        //Load Previous Issue
                        $scope.loadIssueNavigator($scope.listOfIssues[index-1].id.toString());
                    }
                    /* Else If this is the last issue and there was only one 
                     * issue to begin with 
                     */
                    else if ((index == ($scope.listOfIssues.length -1)) && (!($scope.listOfIssues.length > 1)) ){
                        //alert("last issue, only one");
                        //Just close Modal:
                        angular.element("#modaltest").modal("hide");
                    }
                    /*This is the first Issue and there is more than one issue*/
                    else if (index == '0' && ($scope.listOfIssues.length > 1)){
                        //alert("first issue, more than one");
                        //Load the next Issue:
                        $scope.loadIssueNavigator($scope.listOfIssues[index+1].id.toString());
                    }
                    /* This is the first Issue and there is not more than one issue*/
                    else if ( index == '0' && (!($scope.listOfIssues.length > 1)) ){
                        //alert("first issue, only one");
                        //Just close Modal:
                        angular.element("#modaltest").modal("hide");
                    }
                    /*There is another issue after this one, so just load that*/
                    else {
                        //alert("just load next issue");
                        //Load the next issue:
                        $scope.loadIssueNavigator($scope.listOfIssues[index+1].id.toString());
                    }
                }
            }
        }
        else{
            //Issue Navigator is not Visible
            //alert ("Navigator is NOT Visible\nValue: "+angular.element("#modaltest").hasClass('in'));
        }
        
        //Remove this Environment Issue
        angular.element("#"+idToDelete).remove();
        //Remove this Environment Issue from the scope list
        $scope.deleteFromScopeList(idToDelete);

        //alert("Button Clicked: "+idToDelete);
        
        //Post Request to Delete this Environment Issue
        $http.post("http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/deleteEntry.php", {id:idToDelete}).
        success(function(data, status, headers, config) {
        // this callback will be called asynchronously
        // when the response is available
           //alert("Environment Issue Successfully Deleted.: "+idToDelete);
        }).
        error(function(data, status, headers, config) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
            alert("Environment Issue Not Deleted.: "+idToDelete);
        });
        
    };
    
    $scope.deleteFromScopeList = function (id){
        $scope.listOfIssuesTemp = new Array();
      
        for (index = 0; index < ($scope.listOfIssues.length); index++){
            //Found the issue we want to delete
            if (id.toString() == $scope.listOfIssues[index].id.toString()){
                continue; //skip over this issue, dont add it to the list
            }
            else{
                //Keep in the list
                $scope.listOfIssuesTemp.push($scope.listOfIssues[index]);
            }
        }
        
        //Update List of Environmental Issues
        $scope.listOfIssues = $scope.listOfIssuesTemp;
    };
    
    $scope.loadIssueNavigator = function(id){
        //Show the Modal
        angular.element("#modaltest").modal("show");
        
        //Get the Issue that was clicked on
        for (index = 0; index < ($scope.listOfIssues.length); index++){
            if (id.toString() == $scope.listOfIssues[index].id.toString()){
                $scope.navigator.id = $scope.listOfIssues[index].id.toString();
                $scope.navigator.date = $scope.listOfIssues[index].date;
                $scope.navigator.issueType = (($scope.listOfIssues[index].issueType === (undefined || "")) ? "Unknown" : $scope.listOfIssues[index].issueType);
                $scope.navigator.description = (($scope.listOfIssues[index].description === (undefined || "")) ? "Unknown" : $scope.listOfIssues[index].description);
                $scope.navigator.zipCode = (($scope.listOfIssues[index].zipCode === (undefined || "")) ? "Unknown" : $scope.listOfIssues[index].zipCode);
                $scope.navigator.firstName = (($scope.listOfIssues[index].firstName === (undefined || "")) ? "Unknown" : $scope.listOfIssues[index].firstName);
                $scope.navigator.lastName = (($scope.listOfIssues[index].lastName === (undefined || "")) ? "Unknown" : $scope.listOfIssues[index].lastName);
                $scope.navigator.email = (($scope.listOfIssues[index].email === (undefined || "")) ? "Unknown" : $scope.listOfIssues[index].email);
                $scope.navigator.phoneNumber = (($scope.listOfIssues[index].phoneNumber === (undefined || "")) ? "Unknown" : $scope.listOfIssues[index].phoneNumber);
                $scope.navigator.Image_Filepath = (($scope.listOfIssues[index].Image_Filepath === (undefined || "")) ? "Unknown" : $scope.listOfIssues[index].Image_Filepath);

                //Loap the Mapping module for the this Environment Issue
                $scope.initializeGoogleMaps(parseFloat($scope.listOfIssues[index].latitude), parseFloat($scope.listOfIssues[index].longitude));

                //"Refresh" Map in half a second : solution to handle bug with modals
                $timeout(function () {
                    google.maps.event.trigger(map, 'resize');                   
                    //alert("called map resized");
                }, 500);
            }
        }
    };
    
    //Loads in the next Environment issue into the Navigator
    $scope.issueNavigatorNext = function(id){ 
        //alert("click next");
        //Load the next Issue if there is one
        for (index = 0; index < ($scope.listOfIssues.length); index++){
            /*alert("Id Submitted: "+id+"\n"+
                  "current Index: "+index+"\n"+
                  "current Id: "+$scope.listOfIssues[index].id); */
            //We have found the current issue we are looking at
            if (id.toString() == $scope.listOfIssues[index].id.toString()){
                //If there is a next issue
                if ((index+1) <= ($scope.listOfIssues.length - 1)){
                    //Load the next issue
                    $scope.loadIssueNavigator($scope.listOfIssues[index+1].id.toString());
                    //alert("loading next issue");
                }
                break;//leave for loop
            }
        }
    };
    
    //Loads in the previous Environment issue into the Navigator
    $scope.issueNavigatorPrevious = function(id){
        //alert("click next");
        //Load the next Issue if there is one
        for (index = 0; index < ($scope.listOfIssues.length ); index++){
            /*alert("Id Submitted: "+id+"\n"+
                  "current Index: "+index+"\n"+
                  "current Id: "+$scope.listOfIssues[index].id); */
            //We have found the current issue we are looking at
            if (id.toString() == $scope.listOfIssues[index].id.toString()){
                //If there is a next issue
                if ((index-1) >= 0){
                    //Load the next issue
                    $scope.loadIssueNavigator($scope.listOfIssues[index-1].id.toString());
                    //alert("loading next issue");
                }
                break;//leave for loop
            }
        } 
    };
}]);


