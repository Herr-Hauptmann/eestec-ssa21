<form id="myModal" method="POST" class="modal fade">
	{{ csrf_field() }}
  	{{ method_field('DELETE') }}
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>						
				<h4 class="modal-title w-100">Da li ste sigurni?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Da li zaista želite obrisati izjavu? Ova akciju nije moguće poništiti.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
				<button type="submit" class="btn btn-danger">Obriši</button>
			</div>
		</div>
	</div>
</form> 
