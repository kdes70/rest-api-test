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
            <h1>Test 2</h1>

            <br/>
            <div class="col-md-12">
                <p>
                    Suppose you have an array of integers, both positive and negative, in no particular order.  Find the largest possible sum of any continuous subarray.  For example, if you have all positive numbers, the largest sum would be the sum of the whole array; if you have all negative numbers, the largest sum is 0 (the null subarray)
                </p>
                <script src="http://ideone.com/e.js/0cOA1c" type="text/javascript" ></script>
            </div>
            <div class="col-md-12">
                <p>Write a listbox-style binary search for an ordered array of integers.  Listbox-style means that you should return the index of the first item greater than or equal to the item being searched for; if all items are less, you should return the index of the last item.  You are guaranteed that there is at least one item in the array.</p>
            </div>

            <script src="http://ideone.com/e.js/Mu6evk" type="text/javascript" ></script>
        </div>
    </div>

    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</body>
</html>
