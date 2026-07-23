<?php

require_once(__DIR__ . "/config/api.php");


function analyzeResumeAI($resumeText, $jobRole = "General")
{

    $apiKey = GEMINI_API_KEY;


    // Use your available Gemini model here
   $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent?key=" . GEMINI_API_KEY;
    $prompt = "You are an ATS Resume Analyzer.

Analyze this resume against the target job role: " . $jobRole . ".

Analyze this resume.

IMPORTANT:
Return ONLY JSON.
Do not use markdown.
Do not add explanations.

JSON format:

{
  \"ats_score\": 85,
  \"detected_skills\": [
    \"skill 1\",
    \"skill 2\"
  ],
  \"matching_skills\": [
    \"skill 1\"
  ],
  \"missing_skills\": [
    \"skill missing\"
  ],
  \"keywords\": [
    \"keyword 1\",
    \"keyword 2\"
  ],
  \"suggestions\": [
    \"suggestion 1\"
  ]
}


Resume text:

" . $resumeText;



    // Ensure the text is valid UTF-8, otherwise json_encode will fail
    $safePrompt = mb_convert_encoding($prompt, 'UTF-8', 'UTF-8');
    
    $data = [
        "contents" => [
            [
                "parts" => [
                    [
                        "text" => $safePrompt
                    ]
                ]
            ]
        ],
        "generationConfig" => [
            "temperature" => 0,
            "responseMimeType" => "application/json"
        ]
    ];

    $jsonData = json_encode($data);
    if ($jsonData === false) {
        return [
            "error" => "Failed to encode data for AI: " . json_last_error_msg()
        ];
    }

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpCode != 200) {
    return [
        "http_code" => $httpCode,
        "response" => json_decode($response, true)
    ];
}



    if(curl_errno($ch))
    {
        return [
            "error"=>curl_error($ch)
        ];
    }


    curl_close($ch);



    $result = json_decode($response,true);



    if(isset($result["error"]))
    {
        return [
            "error"=>$result["error"]["message"]
        ];
    }



    $text = $result["candidates"][0]["content"]["parts"][0]["text"];



    // Clean Gemini response

    $text = trim($text);

    $text = str_replace("```json","",$text);

    $text = str_replace("```","",$text);



    $analysis = json_decode(trim($text),true);



    if(json_last_error() !== JSON_ERROR_NONE)
    {
        return [

            "error"=>"Gemini returned invalid JSON",

            "raw"=>$text

        ];
    }



    return $analysis;

}

?>