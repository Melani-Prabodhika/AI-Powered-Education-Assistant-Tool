<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Api_calls {
    
    private $ci;
    private $api_key;
    private $api_url = 'https://api.openai.com/v1/chat/completions';
    private $model = 'gpt-4o';
    
    public function __construct() {
        $this->ci =& get_instance();
        $this->ci->load->config('openai');
        $this->api_key = $this->ci->config->item('openai_api_key');
    }
    
    /**
     * Generate a lesson plan using OpenAI API
     * 
     * @param string $subject The subject for the lesson
     * @param string $gradeLevel The grade level
     * @param string $topic The topic or unit
     * @param string $duration Duration of the lesson
     * @param string $objectives Learning objectives
     * @param string $fileContent Optional content from uploaded files
     * @return array The API response
     */
    public function generateLessonPlan($subject, $gradeLevel, $topic, $duration, $objectives, $fileContent = '') {

        $systemMessage = "You are an expert educational content creator specializing in K-12 curriculum development. " .
                        "Create detailed, engaging, and pedagogically sound lesson plans that follow educational best practices " .
                        "and align with standard curricula. Format your response as a structured lesson plan.";
        
        $userMessage = "Create a detailed lesson plan for the following specifications:\n" .
                      "Subject: $subject\n" .
                      "Grade Level: $gradeLevel\n" .
                      "Topic: $topic\n" .
                      "Duration: $duration\n" .
                      "Learning Objectives: $objectives\n";
        
        if (!empty($fileContent)) {
            $userMessage .= "\nUse the following reference material to inform your lesson plan:\n$fileContent";
        }
        
        $data = [
            'model' => $this->model,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $systemMessage
                ],
                [
                    'role' => 'user',
                    'content' => $userMessage
                ]
            ],
            'temperature' => 0.7,
            'max_tokens' => 2000
        ];
        
        return $this->makeRequest($data);
    }
    
    /**
     * Generate an assignment using OpenAI API
     * 
     * @param string $subject The subject for the assignment
     * @param string $gradeLevel The grade level
     * @param string $topic The topic
     * @param string $difficulty Difficulty level (basic, intermediate, advanced)
     * @param string $type Assignment type (worksheet, quiz, project)
     * @param string $lessonPlanContent Optional related lesson plan content
     * @return array The API response
     */
    public function generateAssignment($subject, $gradeLevel, $topic, $difficulty, $type, $lessonPlanContent = '') {
       
        $systemMessage = "You are an expert educational content creator specializing in creating engaging student assignments. " .
                         "Create age-appropriate, challenging, and educational assignments that help students master key concepts.";
        
        $userMessage = "Create a detailed $type assignment for the following specifications:\n" .
                       "Subject: $subject\n" .
                       "Grade Level: $gradeLevel\n" .
                       "Topic: $topic\n" .
                       "Difficulty Level: $difficulty\n" .
                       "Include an answer key and grading rubric.\n";
        
        if (!empty($lessonPlanContent)) {
            $userMessage .= "\nThis assignment should align with the following lesson plan:\n$lessonPlanContent";
        }
        
        $data = [
            'model' => $this->model,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $systemMessage
                ],
                [
                    'role' => 'user',
                    'content' => $userMessage
                ]
            ],
            'temperature' => 0.7,
            'max_tokens' => 2000
        ];
        
        return $this->makeRequest($data);
    }
    
    /**
     * Make a request to the OpenAI API
     * 
     * @param array $data The data to send
     * @return array The API response
     */
    private function makeRequest($data) {
        $ch = curl_init($this->api_url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->api_key
        ]);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            return [
                'success' => false,
                'error' => 'Curl error: ' . $error
            ];
        }
        
        curl_close($ch);
        
        $responseData = json_decode($response, true);
        
        if ($httpCode != 200) {
            return [
                'success' => false,
                'error' => 'API error: ' . ($responseData['error']['message'] ?? 'Unknown error'),
                'status_code' => $httpCode
            ];
        }
        
        $content = $responseData['choices'][0]['message']['content'] ?? '';
        
        return [
            'success' => true,
            'content' => $content,
            'usage' => $responseData['usage'] ?? [],
            'raw_response' => $responseData
        ];
    }
}