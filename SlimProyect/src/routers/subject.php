<?php

//use Proyect\src\controllers\ScheduleController;
//use Proyect\src\controllers\SubjectController;
//
///**
// * Get all subjects
// */
//$app->get('/subjects', function ($request, $answer, $args) {
//    $result = SubjectController::test();
//    return $answer->withStatus(200)
//        ->withHeader('Content-Type', 'application/json')
//        ->write($result); //La que me traia los JSON
//});
//
///**
// * Get subjects by id
// */
//$app->get('/subjects/{id}', function ($request, $answer, $args) {
//    $answer->write("Hello, " . $args['name']);
//    return $answer;
//});
//
///**
// * Delete a subject
// */
//$app->delete('/subjects/{id}', function ($request, $answer, $args) {
//    $answer->write("Hello, " . $args['name']);
//    return $answer;
//});