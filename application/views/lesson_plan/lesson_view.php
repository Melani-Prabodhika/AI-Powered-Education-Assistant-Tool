<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGenesis | Lesson Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --border-color: #e3e6f0;
            --text-color: #5a5c69;
        }
        
        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: var(--text-color);
            background-color: #f8f9fc;
        }
        
        .lesson-card {
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem rgba(58, 59, 69, 0.15);
            border: none;
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 1.25rem;
        }
		
		.btn {
			font-size: 15px;
		}
        
        .lesson-header {
            background-color: #606e96;
            color: white;
            padding: 1.5rem;
            border-radius: 0.35rem 0.35rem 0 0;
        }
        
        .section-header {
            background-color: #ffffff;
            padding: 0.75rem 1.25rem;
            font-weight: bold;
        }
        
        .table-lesson th {
            font-weight: 600;
            background-color: var(--secondary-color);
        }
        
        .table-lesson td, .table-lesson th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid var(--border-color);
        }
        
        .action-buttons button {
            margin-right: 0.5rem;
        }
        
        .editable:hover {
            background-color: rgba(78, 115, 223, 0.1);
            cursor: pointer;
        }
        
        .editable::after {
            content: "\f044";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            font-size: 0.75rem;
            margin-left: 0.5rem;
            color: #999;
            opacity: 0;
            transition: opacity 0.2s;
        }
        
        .editable:hover::after {
            opacity: 1;
        }
        
        .learning-outcome {
            padding: 0.5rem 1rem;
            margin-bottom: 0.5rem;
            background-color: #f8f9fc;
            border-left: 3px solid var(--primary-color);
        }
        
        @media print {
            .no-print {
                display: none !important;
            }
            
            body {
                background-color: white;
            }
            
            .container-fluid {
                padding: 0;
            }
            
            .lesson-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center no-print">
                    <h1 class="h3 mb-0 text-gray-800" style="font-weight: 600; text-transform: uppercase; margin-left: 10px;">Lesson Plan</h1>
                    <div class="action-buttons">
                        <button id="btnEdit" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button id="btnSave" class="btn btn-success">
                            <i class="fas fa-save"></i> Save
                        </button>
                        <button id="btnPrint" class="btn btn-primary">
                            <i class="fas fa-print"></i> Print
                        </button>
                        <button id="btnExportWord" class="btn btn-info">
                            <i class="fas fa-file-word"></i> Export to Word
                        </button>
                        <button id="btnExportPDF" class="btn btn-danger">
                            <i class="fas fa-file-pdf"></i> Export to PDF 
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card lesson-card">
                    <div class="lesson-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-0 editable"><strong>Subject : </strong><span id="subjectDisplay">Science</span></h4>
                                <input type="hidden" id="subject" name="subject">
                            </div>
                            <div class="col-md-6 text-md-end">
                                <h5><strong>Grade: </strong><span id="gradeDisplay" class="editable">11</span></h5>
                                <input type="hidden" id="grade" name="grade">
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Competency:</label>
                                    <p id="competencyDisplay" class="editable mb-0"></p>
                                    <input type="hidden" id="competency" name="competency">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Number of Periods:</label>
                                    <p id="periodsDisplay" class="editable mb-0">4</p>
                                    <input type="hidden" id="periods" name="periods">
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-lesson" id="contentTable">
                                <thead>
                                    <tr>
                                        <th width="5%">Step</th>
                                        <th width="30%">Section</th>
                                        <th width="50%">Topics Covered</th>
                                        <th width="15%">Periods Allocated</th>
                                    </tr>
                                </thead>
                                <tbody id="contentTableBody">
                                </tbody>
                            </table>
                        </div>
                        
                        <h4 class="section-header mt-4">Learning Outcomes</h4>
                        <div id="learningOutcomesContainer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalTitle">Edit Field</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editField" class="form-label">Value</label>
                        <input type="text" class="form-control" id="editFieldInput">
                        <textarea class="form-control" id="editFieldTextarea" rows="4" style="display: none;"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveEditBtn">Save</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
	
    <?php
	$resParam = isset($_GET['res']) ? $_GET['res'] : '';
	?>

	<script>
	const content = <?php echo json_encode($resParam); ?>;
		
		function extractLessonPlanFromUrl(encodedData) {
			 try {
				const jsonMatch = encodedData.match(/```json(.*?)```/s);
				
				if (!jsonMatch || !jsonMatch[1]) {
				  console.error('Could not extract JSON from the parameter');
				  return null;
				}
				
				return JSON.parse(jsonMatch[1]);
			} catch (error) {
				console.error('Failed to parse JSON:', error);
				return null;
			}
		}

		const lessonPlanData = extractLessonPlanFromUrl(content);
		// console.log(lessonPlanData);

        let currentEditingElement = null;
        let editable = false;
        
        let editModal = null;
        
        document.addEventListener('DOMContentLoaded', function() {
            editModal = new bootstrap.Modal(document.getElementById('editModal'));
            
            loadLessonPlan(lessonPlanData);
            
            document.getElementById('btnEdit').addEventListener('click', toggleEditMode);
            document.getElementById('btnSave').addEventListener('click', saveLessonPlan);
            document.getElementById('btnPrint').addEventListener('click', printLessonPlan);
            document.getElementById('btnExportWord').addEventListener('click', exportToWord);
            document.getElementById('btnExportPDF').addEventListener('click', exportToPDF);
            document.getElementById('saveEditBtn').addEventListener('click', saveEditField);
            
            setupEditableElements();
        });
        
        function loadLessonPlan(data) {
            const plan = data.lessonPlan;
            
            document.getElementById('subjectDisplay').textContent = plan.metadata.subject;
            document.getElementById('subject').value = plan.metadata.subject;
            
            document.getElementById('gradeDisplay').textContent = plan.metadata.grade;
            document.getElementById('grade').value = plan.metadata.grade;
            
            document.getElementById('competencyDisplay').textContent = plan.metadata.competency;
            document.getElementById('competency').value = plan.metadata.competency;
            
            document.getElementById('periodsDisplay').textContent = plan.metadata.periods;
            document.getElementById('periods').value = plan.metadata.periods;
            
            const contentTableBody = document.getElementById('contentTableBody');
            contentTableBody.innerHTML = '';
            
            plan.content.sections.forEach((section, index) => {
                const row = document.createElement('tr');
                
                const stepCell = document.createElement('td');
                stepCell.textContent = index + 1;
                row.appendChild(stepCell);
                
                const titleCell = document.createElement('td');
                const titleSpan = document.createElement('span');
                titleSpan.textContent = section.title;
                titleSpan.classList.add('editable');
                titleSpan.dataset.field = `content.sections[${index}].title`;
                titleCell.appendChild(titleSpan);
                row.appendChild(titleCell);
                
                const topicsCell = document.createElement('td');
                section.topics.forEach((topic, topicIndex) => {
                    const topicDiv = document.createElement('div');
                    const topicSpan = document.createElement('span');
                    topicSpan.textContent = topic;
                    topicSpan.classList.add('editable');
                    topicSpan.dataset.field = `content.sections[${index}].topics[${topicIndex}]`;
                    topicDiv.appendChild(topicSpan);
                    topicsCell.appendChild(topicDiv);
                });
                row.appendChild(topicsCell);
                
                const timeCell = document.createElement('td');
                const timeSpan = document.createElement('span');
                timeSpan.textContent = section.timeAllocation;
                timeSpan.classList.add('editable');
                timeSpan.dataset.field = `content.sections[${index}].timeAllocation`;
                timeCell.appendChild(timeSpan);
                row.appendChild(timeCell);
                
                contentTableBody.appendChild(row);
            });
            
            const learningOutcomesContainer = document.getElementById('learningOutcomesContainer');
            learningOutcomesContainer.innerHTML = '';
            
            plan.learningOutcomes.forEach((outcome, index) => {
                const outcomeDiv = document.createElement('div');
                outcomeDiv.classList.add('learning-outcome');
                
                const outcomeSpan = document.createElement('span');
                outcomeSpan.textContent = outcome;
                outcomeSpan.classList.add('editable');
                outcomeSpan.dataset.field = `learningOutcomes[${index}]`;
                
                outcomeDiv.appendChild(outcomeSpan);
                learningOutcomesContainer.appendChild(outcomeDiv);
            });
        }
        
        function setupEditableElements() {
            document.querySelectorAll('.editable').forEach(element => {
                element.addEventListener('click', function() {
                    if (!editable) return;
                    
                    currentEditingElement = this;
                    const value = this.textContent;
                    
                    const useTextarea = value.length > 50;
                    document.getElementById('editFieldInput').style.display = useTextarea ? 'none' : 'block';
                    document.getElementById('editFieldTextarea').style.display = useTextarea ? 'block' : 'none';
                    
                    if (useTextarea) {
                        document.getElementById('editFieldTextarea').value = value;
                    } else {
                        document.getElementById('editFieldInput').value = value;
                    }
                    
                    document.getElementById('editModalTitle').textContent = 'Edit Content';
                    editModal.show();
                });
            });
        }
        
        function saveEditField() {
            if (!currentEditingElement) return;
            
            const useTextarea = document.getElementById('editFieldTextarea').style.display !== 'none';
            const newValue = useTextarea ? 
                document.getElementById('editFieldTextarea').value : 
                document.getElementById('editFieldInput').value;
            
            currentEditingElement.textContent = newValue;
            
            const field = currentEditingElement.dataset.field;
            if (['subject', 'grade', 'competency', 'periods'].includes(field)) {
                document.getElementById(field).value = newValue;
            }
            
            editModal.hide();
            currentEditingElement = null;
        }
        
        function toggleEditMode() {
            editable = !editable;
            const editButton = document.getElementById('btnEdit');
            
            if (editable) {
                editButton.classList.remove('btn-warning');
                editButton.classList.add('btn-secondary');
                editButton.innerHTML = '<i class="fas fa-times"></i> Cancel Editing';
                
                document.querySelectorAll('.editable').forEach(el => {
                    el.classList.add('border', 'border-warning', 'p-1');
                });
            } else {
                editButton.classList.remove('btn-secondary');
                editButton.classList.add('btn-warning');
                editButton.innerHTML = '<i class="fas fa-edit"></i> Edit';
                
                document.querySelectorAll('.editable').forEach(el => {
                    el.classList.remove('border', 'border-warning', 'p-1');
                });
            }
        }
        
		function saveLessonPlan() {
			const lessonPlan = {
				metadata: {
					subject: document.getElementById('subjectDisplay').textContent,
					grade: document.getElementById('gradeDisplay').textContent,
					competency: document.getElementById('competencyDisplay').textContent,
					periods: document.getElementById('periodsDisplay').textContent
				},
				content: { sections: [] },
				learningOutcomes: []
			};
			
			const rows = document.getElementById('contentTableBody').querySelectorAll('tr');
			rows.forEach(row => {
				const cells = row.querySelectorAll('td');
				const title = cells[1].querySelector('.editable').textContent;
				
				const topicsElements = cells[2].querySelectorAll('.editable');
				const topics = Array.from(topicsElements).map(el => el.textContent);
				
				const timeAllocation = cells[3].querySelector('.editable').textContent;
				
				lessonPlan.content.sections.push({
					title,
					topics,
					timeAllocation
				});
			});
			
			const outcomeElements = document.getElementById('learningOutcomesContainer').querySelectorAll('.editable');
			outcomeElements.forEach(el => {
				lessonPlan.learningOutcomes.push(el.textContent);
			});
			
			console.log('Saving lesson plan:', lessonPlan);
			
			const saveButton = document.getElementById('btnSave');
			const originalButtonText = saveButton.innerHTML;
			saveButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
			saveButton.disabled = true;
			
			$.ajax({
				url: '/Test/save_lesson',
				type: 'POST',
				data: JSON.stringify(lessonPlan),
				processData: false,
				contentType: 'application/json',
				success: function(response) {
					alert("Lesson plan created successfully!");
				},
				error: function(error) {
					console.error('Error:', error);
					alert("Error creating lesson plan.");
				},
				complete: function() {
					saveButton.innerHTML = originalButtonText;
					saveButton.disabled = false;
				}
			}); 
		}

		document.getElementById('btnSave').addEventListener('click', saveLessonPlan);
        
        function printLessonPlan() {
            window.print();
        }
        
        function exportToWord() {
            const header = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40"><head><meta charset="utf-8"><title>Lesson Plan</title></head><body>';
            const footer = '</body></html>';
            
            const printContent = document.querySelector('.lesson-card').cloneNode(true);
            
            printContent.querySelectorAll('.no-print').forEach(el => el.remove());
            
            const sourceHTML = header + printContent.outerHTML + footer;
            const source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
            
            const downloadLink = document.createElement('a');
            document.body.appendChild(downloadLink);
            downloadLink.href = source;
            downloadLink.download = 'lesson_plan.doc';
            downloadLink.click();
            document.body.removeChild(downloadLink);
        }
        
        function exportToPDF() {
            const { jsPDF } = window.jspdf;
            
            const actionButtons = document.querySelector('.action-buttons');
            actionButtons.style.display = 'none';
            
            const element = document.querySelector('.lesson-card');
            
            html2canvas(element).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('p', 'mm', 'a4');
                const imgWidth = 210;
                const pageHeight = 295;
                const imgHeight = canvas.height * imgWidth / canvas.width;
                let heightLeft = imgHeight;
                let position = 0;
                
                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
                
                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    pdf.addPage();
                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }
                
                pdf.save('lesson_plan.pdf');
                
                actionButtons.style.display = 'block';
            });
        }
    </script>
</body>
</html>