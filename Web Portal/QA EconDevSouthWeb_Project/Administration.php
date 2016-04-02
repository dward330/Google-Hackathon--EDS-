<?php 
    require ("QA_Server_HelperFunctions.php");

    checkLogin();
?>

<!DOCTYPE HTML>

<html lang="en">
    <head>
        <title>EDS Administration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .menu-buttons{
                color: #000000;
                background-color: #FFE680;
                padding: 5px;
                margin-bottom: 10px;
                margin-left: 15px;
            }
            .menu-buttons:hover{
                background-color: #000000;
                color: white;
            }
            .environment-issues:hover{
                background-color: #8B4E9E;
                color: white;
            }
            .navigator{
                font-weight: bold;
            }
            #map-canvas{
                width: 300px;
                height: 300px; 
                margin: 0; 
                padding: 0;
                border: 2px solid black;
            }
            .MenuSection{
                background-color:#f7f4f4;
                width:100%; 
                border: 7px solid black;
            }
        </style>

    </head>

    <body style="padding-top:30px; background-color:#8BAD7A; " ng-app="loadIssues" ng-controller="loadIssuesCtrl">
        <div class="container-fluid" style="width:100%; position:relative;">
            <!-- For Mobile Screens and Tablets -->
            <div class="MenuSection hidden-md hidden-lg text-center" style="width:100%;">
                <div style="width:100%; margin-left: 0px; margin-top: 20px; margin-bottom: 0px; font-size: 20px;">
                    <strong><a href="#" style="color: black; text-decoration: underline;">Economic Development South</a></strong>
                </div>
                <div style="width:100%; margin-top: 0px;">
                    <br><br>
                    <a class="menu-buttons" style="margin-left: 0px;" href="http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/logout.php">Log Out</a>
                    <a class="menu-buttons" href="#" id="galleryLink" >Gallery</a>
                    <a class="menu-buttons" href="#" id="reportsLink" >Reports</a>
                    <br><br>
                </div>
            </div>
            <!-- For Desktop Screens -->
            <div class = "MenuSection hidden-xs hidden-sm" style="width:40%;">
                <div style="width:100%; margin-left: 15px; margin-top: 20px; margin-bottom: 0px; font-size: 25px;">
                    <strong><a href="#" style="color: black; text-decoration: underline;">Economic Development South</a></strong>
                </div>
                <div style="width:100%; margin-top: 0px;">
                    <br><br>
                    <a class="menu-buttons" href="http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/logout.php">Log Out</a>
                    <a class="menu-buttons" href="#" id="galleryLink_" >Gallery</a>
                    <a class="menu-buttons" href="#" id="reportsLink_" >Reports</a>
                    <br><br>
                </div>
            </div>
            <br><br>
            <div class="text-center" style="width:100%;">
                <div class="jumbotron" id="galleryTitle" style="background-color: #8B4E9E;" >
                    <h2 class="text-center" style="color:white;">Table of All Environmental Issues:</h2> 
                </div>
            </div>
            <div class="row col-md-12 table-responsive" id="gallery" style="overflow:auto;width:100%;padding:0px; margin:0px;">
                <table class="table " style="background-color:white; border: 5px solid; width:100%; padding:0px; margin:0px;">
                    <thead>
                        <tr>
                            <th ng-show="false">ID Number:</th>
                            <th>Type of Issue:</th>
                            <th>Photo:</th>
                            <th class="hidden-xs ">Description:</th>
                            <th class="hidden-xs hidden-sm">Latitude:</th>
                            <th class="hidden-xs hidden-sm">Longitude:</th>
                            <th class="hidden-xs hidden-sm hidden-md">Date:</th>
                            <th class="hidden-xs hidden-sm hidden-md">First Name:</th>
                            <th class="hidden-xs hidden-sm hidden-md">Last Name:</th>
                            <th class="hidden-xs hidden-sm hidden-md hidden-lg">Zip Code:</th>
                            <th class="hidden-xs hidden-sm hidden-md">Email:</th>
                            <th class="hidden-xs hidden-sm hidden-md">Phone Number:</th>
                            <th>Delete?</th>
                        </tr>
                    </thead>
                    <tr class="environment-issues" ng-click="loadIssueNavigator(issue.id)" id="{{issue.id}}" ng-repeat="issue in listOfIssues">
                      <td ng-show="false">
                        {{issue.id}}
                      </td>
                      <td>
                        <span ng-if="issue.issueType === ''" ng-then="IssueType">
                          {{"No-Content"}}
                        </span>
                        <span ng-else="IssueType">
                          {{issue.issueType}}
                        </span> 
                      </td>
                      <td>
                        <img height="100" width="100" class = "img-rounded" src="http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com{{ issue.Image_Filepath.substring(13)}}">
                      </td>
                      <td class="hidden-xs ">
                        <span ng-if="issue.description === ''" ng-then="Description">
                          {{"No-Content"}}
                        </span>
                        <span ng-else="Description">
                          {{issue.description}}
                        </span>
                      </td>
                      <td class="hidden-xs hidden-sm">
                        <span ng-if="issue.latitude === ''" ng-then="Latitude">
                          {{"No-Content"}}
                        </span>
                        <span ng-else="Latitude">
                          {{issue.latitude}}
                        </span>
                      </td>
                      <td class="hidden-xs hidden-sm">
                        <span ng-if="issue.longitude === ''" ng-then="Longitude">
                          {{"No-Content"}}
                        </span>
                        <span ng-else="Longitude">
                          {{issue.longitude}}
                        </span>
                      </td>                    
                      <td class="hidden-xs hidden-sm hidden-md">
                        <span ng-if="issue.date === ''" ng-then="Date">
                          {{"No-Content"}}
                        </span>
                        <span ng-else="Date">
                          {{ issue.date }}
                        </span>
                      </td>
                      <td class="hidden-xs hidden-sm hidden-md">
                        <span ng-if="issue.firstName === ''" ng-then="FirstName">
                          {{"No-Content"}}
                        </span>
                        <span ng-else="FirstName">
                          {{issue.firstName}}
                        </span>
                      </td>
                      <td class="hidden-xs hidden-sm hidden-md">
                        <span ng-if="issue.lastName === ''" ng-then="LastName">
                          {{"No-Content"}}
                        </span>
                        <span ng-else="LastName">
                          {{issue.lastName}}
                        </span>
                      </td>
                      <td class="hidden-xs hidden-sm hidden-md hidden-lg">
                        <span ng-if="issue.zipCode === ''" ng-then="ZipCode">
                          {{"No-Content"}}
                        </span>
                        <span ng-else="ZipCode">
                          {{ issue.zipCode }}
                        </span>
                      </td>
                      <td class="hidden-xs hidden-sm hidden-md">
                        <span ng-if="issue.email === ''" ng-then="Email">
                          {{"No-Content"}}
                        </span>
                        <span ng-else="Email">
                          {{ issue.email }}
                        </span>
                      </td>
                      <td class="hidden-xs hidden-sm hidden-md">
                        <span ng-if="issue.phoneNumber === ''" ng-then="PhoneNumber">
                          {{"No-Content"}}
                        </span>
                        <span ng-else="PhoneNumber">
                          {{ issue.phoneNumber }}
                        </span>
                      </td>
                      <td><button type="button" ng-click="delete(issue.id)" style=" background-color:#FF6666; color:black; border-radius: 25px;">Delete</button></td>
                    </tr>
                </table>
            </div>                   
            <!-- Modal -->
            <div id="modaltest" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal Content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><span class="navigator">Type of Issue:</span> {{navigator.issueType}}</h4><br>
                            <div style="width:100%;"><button style="float:left;" class=" btn btn-danger" style="margin-right:10px;margin-left:50px;" ng-click="delete(navigator.id)">Delete</button><button type="button" style="float:right;" class="btn btn-success" style="float:right;" data-dismiss="modal">Close</button></div><br>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <tbody class="text-left">
                                    <tr>
                                        <td>
                                            <image ng-click="issueNavigatorPrevious(navigator.id)" id = "nextLeftIssue" class="img-responsive" style="float:left; width:10%;" src="./Images/left_arrow.jpg">
                                            <image ng-click="issueNavigatorNext(navigator.id)" id = "nextRightIssue" class="img-responsive" style="float:right; width:10%;" src="./Images/right_arrow.jpg">
                                        </td>
                                    </tr>
                                    <tr><td><img style="height:auto; width:100%;" class = "img-rounded" src="http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com{{ navigator.Image_Filepath.substring(13)}}"></td></tr>
                                    <tr><td id="map-canvas"></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <table class="table table-bordered">
                                <tbody class="text-left">
                                    <tr><td><span class="navigator">Captured On:</span> {{navigator.date}}</td></tr>
                                    <tr><td><span class="navigator">Author:</span> {{navigator.firstName}} {{navigator.lastName}}</td></tr>
                                    <tr><td><span class="navigator">Email:</span> {{navigator.email}}</td></tr>
                                    <tr><td><span class="navigator">Phone Number:</span> {{navigator.phoneNumber}}</td></tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>                
        <div class="row" id="reports" style="width:100%;">        
            <div class ="row" style="width:100%;">
                <div class = "col-md-12 table-responsive" style="overflow:auto;width:100%;" ng-controller="issuesNavigatorCtrl">
                   <!--
                    <span>{{ testData }}</span><br><br>
                    <span>{{ dataPassed }}</span>
                   -->
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            //Hide Gallery Section
            $("#gallery").hide();
            $("#galleryTitle").hide();               

            //Hide ID Column
            //$(".hideID" ).hide();
            
            //For Mobile Devices
            $("#galleryLink").click(function(){
                //$("#gallery").show();
                $( "#gallery" ).fadeIn(1100, function() {
                    // Animation complete
                });
                $( "#galleryTitle" ).fadeIn(1100, function() {
                    // Animation complete
                });                          
                $("#reports").hide();
            });

            $("#reportsLink").click(function(){
                $("#gallery").hide();
                $("#galleryTitle").hide();
                $("#reports").fadeIn(1100);
            });
            
            
            //For Desktops
            $("#galleryLink_").click(function(){
                //$("#gallery").show();
                $( "#gallery" ).fadeIn(1100, function() {
                    // Animation complete
                });
                $( "#galleryTitle" ).fadeIn(1100, function() {
                    // Animation complete
                });                          
                $("#reports").hide();
            });

            $("#reportsLink_").click(function(){
                $("#gallery").hide();
                $("#galleryTitle").hide();
                $("#reports").fadeIn(1100);
            });
        });
    </script>

    <!-- Referenced Scripts-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBePBzJ1OVpStOuWkDNdTTgTeWTzjPUEDE"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="./JavaScript/RetrieveAndLoadEnvironmentIssues_AngularJS.js"></script>
    <script src="./JavaScript/IssueNavigator_AngularJS.js"></script>
    </body>
</html>