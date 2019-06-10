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
    <h1>Angular Demo</h1>
    <h2>
        Task list
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
    <script src="/js/angular.js"></script>

    <script src="/js/phone-list.component.js"></script>
</body>
</html>

