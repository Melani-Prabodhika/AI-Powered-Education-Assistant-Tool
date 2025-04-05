<?php defined('BASEPATH') or exit('No direct script access allowed');

class Api_calls_m extends CI_Model {

   public function generateLessonPlan($subject, $gradeLevel, $topic, $duration, $objectives, $fileContent = '') {
      $systemMessage = "# System Instruction for Lesson Plan Generator\n\n" .
      "You are a specialized educational content assistant that generates comprehensive lesson plans based on teacher inputs. " .
      "Analyze the subject, grade level, competency, number of periods, content description, and learning outcomes to create structured, pedagogically sound lesson plans in a specific JSON format.\n\n" .
      "## Input Processing:\n" .
      "- Parse all provided teaching parameters (subject, grade, competency, periods, content, outcomes)\n" .
      "- Determine completeness of input to select appropriate generation approach\n" .
      "- For incomplete inputs, use educational best practices to fill gaps intelligently\n\n" .
      "## Output Requirements:\n" .
      "Always return a properly formatted JSON object with the following exact structure:\n" .
      "```json\n" .
      "{\n" .
      "  \"lessonPlan\": {\n" .
      "    \"metadata\": {\n" .
      "      \"subject\": \"[Subject name]\",\n" .
      "      \"grade\": \"[Grade level]\",\n" .
      "      \"competency\": \"[Main competency]\",\n" .
      "      \"periods\": [Total number of periods as integer]\n" .
      "    },\n" .
      "    \"content\": {\n" .
      "      \"sections\": [\n" .
      "        {\n" .
      "          \"title\": \"[Section 1 title]\",\n" .
      "          \"topics\": [\"[Topic 1]\", \"[Topic 2]\", \"[Topic 3]\"],\n" .
      "          \"timeAllocation\": \"[Number of periods for this section]\"\n" .
      "        },\n" .
      "        {\n" .
      "          \"title\": \"[Section 2 title]\",\n" .
      "          \"topics\": [\"[Topic 1]\", \"[Topic 2]\", \"[Topic 3]\"],\n" .
      "          \"timeAllocation\": \"[Number of periods for this section]\"\n" .
      "        }\n" .
      "        // Include additional sections as appropriate\n" .
      "      ]\n" .
      "    },\n" .
      "    \"learningOutcomes\": [\n" .
      "      \"[Outcome 1]\",\n" .
      "      \"[Outcome 2]\",\n" .
      "      \"[Outcome 3]\"\n" .
      "    ]\n" .
      "  }\n" .
      "}\n" .
      "```\n\n" .
      "## Section Generation Rules:\n" .
      "- Distribute total periods proportionally across logical sections\n" .
      "- Create section titles that clearly indicate progression of learning\n" .
      "- For each section, include 3-4 specific, relevant topics\n" .
      "- Ensure sum of all section timeAllocations equals total periods\n" .
      "- Structure sections to follow sound pedagogical sequence (introduction → core concepts → application → assessment)\n\n" .
      "## Educational Alignment:\n" .
      "- Align content with age-appropriate teaching methods for specified grade level\n" .
      "- Ensure topics and outcomes match the specified competency\n" .
      "- Use proper educational terminology in section titles and topics\n" .
      "- Include a mix of knowledge acquisition, skill development, and assessment elements\n" .
      "- Apply appropriate cognitive complexity based on grade level (using Bloom's taxonomy)\n\n" .
      "## Technical Requirements:\n" .
      "- Always format response as valid JSON\n" .
      "- Use proper nesting and key names exactly as specified\n" .
      "- Include quotation marks for all string values\n" .
      "- Use array notation for topics and outcomes\n" .
      "- Express timeAllocation values as strings, not numbers\n\n" .
      "Do not include explanations, preambles, or commentary outside the JSON structure. Focus exclusively on generating a high-quality lesson plan within the specified format.";


     $userMessage = "Create a detailed lesson plan for the following specifications:\n" .
                 "Subject: $subject\n" .
                 "Grade Level: $gradeLevel\n" .
                 "Topic: $topic\n" .
                 "Total Periods: $duration\n" .
                 "Learning Objectives: $objectives\n";

     if (!empty($fileContent)) {
        $userMessage .= "\nUse the following reference material to inform your lesson plan:\n$fileContent";
     }

     $data = [
        "contents" => [
           [
              "parts" => [
                 [
                    "text" => $systemMessage . "\n" . $userMessage
                 ]
              ]
           ]
        ]
     ];

     $jsonData = json_encode($data);

     $apiKey = 'AIzaSyCu0osKRms7bEhE-g9MnRRa4Wdz5ab4Yhk';
     $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey";

     $ch = curl_init($url);

     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
     ]);
     curl_setopt($ch, CURLOPT_POST, true);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

     $response = curl_exec($ch);

     if(curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return "cURL Error: $error_msg";
     }

     curl_close($ch);

     $responseData = json_decode($response, true);

     return $responseData['contents'][0]['parts'][0]['text'] ?? 'Error: No content generated';
  }

  public function generateAssignment($subject, $gradeLevel, $topic, $type, $lvl, $objectives, $fileContent = '') {
      $systemMessage = "# System Instruction for Assignment Generator

   You are a specialized educational assessment assistant that generates comprehensive assignments based on teacher inputs. Analyze the subject, grade level, competency level, assignment type, content description, learning outcomes, and difficulty level to create structured, pedagogically sound assignments in a specific format.

   ## Input Processing:
   - Parse all provided teaching parameters (subject, grade, competency level, assignment type, content, learning outcomes, difficulty level)
   - Determine the appropriate question types and distribution based on assignment type selection
   - For incomplete inputs, use educational best practices to fill gaps intelligently
   - Cap total questions at 15 maximum regardless of assignment type

   ## Section Generation Rules:
   - For MCQ type: Generate multiple choice questions with 4 options each
   - For Essay type: Generate essay questions with appropriate word limits
   - For Structured type: Generate questions with multiple parts that build on the main concept
   - For All type: Include a balanced mix of MCQ, True/False, Short Answer, and Essay questions
   - Adjust question complexity and marks according to the difficulty level selected

   ## Question Distribution for 'All' Type:
   - MCQ: Approximately 30-35% of total questions
   - True/False: Approximately 10-15% of total questions
   - Short Answer: Approximately 20-25% of total questions
   - Essay: Approximately 10-15% of total questions
   - Structured: Approximately 15-20% of total questions

   ## Marks Allocation:
   - Basic difficulty: 1 mark per question for basic types
   - Intermediate difficulty: 2 marks per question for basic types
   - Advanced difficulty: 3 marks per question for basic types
   - Essay and structured questions receive proportionally more marks

   ## Educational Alignment:
   - Align questions with age-appropriate assessment methods for specified grade level
   - Ensure questions match the specified competency level
   - Use proper educational terminology in questions
   - Include questions that assess various cognitive levels (using Bloom's taxonomy)
   - For MCQs, ensure distractors are plausible and educational

   ## Technical Requirements:
   - Format response as valid HTML with appropriate classes
   - Ensure all sections and questions are properly numbered
   - Include appropriate formatting for different question types
   - Maintain consistent presentation and organization throughout

   Do not include explanations, preambles, or commentary outside the HTML structure. Focus exclusively on generating a high-quality assignment within the specified format.";

   $userMessage = "Create a detailed lesson plan for the following specifications:\n" .
               "Subject: $subject\n" .
               "Grade Level: $gradeLevel\n" .
               "Topic: $topic\n" .
               "Assignment Type: $type\n" .
               "Difficulty Level: $lvl\n" .
               "Learning Objectives: $objectives\n";

      if (!empty($fileContent)) {
         $userMessage .= "\nUse the following reference material to inform your lesson plan:\n$fileContent";
      }

      $data = [
         "contents" => [
            [
               "parts" => [
                  [
                     "text" => $systemMessage . "\n" . $userMessage
                  ]
               ]
            ]
         ]
      ];

      $jsonData = json_encode($data);

      $apiKey = 'AIzaSyCu0osKRms7bEhE-g9MnRRa4Wdz5ab4Yhk';
      $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey";

      $ch = curl_init($url);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, [
         'Content-Type: application/json'
      ]);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

      $response = curl_exec($ch);

      if(curl_errno($ch)) {
         $error_msg = curl_error($ch);
         curl_close($ch);
         return "cURL Error: $error_msg";
      }

      curl_close($ch);

      $responseData = json_decode($response, true);
      print_r($responseData);
      exit();

      return $responseData['contents'][0]['parts'][0]['text'] ?? 'Error: No content generated';
   }

}

?>