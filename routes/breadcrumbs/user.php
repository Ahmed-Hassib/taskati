<?php


// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(trans('navbar.home'), route('home'));
});

// profile 
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('users.profile'), route('profile'));
});

// user 
Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('users.profile'), route('user.edit'));
});

// tasks list
Breadcrumbs::for('tasks', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('tasks.list'), route('tasks.index'));
});

// add new task
Breadcrumbs::for('add-task', function (BreadcrumbTrail $trail) {
    $trail->parent('tasks');
    $trail->push(trans('tasks.add new'), route('tasks.create'));
});

// edit task
Breadcrumbs::for('edit-task', function (BreadcrumbTrail $trail, $task) {
    $trail->parent('tasks');
    $trail->push($task->task_name, route('tasks.edit', $task));
});
