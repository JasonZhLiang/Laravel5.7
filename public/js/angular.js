// function TodosController($scope){
//     $scope.todos = [
//         {body: 'go to bank', completed: true},
//         {body: 'finish video', completed: false},
//         {body: 'learn Angular', completed: false},
//     ];
//
//     $scope.remaining = function() {
//         var count = 0;
//         angular.forEach($scope.todos, function(todo) {
//             count += todo.completed ? 0 : 1;
//         });
//
//         return count;
//     };
//
//     $scope.addTask = function () {
//         $scope.todos.push({
//             body: $scope.newTaskText,
//             completed: false
//         })
//     }
// }


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

        $scope.todos.push(todo);

        $http.post('/angular/todo', todo)
    };
}

// Define the `phonecatApp` module
angular.module('phonecatApp', [])
    .controller('TodosController', TodosController)
;