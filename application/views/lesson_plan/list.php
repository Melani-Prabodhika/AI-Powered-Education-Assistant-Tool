<style>

.btn-xs {
	font-size: 0.7rem;
	--vz-btn-padding-x: 0.55rem !important;
	--vz-btn-padding-y: 0.25rem !important;
}

.btn-light {
  --vz-btn-color: #7c7c7c !important;
}

</style>

<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title mb-0">All Lesson Plans</h4>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table nowrap align-middle mydatatable lesson_tbl">
					<thead>
						<tr>
							<th>#</th>
							<th>Subject</th>
							<th>Competancy</th>	
                     <th style="display: none;">Competancy</th>
							<th class="text-center">Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody id="lesson_tbdy">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div>
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
				<form id="lesson_form">
                <div class="modal-body">
                    <p class="text-muted" id="modalBodyText"></p>
					<input type="text" class="form-control" id="lp_id" name="lp_id" hidden>
               <input type="text" class="form-control" id="stt" name="stt" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="modalActionBtn"></button>
                </div>
				</form>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function () {
    getAllLessonPlans();
	
	$('#lesson_form').submit(function (e) {
		e.preventDefault();

		const formData = $(this).serialize();

		$.ajax({
			url: '/Lesson_plan/updateStatus',
			type: 'POST',
			data: formData,
			success: function (response) {
				let data = JSON.parse(response);
				if (data.stt === "ok") {
					Toastify({
                        text: data.msg || "Status updated successfully!",
                        duration: 4000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "linear-gradient(to right, rgb(6, 161, 244), rgb(9, 104, 28))",
                    }).showToast();
                    getAllLessonPlans();
				}
			},
			error: function (xhr, status, error) {
				console.error('Error:', error);
				Toastify({
					text: "An error occurred while updating the status.",
					duration: 4000,
					close: true,
					gravity: "top",
					position: "right",
					backgroundColor: "linear-gradient(to right, rgb(155, 22, 0), rgb(2, 0, 0))",
				}).showToast();
			}
		});
	});

});

function  getAllLessonPlans() {
	$('#lesson_tbdy').html('<tr><td colspan="7" style="text-align: center;"><strong>Please Wait...</strong></td></tr>');
		
	$.get({
		url: '/Lesson_plan/getAllLessonPlans',
		success: function(re){
			let data = JSON.parse(re);
         console.log(data);
			let list = '';
			let stt = '';
			let btn = '';
			
			$.each(data, function(i){
				var dt = data[i];
				
				if(dt.public == 1) {
					stt = '<span class="badge bg-secondary">Public</span>';
					btn = '<button type="button" class="btn btn-danger btn-xs waves-effect waves-light open-modal" data-bs-toggle="modal" data-action="private" data-lid="'+dt.lp_id+'">Private</button>';
				} else if(dt.public == 0){
					stt = '<span class="badge bg-danger">Private</span>';
					btn = '<button type="button" class="btn btn-primary btn-xs waves-effect waves-light open-modal" data-bs-toggle="modal" data-action="public" data-lid="'+dt.lp_id+'">Public</button>';
				}

          //  btn += '<button class="btn btn-xs btn-info view-btn" style="margin-left: 5px;" type="button" data-json=\'' + dt.lesson_plan_json + '\' data-lid="' + dt.lp_id + '">View</button>';
				
				list += '<tr>';
				list += '<td>'+(i+1)+'</td>';
				list += '<td>'+(dt.subject)+'</td>';
				list += '<td>'+(dt.competency)+'</td>';
            list += '<td style="display: none;">'+(dt.lesson_plan_json)+'</td>';
				list += '<td class="text-center">'+stt+'</td>';
				list += '<td class="text-center">'+btn+'</td>';
				list += '</tr>';
			});
			
			DataTablesForAjax.destroy();				
			$('#lesson_tbdy').html(list);
			init_dataTable_class('.mydatatable');
			DataTablesForAjax = $('.rider_tbl').DataTable();
		}
	});
}

$(document).on('click', '.open-modal', function () {
    const action = $(this).data('action');
    const lid = $(this).data('lid');
    const title = 'Update Status';
    const bodyText = 'Do you want to update this this lesson plan status?';
    const buttonText = 'Update';
    const buttonClass = action === 'public' ? 'btn-danger' : 'btn-secondary';
	const titleColor = action === 'public' ? 'text-danger' : 'text-secondary';
	const bodyColor = action === 'public' ? '#db7c68' : '#7d94c0';
	
	$('#modalBodyText').attr('style', `color: ${bodyColor} !important;`);
	
    $('#myModalLabel')
		.text(title)
		.removeClass('text-danger text-secondary')
		.addClass(titleColor);
		
    $('#modalBodyText').text(bodyText);
	
    $('#modalActionBtn')
        .text(buttonText)
        .removeClass('btn-danger btn-secondary')
        .addClass(buttonClass);
		
    $('#modalActionBtn').off('click').on('click', function () {
        $('#myModal').modal('hide');
    });
	
	$('#stt').val(action);
    $('#lp_id').val(lid);
	
    $('#myModal').modal('show');
});

$(document).on('click', '.view-btn', function () {
   var jsonData = $(this).data('json');
    var lessonId = $(this).data('lid');

    console.log('Lesson Plan JSON:', jsonData);

  // window.location.href="/Lesson_plan/lesson_plan?res="+jsonData;
})

</script>