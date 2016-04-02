/* 
 * This Script will control showing the different issues inside the "Close-up"
 * Navigator.
 */

loadIssues.controller("issuesNavigatorCtrl",["$scope","$rootScope", "dataSharingService", function ($scope,$rootScope, dataSharingService){
    $scope.testData = "test Data Loaded";
    //$scope.dataPassed = dataSharingService.dataObj.getDataObj()+": Completed";
    
    $rootScope.$on('EnvironmentIssuesGathered!', function () {
        $scope.updateListOfEnvironmentIssues();
    });
    
    $scope.updateListOfEnvironmentIssues = function (){
        $scope.dataPassed = dataSharingService.data.getValue();
    };
}]);

