<!DOCTYPE html>

<html lang="en" ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script type="text/javascript" src="/libs/bower_components/angular/angular.min.js"></script>
    <script src="/libs/bower_components/angular-route/angular-route.min.js"></script>
    <script src="/libs/bower_components/angular-resource/angular-resource.min.js"></script>


    <script src="/js/app.js"></script>


    <script type="text/javascript">
        angular.element(document.getElementsByTagName('head')).append(angular.element('<base href="' + window.location.pathname + '" />'));
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<p><br/></p>
<div class="container" ng-controller="MainController">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="/">Test 1</a></li>
        <li><a href="/two-test" >Test 2</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="daftar">
            <h1>{/title/}</h1>

            <br/>
            <p>
                <button ng-click="toggle('add', 0)" id="btn-add" class="btn btn-default">Add New Car</button>
            </p>
            <br/>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Prise</th>
                        <th>func</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="item in cars">
                        <th scope="row">{/item.id/}</th>
                        <td>{/item.make/}</td>
                        <td>{/item.model/}</td>
                        <td>{/item.price|currency/}</td>
                        <td>
                            <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', item.id)"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(item.id)"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--<ul class="pagination">
                <li class="disabled"><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>-->
        </div>
    </div>



    <!-- Modal (Pop up when detail button clicked) -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">?</span></button>-->
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">{/form_title/}</h4>
                </div>
                <div class="modal-body">
                    <form name="frmEmployees" class="form-horizontal" novalidate="" >
                        <div class="form-group">
                            <label for="make" class="col-sm-3 control-label">Make</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="form_data.make" id="make" name="make"
                                        ng-required="true"
                                        ng-change="GetModel(form_data.make)"
                                        ng-options="item.id as item.name for item in form_data.MakeList track by item.id">
                                    <option value=''>-Select-</option>
                                </select>
                                    <span class="help-inline" ng-show="frmEmployees.make.$invalid && frmEmployees.make.$touched">Make field is required</span>
                            </div>
                        </div>
                        <div class="form-group error">
                            <!-- TODO fix select list for model-->
                            <label for="modeles" class="col-sm-3 control-label">Model</label>
                            <div class="col-sm-9">

                                <select class="form-control" ng-model="form_data.model" id="model" name="model"
                                        ng-required="true"
                                        ng-disabled="!form_data.make"
                                        ng-options="item.id as item.name for item in form_data.ModelList track by item.id">

                                    <option value=''>-Select-</option>
                                </select>
                                <span class="help-inline" ng-show="frmEmployees.model.$invalid && frmEmployees.model.$touched">Model field is required</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{/price/}"
                                       ng-model="form_data.price" ng-required="true">

                                    <span class="help-inline"
                                          ng-show="frmEmployees.price.$invalid && frmEmployees.price.$touched">Price number field is required</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Save changes</button>
                </div>
            </div>
        </div>
    </div>




</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</body>
</html>
