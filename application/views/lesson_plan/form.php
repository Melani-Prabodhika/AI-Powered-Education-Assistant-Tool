<style>

textarea.form-control {
  min-height: calc(9.5em + 1rem + calc(var(--vz-border-width) * 2));
}

</style>

<div class="col-lg-12">
	<div class="card">
		<div class="card-header align-items-center d-flex">
			<h4 class="card-title mb-0 flex-grow-1">Create a Lesson Plan</h4>
		</div>
		<div class="card-body">
			<div class="live-preview">
				<form id="lesson_frm" enctype="multipart/form-data">
					<div class="row gy-4">
						<div class="col-xxl-6 col-md-6">
							<div>
								<label for="subject" class="form-label">Subject<span style="color: red;"> *</span></label>
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject Name">
							</div>
						</div>
						<div class="col-xxl-6 col-md-6">
							<div>
								<label for="grade" class="form-label">Grade<span style="color: red;"> *</span></label>
								<input type="text" class="form-control numonly" id="grade" name="grade" placeholder="Enter Grade">
							</div>
						</div>
						<div class="col-xxl-6 col-md-6">
							<div>
								<label for="compet" class="form-label">Competency Level<span style="color: red;"> *</span></label>
								<input type="text" class="form-control" id="compet" name="compet" placeholder="Enter Competency">
							</div>
						</div>
						<div class="col-xxl-6 col-md-6">
							<div>
								<label for="period" class="form-label">No of Periods<span style="color: red;"> *</span></label>
								<input type="text" class="form-control numonly" id="period" name="period" placeholder="Enter Number of Periods">
							</div>
						</div>
						<div class="col-xxl-6 col-md-6">
							<div>
								<label for="content" class="form-label">Content<span style="color: red;"> *</span></label>
								<textarea  class="form-control" id="content" name="content" placeholder="Enter Lesson Content"></textarea>
							</div>
						</div>
						<div class="col-xxl-6 col-md-6">
							<div>
								<label for="outcome" class="form-label">Learning Outcomes<span style="color: red;"> *</span></label>
								<textarea class="form-control" id="outcome" name="outcome" placeholder="Enter Learning Outcomes"></textarea>
							</div>
						</div>
						<div class="col-xxl-12 col-md-6 d-flex justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary waves-effect waves-light">Create</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>

$(document).ready(function(){
	$('#lesson_frm').on('submit', function(e) {
	  e.preventDefault();

	  const formData = new FormData(this);
	  
	  let waitingToast = Toastify({
			text: "Please wait....",
			duration: -1,
			close: false,
			gravity: "top",
			position: "right",
			backgroundColor: "linear-gradient(to right, rgb(157, 59, 196), rgb(219, 134, 44)",
		});
		
		waitingToast.showToast();

	  $.ajax({
		url: '/Lesson_plan/createLessonPlan',
		type: 'POST',
		data: formData,
		processData: false,
		contentType: false,
		success: function(response) {
		  waitingToast.hideToast();
		  window.location.href="/Lesson_plan/lesson_plan?res="+response;
		},
		error: function(error) {
		  alert("Error creating lesson plan.");
		}
	  });
	});

});

</script>