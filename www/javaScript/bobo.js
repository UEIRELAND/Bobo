var app = angular.module('myApp', []);
//function called getDrivers1 it gets info about the drivers back and displays for me when I click the button search it has a link to the connectDB php file
app.controller('customersCtrl', function($scope, $http) {

$scope.image = "http://i.stack.imgur.com/TTLlA.png";
		   
$http.get("../includes/fetchDB.php")
.success(function (response) {$scope.drivers = response;}); //the record is gone!!
});
