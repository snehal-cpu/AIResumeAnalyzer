<?php

require_once "config/groq_config.php";

function analyzeResumeWithGroq($resumeText, $jobRole)
{
    $url = "https://api.groq.com/openai/v1/chat/completions";

    // Clean resume text
    $resumeText = mb_convert_encoding($resumeText, "UTF-8", "UTF-8");
    $resumeText = preg_replace('/[^\P{C}\n\r\t]/u', '', $resumeText);
    $resumeText = str_replace("�", "", $resumeText);

    // Limit length
    if (strlen($resumeText) > 8000) {
        $resumeText = substr($resumeText, 0, 8000);
    }

    $prompt = "You are an expert ATS Resume Analyzer.

Analyze ONLY the resume below.

Target Job Role:
$jobRole

Resume:
$resumeText

Return ONLY valid JSON in this format:

{
\"ats_score\":0,
\"summary\":\"\",
\"skills_found\":[],
\"missing_skills\":[],
\"strengths\":[],
\"weaknesses\":[],
\"grammar_suggestions\":[],
\"formatting_suggestions\":[],
\"recommendation\":\"\"
}";

    $data = [
        "model" => "llama-3.3-70b-versatile",
        "messages" => [
            [
                "role" => "system",
                "content" => "You are a professional ATS Resume Analyzer."
            ],
            [
                "role" => "user",
                "content" => $prompt
            ]
        ],
        "temperature" => 0.2
    ];

    $jsonData = json_encode(
        $data,
        JSON_UNESCAPED_UNICODE |
        JSON_UNESCAPED_SLASHES |
        JSON_INVALID_UTF8_SUBSTITUTE
    );

    if ($jsonData === false) {
        return [
            "success" => false,
            "message" => "JSON Encode Error: " . json_last_error_msg()
        ];
    }

    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer " . GROQ_API_KEY,
            "Content-Type: application/json"
        ],
        CURLOPT_POSTFIELDS => $jsonData
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return [
            "success" => false,
            "message" => curl_error($ch)
        ];
    }

    curl_close($ch);

    $responseData = json_decode($response, true);

    if (isset($responseData["error"])) {
        return [
            "success" => false,
            "message" => $responseData["error"]["message"]
        ];
    }

    $content = $responseData["choices"][0]["message"]["content"] ?? "";

    $content = str_replace("```json", "", $content);
    $content = str_replace("```", "", $content);
    $content = trim($content);

    $analysis = json_decode($content, true);

    if (!$analysis) {
        return [
            "success" => false,
            "message" => "Groq returned invalid JSON",
            "raw" => $content
        ];
    }

    return [
        "success" => true,
        "analysis" => $analysis
    ];
}