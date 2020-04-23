<?php require_once APPPATH."views/html_parts/html_head.php" ?>
<?php require_once APPPATH."views/html_parts/navbar.php" ?>

<style type="text/css">
#dt.dataTable.no-footer{
  border-bottom: unset;
}
#dt tbody td {
    display: block;
    border: unset;
}
#dt>tbody>tr>td{
  border-top: unset;
}
</style>

<div class="container py-4">
    <div class="row">
      <div class="col-12">
        
        <table id="dt" class="table w-100">
          <thead>
            <tr>
              <th>stories</th>
            </tr>
          </thead>
          <tbody class="row">
          	<?php foreach ($row as $value) {
						echo $value;
					} ?>
          </tbody>
        </table>
      </div>
    </div>
  </div> <!-- end container -->

	<script type="text/javascript">
		
	$(document).ready(function() {
		$("#dt thead").hide();
        var dt = $('#dt').DataTable({
        	pageLength: 20,
       		lengthChange: false,
         	processing: true,
         	language: {  
            	  paginate: {
                  previous: "<",
                  next: ">"
              },
            },
        });

       dt.on('draw', function(data){
        $('#dt tbody').addClass('row');
        $('#dt tbody tr').addClass('col-lg-3 col-md-4 col-sm-12');
       });

       $(".clickable-row").click(function() {
           window.location = $(this).data("href");
       });
	});
	</script>

<?php require_once APPPATH."views/html_parts/html_foot.php" ?>