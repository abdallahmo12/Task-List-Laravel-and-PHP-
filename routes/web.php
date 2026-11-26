<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
// simulate Database
class Task {
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $createdAt,
        public string $updatedAt,
    ) {
    }
}
// array of Data
$tasks = [new Task(
    1,
    "Learn PHP",
    "Learn PHP Foundations and Basics",
    null,
    false,
    '02/11/2026 10:00:00',
    '02/11/2026 10:00:00'
),new Task(
    2,
    "Learn Laravel",
    "Learn Laravel Foundations and Basics",
    "Laravel is the best framework for fullstack developers",
    false,
    '15/11/2026 10:00:00',
    '15/11/2026 10:00:00'
),new Task(
    1,
    "Learn SQL",
    "Learn SQL Foundations and Basics",
    null,
    false,
    '22/11/2026 10:00:00',
    '22/11/2026 10:00:00'
)];
// Routes
Route::get('/', function () {
    return redirect()->route('tasks.list');
});
Route::get('/tasks', function () use ($tasks) {
    return view('tasksList' , [
        'tasks' => $tasks,
    ]);
})->name('tasks.list');

Route::get('/task/{id}' , function ($id) use ($tasks) {
    // $task = collect($tasks)->first(function ($task) use ($id) {
    //     return $task->id == $id;
    // });
    $task = collect($tasks)->firstWhere('id' , $id);
    if(!$task){
        abort(Response::HTTP_NOT_FOUND);
    }
    return view('taskDetails' , ['task' => $task]);
})->name('tasks.show');

Route::get('/learn', function () {
    return "Learn PHP and Laravel";
})->name("learning");

Route::get("/apply", function () {
    return "Apply Practical on PHP";
});

Route::get('/still-learn' , function () {
    // redirect by route name
    return redirect()->route('learning');
});

// handle routes with params
Route::get('/getTaskDetails/{itemId}' , function ($id) {
    return "Task Details and it's Id is ". $id;
});

Route::get('/learn-params/{itemId}' , function ($id) {
    return view('itemDetails' , ['id' => $id]);
});

// handle route not found
Route::fallback(function () {
    return "No Such a Route";
});