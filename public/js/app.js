'use strict';
var myApp = angular.module('myApp', ['ngRoute'])

    //change to your
    .constant('API_URL', 'http://rest-test.lok/api/v1/')

    .config(function($interpolateProvider) {
        $interpolateProvider.startSymbol('{/');
        $interpolateProvider.endSymbol('/}');
    });
    //.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
    //
    //    $routeProvider
    //        .when('/',
    //        {
    //            //templateUrl: 'views/list.html',
    //            controller: 'MainController'
    //        })
    //        .when('two-test',
    //        {
    //            templateUrl: 'views/add.html',
    //            controller: 'CreateController'
    //        })
    //        .when('/edit/:id',
    //        {
    //            templateUrl: 'views/edit.html',
    //            controller: 'EditController'
    //        })
    //        .otherwise({redirectTo: '/'});
    //    $locationProvider.html5Mode(true);
    //}
    //]);


myApp.controller('MainController', ['$scope', '$http', 'API_URL',  function($scope, $http, API_URL){

    $scope.title = "Cars List";

    $http.get(API_URL + "car")
        .success(function(response) {
            $scope.cars = response;
        });

    $scope.GetModel = function (make_id) {

        $scope.form_data.make = make_id;

        if(make_id)
        {
            $http.get(API_URL + "model/" + make_id)
                .success(function(response) {
                    $scope.form_data.ModelList =  response;
                });
        }
    };
    //show modal form
    $scope.toggle = function(modalstate, id) {

        $scope.modalstate = modalstate;
        $scope.form_data = {};

        $http.get(API_URL + 'make/')
            .success(function (response) {
                return  $scope.form_data.MakeList = response;
            });

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Car";
                $scope.form_data = {};

                break;
            case 'edit':

                $scope.form_title = "Car Edit";
                $scope.id = id;

                $http.get(API_URL + 'car/' + id)
                    .success(function (response) {
                        $scope.form_data = response;

                        $http.get(API_URL + "model/" + response.make_id)
                            .success(function (response2) {
                                $scope.form_data.ModelList = response2;
                            });
                    });
                break;
            default:
                break;
        }
        $('#myModal').modal('show');
    };


    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "car";
        var form_data = {};

        if (modalstate === 'edit') {
            url += "/" + id;

            form_data = {
                make_id: $scope.form_data.make.id,
                model_id: $scope.form_data.model.id,
                price: $scope.form_data.price
            };

        } else {
            form_data = {
                make_id: $scope.form_data.make,
                model_id: $scope.form_data.model,
                price: $scope.form_data.price
            };
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param(form_data),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    };


    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'car/' + id
            }).
                success(function(data) {
                   // console.log(data);
                    location.reload();
                }).
                error(function(data) {
                   // console.log(data);
                    alert('Unable to delete');
                });
        } else {
            return false;
        }
    }

}]);


