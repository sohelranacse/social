//Bootstrap Tooltip initialize
var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

// $(document).ready(function(){
// 	//Responsive Datatable initialize
// 	$('.responsive-data-table').DataTable({
// 		responsive: true
// 	});

// });
