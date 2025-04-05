<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGenesis | Assignment View</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.5;
            color: #333;
            background-color: #f8f8f8;
            padding: 20px;
        }
        
        .assignment-container {
            background-color: white;
            margin: 0 auto;
            max-width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        .assignment-header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        
        .assignment-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .assignment-subtitle {
            font-size: 16px;
            margin-bottom: 15px;
        }
        
        .assignment-info {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .assignment-instructions {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #eee;
            border-radius: 4px;
        }
        
        .assignment-instructions h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }
        
        .assignment-instructions ul {
            list-style-position: inside;
            margin-left: 10px;
        }
        
        .assignment-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #eee;
        }
        
        .question {
            margin-bottom: 20px;
        }
        
        .question-text {
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .options {
            margin-left: 20px;
            margin-bottom: 10px;
        }
        
        .options p {
            margin-bottom: 5px;
        }
        
        .true-false {
            font-style: italic;
            margin-left: 20px;
        }
        
        .short-answer {
            border-bottom: 1px dotted #ccc;
            min-height: 40px;
            margin: 10px 0;
        }
        
        .essay-question {
            margin-bottom: 10px;
        }
        
        .essay-answer-space {
            border: 1px solid #eee;
            min-height: 200px;
            padding: 10px;
            background-color: #fcfcfc;
        }
        
        .word-limit {
            font-style: italic;
            font-size: 12px;
            color: #777;
            margin-top: 5px;
        }
        
        .structured-parts {
            margin-left: 20px;
        }
        
        .structured-part {
            margin-bottom: 10px;
        }
        
        .assignment-footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
        
        .print-controls {
            background-color: #f0f0f0;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 4px;
        }
        
        .print-controls button {
            padding: 8px 15px;
            margin: 0 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        
        .print-controls button:hover {
            background-color: #45a049;
        }
        
        .print-controls .save-btn {
            background-color: #2196F3;
        }
        
        .print-controls .save-btn:hover {
            background-color: #0b7dda;
        }
        
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(-20px);
            z-index: 1000;
        }
        
        .notification.show {
            opacity: 1;
            transform: translateY(0);
        }
        
        @media print {
            body {
                background-color: white;
                padding: 0;
            }
            
            .assignment-container {
                width: 210mm;
                height: 297mm;
                box-shadow: none;
                margin: 0;
                padding: 15mm;
            }
            
            .print-controls, .notification {
                display: none;
            }
            
            @page {
                size: A4;
                margin: 0;
            }
            
            .question {
                page-break-inside: avoid;
            }
            
            .essay-answer-space {
                page-break-inside: avoid;
            }
            
            .assignment-section {
                page-break-before: auto;
            }
        }
    </style>
</head>
<body>
    <div id="notification" class="notification">Assignment saved successfully!</div>
    
    <div class="print-controls">
        <button onclick="saveAssignment()" class="save-btn">Save Assignment</button>
        <button onclick="window.print()">Print as PDF</button>
        <button onclick="exportToWord()">Export to Word</button>
    </div>
    
    <div class="assignment-container" id="assignmentContainer">
        <div class="assignment-header">
            <div class="assignment-title" id="assignmentTitle">Science - Grade 11 - Animal Tissues</div>
            <div class="assignment-info">
                <span id="assignmentSubject">Subject: Science</span>
                <span id="assignmentGrade">Grade: 11</span>
            </div>
            <div class="assignment-info">
                <span id="assignmentDifficulty">Difficulty: Intermediate</span>
                <span id="assignmentDate">Date: <?php echo date('F d, Y'); ?></span>
            </div>
        </div>
        
        <div class="assignment-instructions">
            <h3>Instructions:</h3>
            <ul>
                <li>Answer all questions.</li>
                <li>The marks for each question are indicated in brackets.</li>
                <li>Total marks: <strong>35</strong></li>
            </ul>
        </div>
        
        <?php
        // If we already have the response in PHP, we can render it directly
        // This part is optional - if you're already storing the data in sessionStorage, you can remove this
        if (isset($assignmentResponse)) {
            echo '<script>';
            echo 'sessionStorage.setItem("assignmentResponse", ' . json_encode($assignmentResponse) . ');';
            echo '</script>';
        }
        ?>
        
        <!-- Initial content will be replaced by JavaScript -->
        <div class="assignment-section">
            <div class="section-title">Multiple Choice Questions (2 marks each)</div>
            
            <div class="question">
                <div class="question-text">1. Which of the following is NOT a primary type of animal tissue?</div>
                <div class="options">
                    <p>a) Epithelial tissue</p>
                    <p>b) Connective tissue</p>
                    <p>c) Nervous tissue</p>
                    <p>d) Vascular tissue</p>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    window.addEventListener('load', function() {
      const response = sessionStorage.getItem('assignmentResponse');
      
      if (response) {
        try {
          const responseData = JSON.parse(response);
          const assignmentData = extractAssignmentData(responseData);
          
          if (assignmentData) {
            renderAssignment(assignmentData);
          } else {
            console.error('Failed to extract assignment data from response');
          }
        } catch (error) {
          console.error('Error parsing assignment data:', error);
        }
      }
    });

    function extractAssignmentData(responseData) {
      // Extract the text content from the response
      try {
        // Access the text content from the response structure
        if (responseData.candidates && 
            responseData.candidates[0] && 
            responseData.candidates[0].content && 
            responseData.candidates[0].content.parts && 
            responseData.candidates[0].content.parts[0] && 
            responseData.candidates[0].content.parts[0].text) {
          
          return responseData.candidates[0].content.parts[0].text;
        }
        return null;
      } catch (error) {
        console.error('Error extracting text from response:', error);
        return null;
      }
    }

    function renderAssignment(assignmentText) {
      // Clear existing content
      const container = document.getElementById('assignmentContainer');
      
      // Keep the header
      const header = container.querySelector('.assignment-header');
      const instructions = container.querySelector('.assignment-instructions');
      
      // Clear all sections
      const sections = container.querySelectorAll('.assignment-section');
      sections.forEach(section => section.remove());
      
      // Parse questions by category
      const questionsByCategory = parseQuestions(assignmentText);
      
      // Render each category
      renderQuestionsByCategory(container, questionsByCategory);
      
      // Update total marks
      updateTotalMarks(questionsByCategory);
    }

    function parseQuestions(text) {
      const questions = {
        mcq: [],
        truefalse: [],
        shortanswer: [],
        structured: [],
        essay: []
      };
      
      // Split the text into lines
      const lines = text.split('\n');
      
      let currentQuestion = null;
      let currentCategory = null;
      
      for (let i = 0; i < lines.length; i++) {
        const line = lines[i].trim();
        
        if (!line) continue;
        
        // Detect question number and category
        const questionMatch = line.match(/^(\d+)\.\s+\*\*([^:]+):\*\*\s+(.*)/);
        
        if (questionMatch) {
          // Save previous question if exists
          if (currentQuestion) {
            questions[currentCategory].push(currentQuestion);
          }
          
          const [, number, category, questionText] = questionMatch;
          
          // Determine category
          let categoryKey = '';
          if (category.toLowerCase().includes('mcq')) {
            categoryKey = 'mcq';
          } else if (category.toLowerCase().includes('true/false')) {
            categoryKey = 'truefalse';
          } else if (category.toLowerCase().includes('short answer')) {
            categoryKey = 'shortanswer';
          } else if (category.toLowerCase().includes('structured')) {
            categoryKey = 'structured';
          } else if (category.toLowerCase().includes('essay')) {
            categoryKey = 'essay';
          }
          
          currentCategory = categoryKey;
          currentQuestion = {
            number,
            text: questionText,
            options: [],
            parts: []
          };
          
          // For MCQs, try to extract the options from the next lines
          if (categoryKey === 'mcq') {
            let j = i + 1;
            while (j < lines.length && lines[j].trim().match(/^[a-d]\)/)) {
              currentQuestion.options.push(lines[j].trim());
              j++;
            }
            i = j - 1; // Skip the option lines
          }
          
          // For structured questions, extract parts
          if (categoryKey === 'structured') {
            let j = i + 1;
            while (j < lines.length && 
                  (lines[j].trim().match(/^\([a-z]\)/) || 
                   lines[j].trim().match(/^[a-z]\)/))) {
              currentQuestion.parts.push(lines[j].trim());
              j++;
            }
            i = j - 1; // Skip the part lines
          }
        } else if (line.match(/^\([a-z]\)/) || line.match(/^[a-z]\)/)) {
          // This is a structured question part or an option
          if (currentQuestion) {
            if (currentCategory === 'structured') {
              currentQuestion.parts.push(line);
            } else if (currentCategory === 'mcq') {
              currentQuestion.options.push(line);
            }
          }
        } else if (line.includes('Word Limit')) {
          // This is a word limit for an essay
          if (currentQuestion) {
            currentQuestion.wordLimit = line;
          }
        }
      }
      
      // Add the last question
      if (currentQuestion && currentCategory) {
        questions[currentCategory].push(currentQuestion);
      }
      
      return questions;
    }

    function renderQuestionsByCategory(container, questionsByCategory) {
      // Render MCQs
      if (questionsByCategory.mcq.length > 0) {
        renderSection(container, 'Multiple Choice Questions (2 marks each)', questionsByCategory.mcq, renderMCQ);
      }
      
      // Render True/False
      if (questionsByCategory.truefalse.length > 0) {
        renderSection(container, 'True/False (2 marks each)', questionsByCategory.truefalse, renderTrueFalse);
      }
      
      // Render Short Answer
      if (questionsByCategory.shortanswer.length > 0) {
        renderSection(container, 'Short Answer (2 marks each)', questionsByCategory.shortanswer, renderShortAnswer);
      }
      
      // Render Essay
      if (questionsByCategory.essay.length > 0) {
        renderSection(container, 'Essay Questions (5 marks each)', questionsByCategory.essay, renderEssay);
      }
      
      // Render Structured
      if (questionsByCategory.structured.length > 0) {
        renderSection(container, 'Structured Questions (4 marks each)', questionsByCategory.structured, renderStructured);
      }
    }

    function renderSection(container, title, questions, renderFunction) {
      const section = document.createElement('div');
      section.className = 'assignment-section';
      
      const sectionTitle = document.createElement('div');
      sectionTitle.className = 'section-title';
      sectionTitle.textContent = title;
      section.appendChild(sectionTitle);
      
      questions.forEach(question => {
        renderFunction(section, question);
      });
      
      container.appendChild(section);
    }

    function renderMCQ(section, question) {
      const questionDiv = document.createElement('div');
      questionDiv.className = 'question';
      
      const questionText = document.createElement('div');
      questionText.className = 'question-text';
      questionText.textContent = `${question.number}. ${question.text}`;
      questionDiv.appendChild(questionText);
      
      const options = document.createElement('div');
      options.className = 'options';
      
      question.options.forEach(option => {
        const optionP = document.createElement('p');
        optionP.textContent = option;
        options.appendChild(optionP);
      });
      
      questionDiv.appendChild(options);
      section.appendChild(questionDiv);
    }

    function renderTrueFalse(section, question) {
      const questionDiv = document.createElement('div');
      questionDiv.className = 'question';
      
      const questionText = document.createElement('div');
      questionText.className = 'question-text';
      questionText.textContent = `${question.number}. ${question.text}`;
      questionDiv.appendChild(questionText);
      
      const trueFalse = document.createElement('div');
      trueFalse.className = 'true-false';
      trueFalse.textContent = '(True / False)';
      
      questionDiv.appendChild(trueFalse);
      section.appendChild(questionDiv);
    }

    function renderShortAnswer(section, question) {
      const questionDiv = document.createElement('div');
      questionDiv.className = 'question';
      
      const questionText = document.createElement('div');
      questionText.className = 'question-text';
      questionText.textContent = `${question.number}. ${question.text}`;
      questionDiv.appendChild(questionText);
      
      const shortAnswer = document.createElement('div');
      shortAnswer.className = 'short-answer';
      
      questionDiv.appendChild(shortAnswer);
      section.appendChild(questionDiv);
    }

    function renderEssay(section, question) {
      const questionDiv = document.createElement('div');
      questionDiv.className = 'question';
      
      const questionText = document.createElement('div');
      questionText.className = 'question-text';
      questionText.textContent = `${question.number}. ${question.text}`;
      questionDiv.appendChild(questionText);
      
      if (question.wordLimit) {
        const wordLimit = document.createElement('div');
        wordLimit.className = 'word-limit';
        wordLimit.textContent = question.wordLimit;
        questionDiv.appendChild(wordLimit);
      } else {
        const wordLimit = document.createElement('div');
        wordLimit.className = 'word-limit';
        wordLimit.textContent = 'Word Limit: 200-250 words';
        questionDiv.appendChild(wordLimit);
      }
      
      const essayAnswerSpace = document.createElement('div');
      essayAnswerSpace.className = 'essay-answer-space';
      
      questionDiv.appendChild(essayAnswerSpace);
      section.appendChild(questionDiv);
    }

    function renderStructured(section, question) {
      const questionDiv = document.createElement('div');
      questionDiv.className = 'question';
      
      const questionText = document.createElement('div');
      questionText.className = 'question-text';
      questionText.textContent = `${question.number}. ${question.text}`;
      questionDiv.appendChild(questionText);
      
      if (question.parts.length > 0) {
        const structuredParts = document.createElement('div');
        structuredParts.className = 'structured-parts';
        
        question.parts.forEach(part => {
          const partDiv = document.createElement('div');
          partDiv.className = 'structured-part';
          partDiv.textContent = part;
          structuredParts.appendChild(partDiv);
        });
        
        questionDiv.appendChild(structuredParts);
      }
      
      const shortAnswer = document.createElement('div');
      shortAnswer.className = 'short-answer';
      
      questionDiv.appendChild(shortAnswer);
      section.appendChild(questionDiv);
    }

    function updateTotalMarks(questionsByCategory) {
      let totalMarks = 0;
      
      // Calculate total marks based on number of questions and their mark values
      totalMarks += questionsByCategory.mcq.length * 2;         // 2 marks each
      totalMarks += questionsByCategory.truefalse.length * 2;   // 2 marks each
      totalMarks += questionsByCategory.shortanswer.length * 2; // 2 marks each
      totalMarks += questionsByCategory.essay.length * 5;       // 5 marks each
      totalMarks += questionsByCategory.structured.length * 4;  // 4 marks each
      
      // Update the total marks in the instructions
      const instructions = document.querySelector('.assignment-instructions ul');
      if (instructions && instructions.lastElementChild) {
        instructions.lastElementChild.innerHTML = `Total marks: <strong>${totalMarks}</strong>`;
      }
    }

    // Add these utility functions for the buttons
    function saveAssignment() {
      // This function would typically save to a database or local storage
      // For now, just show the notification
      const notification = document.getElementById('notification');
      notification.classList.add('show');
      
      // Hide notification after 3 seconds
      setTimeout(() => {
        notification.classList.remove('show');
      }, 3000);
      
      // If you want to send data to server, you can use this:
      /*
      fetch('save_assignment.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          assignment: sessionStorage.getItem('assignmentResponse')
        }),
      })
      .then(response => response.json())
      .then(data => {
        console.log('Success:', data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
      */
    }

    function exportToWord() {
      // Create a new Blob with the HTML content
      const html = document.querySelector('.assignment-container').outerHTML;
      const blob = new Blob(['<!DOCTYPE html><html><head><title>Assignment</title><style>' + 
                            document.querySelector('style').textContent + 
                            '</style></head><body>' + html + '</body></html>'], 
                            {type: 'application/msword'});
      
      // Create a download link and trigger it
      const link = document.createElement('a');
      link.href = URL.createObjectURL(blob);
      link.download = 'Assignment.doc';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
    </script>
</body>
</html>