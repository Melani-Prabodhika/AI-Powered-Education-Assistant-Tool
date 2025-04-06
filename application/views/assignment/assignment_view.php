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
                <span id="assignmentDate">Date: March 20, 2025</span>
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
            
            <div class="question">
                <div class="question-text">2. Which type of epithelial tissue is specialized for secretion and absorption?</div>
                <div class="options">
                    <p>a) Squamous epithelium</p>
                    <p>b) Cuboidal epithelium</p>
                    <p>c) Columnar epithelium</p>
                    <p>d) Transitional epithelium</p>
                </div>
            </div>
            
            <div class="question">
                <div class="question-text">3. Blood is classified as which type of tissue?</div>
                <div class="options">
                    <p>a) Epithelial</p>
                    <p>b) Connective</p>
                    <p>c) Muscular</p>
                    <p>d) Nervous</p>
                </div>
            </div>
            
            <div class="question">
                <div class="question-text">4. What is the primary function of nervous tissue?</div>
                <div class="options">
                    <p>a) Contraction</p>
                    <p>b) Secretion</p>
                    <p>c) Transmission of electrical signals</p>
                    <p>d) Support and structure</p>
                </div>
            </div>
        </div>
        
        <div class="assignment-section">
            <div class="section-title">True/False (2 marks each)</div>
            
            <div class="question">
                <div class="question-text">1. Epithelial tissue always has a direct blood supply.</div>
                <div class="true-false">(True / False)</div>
            </div>
            
            <div class="question">
                <div class="question-text">2. Cardiac muscle is under voluntary control.</div>
                <div class="true-false">(True / False)</div>
            </div>
        </div>
        
        <div class="assignment-section">
            <div class="section-title">Short Answer (2 marks each)</div>
            
            <div class="question">
                <div class="question-text">1. Briefly describe the primary function of epithelial tissue.</div>
                <div class="short-answer"></div>
            </div>
            
            <div class="question">
                <div class="question-text">2. What are the three types of muscle tissue, and where is each typically found?</div>
                <div class="short-answer"></div>
            </div>
            
            <div class="question">
                <div class="question-text">3. What is the main function of a neuron?</div>
                <div class="short-answer"></div>
            </div>
        </div>
        
        <div class="assignment-section">
            <div class="section-title">Essay Questions (5 marks each)</div>
            
            <div class="question">
                <div class="question-text">1. Discuss the different types of connective tissues and their specific functions in the human body.</div>
                <div class="word-limit">Word Limit: 150-200 words</div>
                <div class="essay-answer-space"></div>
            </div>
        </div>
        
        <div class="assignment-section">
            <div class="section-title">Structured Questions (4 marks each)</div>
            
            <div class="question">
                <div class="question-text">1. Describe the structure of a typical nerve cell (neuron).</div>
                <div class="structured-parts">
                    <div class="structured-part">a) Include the functions of each part (dendrites, cell body, axon, myelin sheath).</div>
                    <div class="structured-part">b) How does the structure relate to its function?</div>
                </div>
                <div class="short-answer"></div>
            </div>
            
            <div class="question">
                <div class="question-text">2. Compare and contrast the three types of muscular tissue.</div>
                <div class="structured-parts">
                    <div class="structured-part">a) Compare their structure</div>
                    <div class="structured-part">b) Compare their function</div>
                    <div class="structured-part">c) Compare their location in the body</div>
                </div>
                <div class="short-answer"></div>
            </div>
        </div>
    </div>
    
    <script>
		window.addEventListener('load', function() {
		  const response = sessionStorage.getItem('assignmentResponse');
		  if (response) {
			console.log(response);
			sessionStorage.removeItem('assignmentResponse');
		  }
		});

	
        function exportToWord() {
            const header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
            const footer = "</body></html>";
            const sourceHTML = header + document.getElementById("assignmentContainer").innerHTML + footer;
            
            const blob = new Blob(['\ufeff', sourceHTML], {
                type: 'application/msword'
            });
            
            const title = document.getElementById("assignmentTitle").innerText || "Assignment";
            const fileTitle = title.replace(/[^a-z0-9]/gi, '_').toLowerCase();
            
            const link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = fileTitle + ".doc";
            link.click();
            URL.revokeObjectURL(link.href);
        }
        
        function saveAssignment() {
            const assignmentData = {
                title: document.getElementById("assignmentTitle").innerText,
                subject: document.getElementById("assignmentSubject").innerText.replace("Subject: ", ""),
                grade: document.getElementById("assignmentGrade").innerText.replace("Grade: ", ""),
                difficulty: document.getElementById("assignmentDifficulty").innerText.replace("Difficulty: ", ""),
                date: document.getElementById("assignmentDate").innerText.replace("Date: ", ""),
                content: document.getElementById("assignmentContainer").innerHTML
            };
            
            fetch('/api/assignments/save', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(assignmentData)
            })
            .then(response => {
                if (response.ok) {
                    showNotification("Assignment saved successfully!");
                    return response.json();
                }
                throw new Error('Network response was not ok.');
            })
            .then(data => {
                console.log('Success:', data);
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification("Error saving assignment. Please try again.", true);
            });
            
            showNotification("Assignment saved successfully!");
        }
        
        function showNotification(message, isError = false) {
            const notification = document.getElementById("notification");
            notification.textContent = message;
            
            if (isError) {
                notification.style.backgroundColor = "#f44336";
            } else {
                notification.style.backgroundColor = "#4CAF50";
            }
            
            notification.classList.add("show");
            
            setTimeout(() => {
                notification.classList.remove("show");
            }, 3000);
        }
        
        function saveAssignmentLocally() {
            const assignmentData = {
                title: document.getElementById("assignmentTitle").innerText,
                subject: document.getElementById("assignmentSubject").innerText.replace("Subject: ", ""),
                grade: document.getElementById("assignmentGrade").innerText.replace("Grade: ", ""),
                difficulty: document.getElementById("assignmentDifficulty").innerText.replace("Difficulty: ", ""),
                date: document.getElementById("assignmentDate").innerText.replace("Date: ", ""),
                content: document.getElementById("assignmentContainer").innerHTML
            };
            
            const jsonData = JSON.stringify(assignmentData, null, 2);
            
            const blob = new Blob([jsonData], { type: 'application/json' });
            
            const title = document.getElementById("assignmentTitle").innerText || "Assignment";
            const fileTitle = title.replace(/[^a-z0-9]/gi, '_').toLowerCase();
            
            const link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = fileTitle + ".json";
            link.click();
            URL.revokeObjectURL(link.href);
            
            showNotification("Assignment saved to file successfully!");
        }
        
        function populateAssignment(data) {
            // This function would be used to fill the template with actual data
            // For example:
            // document.getElementById('assignmentTitle').innerText = data.title;
            // ...and so on for other fields
            
            // After populating, you might want to update any metadata needed for saving
            // For example, setting a hidden field with an assignment ID if it's an existing assignment
        }
        
        function setupCIFormSubmission() {
            const form = document.getElementById('assignment_form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    
                    formData.append('content', document.getElementById('assignmentContainer').innerHTML);
                    
                    fetch(this.action, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showNotification("Assignment saved successfully!");
                        } else {
                            showNotification("Error saving assignment: " + data.message, true);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showNotification("Error saving assignment. Please try again.", true);
                    });
                });
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            setupCIFormSubmission();
            
            const saveButton = document.querySelector('.save-btn'); 
            if (saveButton) {
                saveButton.addEventListener('click', function() {
                    saveAssignmentLocally();
                });
            }
        });
    </script>
</body>
</html>