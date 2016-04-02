/* 
 * This Script will load the Environment Issues into the View. 
 * When the user requests for more entries, this script will load more. 
 */

angular.module("loadIssues",[]).controller("loadIssuesCtrl",["$scope", "$http","$parse", function ($scope, $http, $parse){
    $scope.listOfIssues = new Array();
    $scope.linkedSuccessfully = "Angular Correctly Linked!";
    
    //Post Request to grab Environment Issues
    $http.post("http://edsapplb-1862368837.us-west-2.elb.amazonaws.com/retrieveEnvironmentIssues.php", {x:'10',y:'0'}).
    success(function(data, status, headers, config) {
    // this callback will be called asynchronously
    // when the response is available
       //alert("Post Request to retrieveEnvironmentIssues.php was\n successfully called.");
       
        $scope.listOfIssues = data;
    }).
    error(function(data, status, headers, config) {
    // called asynchronously if an error occurs
    // or server returns response with an error status.
        alert("There was an error trying to retrieveEnvironmentIssues.php was");
    });  
    
    $scope.delete = function (idToDelete){
        //Remove this Environment Issue
        angular.element("#"+idToDelete).remove();

        //alert("Button Clicked: "+idToDelete);
        
        //Post Request to Delete this Environment Issue
        $http.post("http://edsapplb-1862368837.us-west-2.elb.amazonaws.com/deleteEntry.php", {id:idToDelete}).
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
    
}]);


