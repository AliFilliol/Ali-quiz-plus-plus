<?php

function getQuestions () {
    //Prepare connection parameters
    $dbHOST = getenv('DB_HOST');
    $dbName = getenv('DB_NAME');
    $dbUser = getenv('DB_USER');
    $dbPassword = getenv('DB_PASSWORD');

    //Connect to MySQL database using PHP PDO Object.
    $dbConnection = new PDO("mysql:host=$dbHOST;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);

    // Tell PDO to throw Exceptions for every error.
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get all questions and answers - together
    $query = $dbConnection->query("SELECT ID, Text, Type FROM Questions");
    $questions = $query->fetchAll(PDO::FETCH_ASSOC);

    for ($q = 0; $q < count($questions); $q++) {
        $question = $questions[$q];
        $subQuery = $dbConnection->prepare("SELECT * from Answers where Answers.questionID = ?");
        $subQuery->bindValue(1, $question['ID']);
        $subQuery->execute();
        $answers = $subQuery->fetchAll(PDO::FETCH_ASSOC);

        $questions[$q]['answers'] = $answers;
    }

    return $questions;
}