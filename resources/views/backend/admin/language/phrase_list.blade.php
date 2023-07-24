<div class="main_content">

    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
            <div class="d-flex flex-column">
              <h4>{{ get_phrase('Translate your language') }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>


	<div class="row g-3">
		@foreach($all_phrase as $phrase)
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="card-title text-muted text-13px">{{$phrase->phrase}}</div>
						<div class="input-group">
							<textarea class="form-control text-13px" id="phrase{{$phrase->id}}">{{$phrase->translated}}</textarea>
							<button class="input-group-text btn btn-light text-13px" id="btn{{$phrase->id}}" onclick="updatePhrase('{{$phrase->id}}')">{{get_phrase('Update')}}</button>
						</div>
						@if(strpos($phrase->phrase, '____') == true)
							<span class="text-10px badge bg-danger">{{get_phrase("Don't remove ____")}}</span>
						@endif
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>

<script type="text/javascript">
	function updatePhrase(id){
		$('#btn'+id).html('{{get_phrase("Updating")}}...');
		let url = "{{route('admin.languages.update.phrase', '')}}/"+id;
		let translatedVal = $('#phrase'+id).val();
		let csrfToken = "{{ csrf_token() }}";
		$.ajax({
			type:'post',
			url: url,
			data:{translated:translatedVal, _token:csrfToken},
			success: function(response){
				if(response == 1){
					$('#btn'+id).html('<span class="text-success">{{get_phrase("Updated")}} !</span>');
				}else{
					$('#btn'+id).html('{{get_phrase("Update")}}');
				}
			}
		});
	}
</script>