<?php

require_once "vendor/autoload.php";

use Smalot\PdfParser\Parser;

function extractResumeText($filePath)
{
    $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

    if ($extension == "pdf") {

        try {
            $parser = new Parser();
            $pdf = $parser->parseFile($filePath);

        $text = $pdf->getText();

// Convert to valid UTF-8
$text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');

// Remove invalid characters
$text = preg_replace('/[^\P{C}\n\r\t]/u', '', $text);

// Remove replacement characters
$text = str_replace("�", "", $text);

return trim($text);

        } catch (Exception $e) {
            return false;
        }

    }

    return false;
}