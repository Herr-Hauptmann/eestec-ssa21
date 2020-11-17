<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<h6 id="routeParamException" class="modal-title w-100 d-none text-danger">
				@if (env('APP_ENV') === 'local' || env('APP_DEBUG') === 'true')
					Missing data-route parameter
				@else
					Trenutno nije podrzano.
				@endif 
			</h6>
			<form name="submitdelete" action="#" method="POST" class="remove-record-model">
				{{ method_field('delete') }}
				{{ csrf_field() }}
				<div class="modal-header flex-column">
					<div class="icon-box">
						<i class="material-icons">&#xE5CD;</i>
					</div>						
					<h4 class="modal-title w-100">Are you sure?</h4>	
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Do you really want to delete these records? This process cannot be undone.</p>
				</div>
				<div id="myModalButtons" class="modal-footer justify-content-center">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>     

<script>
	$('#myModal').on('show.bs.modal', function(event) {
		const route = $(event.relatedTarget).data('route');
		console.log(route);
		if (route === '' || route === undefined)
		{	
			$(this).find('#routeParamException').removeClass('d-none');
			$(this).find('form[name="submitdelete"]').addClass('d-none');
		}
		$(this).find('form[name="submitdelete"]').attr('action', route);
	});
</script>