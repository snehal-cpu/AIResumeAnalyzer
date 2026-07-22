<?php

require_once(__DIR__ . "/../config/api.php");


function analyzeResumeAI($resumeText)
{

    $apiKey = GEMINI_API_KEY;


    // Use your available Gemini model here
   $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . GEMINI_API_KEY;
    $prompt = "You are an ATS Resume Analyzer.

Analyze this resume.

IMPORTANT:
Return ONLY JSON.
Do not use markdown.
Do not add explanations.

JSON format:

{
  \"ats_score\": 85,
  \"strengths\": [
    \"skill 1\",
    \"skill 2\"
  ],
  \"weaknesses\": [
    \"weakness 1\"
  ],
  \"missing_skills\": [
    \"skill missing\"
  ],
  \"suggestions\": [
    \"suggestion 1\"
  ]
}


Resume text:

" . $resumeText;



    $data = [

        "contents" => [

            [

                "parts" => [

                    [

                        "text" => $prompt

                    ]

                ]

            ]

        ],

        "generationConfig" => [

            "temperature" => 0,

            "responseMimeType" => "application/json"

        ]

    ];



    $ch = curl_init($url);


    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, [

        "Content-Type: application/json"

    ]);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));



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