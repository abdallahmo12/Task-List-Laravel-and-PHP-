<?php

use Illuminate\Support\Facades\Route;

class Task {
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $longDescription,
        public bool $completed,
        public string $createdAt,
        public string $updatedAt,
    ) {
    }
}

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
    null,
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
Route::get('/', function () use ($tasks) {
    return view('first' , [
        'tasks' => $tasks,
    ]);
});

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

Route::get('/learn-params/{id}', function ($id) {
    return view('itemDetails', ['id' => $id]);
});
// handle route not found
Route::fallback(function () {
    return "No Such a Route";
});