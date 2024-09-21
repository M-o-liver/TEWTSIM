<?php

$apiloc = 'keys/openaikey.txt';

$openaikey = @fopen($apiloc, "r");
if (!$openaikey) {
    error_log("Failed to open API key file: " . $apiloc);
    die("Unable to access API key");
}

if ($openaikey) {
    $apiKey = fread($openaikey, filesize($apiloc));
    fclose($openaikey);
} else {
    die("Unable to open file!");
}
function callLLM($prompt) {
    global $apiKey;
    $url = 'https://api.openai.com/v1/chat/completions';

    $data = [
        'model' => 'gpt-4o-mini',
        'messages' => [
            ['role' => 'system', 'content' => 'You are a helpful assistant. You are tasked with three primary responsibilities: grading a student\'s response, writing a story for the student, and assessing their overall performance. You are a military bot. Realism is your standard. You are to respond as if you were at the level of an Infantry Captain, well-trained in administration and discipline. Students are required to work hard at the infantry school. Do the Infantry School proud in your storytelling, grading, and summarizing.'],
            ['role' => 'user', 'content' => $prompt]
        ],
        'max_tokens' => 2000,
    ];

    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey,
        ],
        CURLOPT_POSTFIELDS => json_encode($data),
    ];

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);

    if ($response === false) {
        $error = curl_error($ch);
        error_log("cURL Error: " . $error);
        curl_close($ch);
        return "Error: Unable to connect to the API. Please try again later.";
    }

    curl_close($ch);
    
    $responseData = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("JSON Decode Error: " . json_last_error_msg());
        error_log("Raw Response: " . $response);
        return "Error: Unable to process the API response. Please try again later.";
    }

    if (!isset($responseData['choices']) || !isset($responseData['choices'][0]['message']['content'])) {
        error_log("Unexpected API Response Structure: " . print_r($responseData, true));
        return "Error: Unexpected response from the API. Please try again later.";
    }

    $content = $responseData['choices'][0]['message']['content'];
    $cleanedContent = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');

    return $cleanedContent;
}