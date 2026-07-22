<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("ai/gemini.php");


$resumeText = "
Name: Rahul Patil

Education:
Computer Engineering Student

Skills:
PHP
HTML
CSS
JavaScript
MySQL

Projects:
AI Resume Analyzer using PHP and Gemini API
";


$result = analyzeResumeAI($resumeText);


echo "<pre>";
print_r($result);
echo "</pre>";

?>