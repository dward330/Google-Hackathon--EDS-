<?php 

    require ("Prod_Server_HelperFunctions.php");

    

    checkLogin();

?>

<!DOCTYPE HTML>

<html lang="en">

    <head>

        <title>

        EDS Administration

        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

        <style>

            .menu-buttons{

                color: #000000;

                padding: 5px;

                background-color: #FFE680;

                margin: 10px;

            }

            .menu-buttons:hover{

                background-color: #000000;

                color: white;

            }

            .environment-issues:hover{

                background-color: #8B4E9E;

                color: white;

            }

            .issue_navigator{

                position: absolute;

                z-index: 1;

                left: 20%;

                top: 30%;

            }

        </style>

    </head>

    <body style="padding-top:30px; background-color:#8BAD7A; ">

        <div class="container-fluid" style="width:100%; position:relative;">

            <!--<div class = "issue_navigator text-center" style="width:300px; height:300px; border: solid 2px;"></div>-->

                <!-- navbar-fixed-top -->

                <nav class="navbar navbar-inverse " style="background-color:#FFE680; width:40%; border: 7px solid;" >

                    <div class="navbar-header" >

                        <a class="navbar-brand"href="#" style="color: black;">Economic Development South</a>

                    </div>

                    <div>

                        <!-- nav navbar-nav text-center -->

                        <br><br><br>

                        <!--<ul class="" >-->

                                <a class="menu-buttons" href="http://edsapplb-1862368837.us-west-2.elb.amazonaws.com/logout.php">Log Out</a>

                                <a class="menu-buttons" href="#" id="galleryLink" >Gallery</a>

                                <a class="menu-buttons" href="#" id="reportsLink" >Reports</a>

                                <br><br>

                        <!-- </ul>-->

                    </div>

                </nav>

            <br><br>

            <div class="text-center" style="width:100%;">

                <div class="jumbotron" id="galleryTitle" style="background-color: #8B4E9E;" >

                    <h2 class="text-center" style="color:white;">Table of All Environmental Issues:</h2> 

                </div>

            </div>

            <div class="row col-md-12 table-responsive" id="gallery" style="overflow:auto;width:100%;padding:0px; margin:0px;" ng-app="loadIssues" ng-controller="loadIssuesCtrl">

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

                    <tr class="environment-issues" id="{{issue.id}}" ng-repeat="issue in listOfIssues">

                      <td ng-show="false">

                        {{issue.id}}      

                      </td>

                      <td>

                          <span ng-if="issue.issueType === ''" ng-then="IssueType">

                            {{"No-Content"}}

                          </span>

                          <span ng-else="IssueType">

                            {{ issue.issueType }}

                          </span> 

                      </td>

                      <td>

                          <img height="100" width="100" class = "img-rounded" src="http://edsapplb-1862368837.us-west-2.elb.amazonaws.com/{{ issue.Image_Filepath.substring(13)}}"

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

                            {{ issue.latitude }}

                          </span>

                      </td>

                      <td class="hidden-xs hidden-sm">

                          <span ng-if="issue.longitude === ''" ng-then="Longitude">

                            {{"No-Content"}}

                          </span>

                          <span ng-else="Longitude">

                            {{ issue.longitude }}

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

        <div class="row" id="reports" style="width:100%;">

            <div class ="row" style="width:100%;">

                <div class = "col-md-12 table-responsive" style="overflow:auto;width:100%;">

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

        });

    </script>

    <!-- Referenced Scripts-->

    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

    <script src="./JavaScript/RetrieveAndLoadEnvironmentIssues_AngularJS.js"></script>

    </body>

</html>