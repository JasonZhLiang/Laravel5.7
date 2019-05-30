<!DOCTYPE html>
<html lang="en" ng-app="phonecatApp">
<head>
    <meta charset="UTF-8">
    <title>Angular demo</title>
    <style>
        header {
            background: #e3e3e3;
            padding: 3em;
            text-align: center;
        }

        small {
            font-size: 0.8em;
            color: grey;
        }
    </style>
</head>
<body ng-controller="TodosController">
<div ng-controller="TodosController">

</div>
    <h1>Angular Demo</h1>
    <h2>
        Task list ddddd
<!--        see the two ways data-binding of Angular-->
        <small ng-if="remaining()">({{ remaining() }} remaining)</small>
    </h2>

    <input type="text" placeholder="Filter tasks" ng-model="searchValue">

    <ul>
        <li ng-repeat="todo in todos | filter:searchValue">
            <input type="checkbox" ng-model="todo.completed">
            {{ todo.body }}
        </li>
    </ul>

    <form ng-submit="addTask()">
        <input type="text" placeholder="Add new task" ng-model="newTaskText">
        <button type="submit">Add Task</button>
    </form>

    <button ng-click="addTask()">button Add Task</button>

    <!-- Use a custom component to render a list of phones -->
    <phone-list></phone-list>  <!-- This tells AngularJS to instantiate a `phoneList` component here. -->
    <!--    notice below cnd, doesn't work-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular.min.js"></script>-->

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <!--    notice below link, doesn't work-->
<!--    <script src="/public/js/angular.js"></script>-->
    <script type="text/javascript">
        //in order to get data from back_end, we need dependency inject http
        function TodosController($scope, $http){
            // $scope.todos = [
            //     {body: 'go to bank', completed: true},
            //     {body: 'finish video', completed: false},
            //     {body: 'learn Angular', completed: false},
            // ];

            console.log($http.get('/angular/todo'));
            $http.get('/angular/todo').success(function (todos) {
                console.log(todos);
                $scope.todos = todos;
            });


            $scope.remaining = function() {
                var count = 0;
                angular.forEach($scope.todos, function(todo) {
                    count += todo.completed ? 0 : 1;
                });

                return count;
            };

            $scope.addTask = function () {

                var todo = {
                    body: $scope.newTaskText,
                    completed: false
                };
                console.dir('dddd');
                $scope.todos.push(todo);

                $http.post('/angular/todo', todo)
            };
        }

        // Define the `phonecatApp` module
        angular.module('phonecatApp', [])
            .controller('TodosController', TodosController)
        ;

    </script>

    <script src="/js/phone-list.component.js"></script>
</body>
</html>

