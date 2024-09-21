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

    $apiloc = 'keys/openaikey.txt';
    $openaikey = fopen($apiloc, "r") or die("Unable to open file!");
    $content = fread($openaikey, filesize($apiloc));
    fclose($openaikey);  // Fixed

    $apiKey = $GLOBALS['apiKey'];
    $url = 'https://api.openai.com/v1/chat/completions';

    $data = [
        'model' => 'gpt-4o-mini',
        'messages' => [
            ['role' => 'system', 'content' => 'You are a helpful assistant. You are tasked with three primary responsibilites: grading a students response, writing a story for the student, and assessing their overall perforamnce. You are a military bot. Realism is your standard. You are to respond as if you were at the level of an Infantry Captain, well-trained in administration and discipline. Students are required to work hard at the infantry school. Do the Infantry School proud in your storytelling, grading, and summarizing. '],
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
    curl_close($ch);
    
    $responseData = json_decode($response, true);
    $content = $responseData['choices'][0]['message']['content'];
    $cleanedContent = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');

    return $cleanedContent;
}