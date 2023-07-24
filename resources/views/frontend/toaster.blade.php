<script type="text/javascript">
	"use strict";

	function alert_message(message){
	    $.toast({
	        content: message,
	        position: "bottom-left"
	    })
	}
</script>

@if($message = Session::get('success_message'))
	<script>
		"use strict";

		alert_message("{{$message}}");
	</script>
	@php Session()->forget('success_message'); @endphp
@endif

@if($message = Session::get('info_message'))
	<script>
		"use strict";

		alert_message("{{$message}}");
	</script>
	@php Session()->forget('info_message'); @endphp
@endif

@if($message = Session::get('error_message'))
	<script>
		"use strict";

		alert_message("{{$message}}");
	</script>
	@php Session()->forget('error_message'); @endphp
@endif