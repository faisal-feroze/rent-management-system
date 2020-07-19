<?php include 'header.php'; ?>

<?php
$old = '2020-03-01';
$new = '2020-04-07';

if($old>$new){
  echo"Invalid";
}
else{
  echo"Valid";
}

 ?>

<!-- <div id="ex1" class="modal">
  <p>Bill Generation Completed. Click 'Detail' to see PDF.</p>
  <a href="home.php" id="close_modal" rel="modal:close">Detail</a>
  <a href="reports/generate_bill_report.php" id="pdf" target="_blank">PDF</a>
</div>


<p id="p_to_hidden"><a id="auto_modal" href="#ex1" rel="modal:open"></a></p> -->


<!-- <script>

$(document).ready(function() {
  $('#auto_modal').click();

  $('#pdf').click(function(){
    $('#close_modal').click();
    $('#p_to_hidden').hide();
  });
});

</script> -->

<!--
<div class="Table table-striped">
    <div class="Heading thead-dark">
        <div class="Cell">
            <p>SL#</p>
        </div>
        <div class="Cell">
            <p>Building</p>
        </div>
        <div class="Cell">
            <p>Flat</p>
        </div>
        <div class="Cell">
            <p>Tenant</p>
        </div>
        <div class="Cell">
            <p>Year</p>
        </div>
        <div class="Cell">
            <p>Month</p>
        </div>
        <div class="Cell">
            <p>Rent</p>
        </div>
        <div class="Cell">
            <p>Water</p>
        </div>
        <div class="Cell">
            <p>Electricity</p>
        </div>
        <div class="Cell">
            <p>Gas</p>
        </div>
        <div class="Cell">
            <p>Others</p>
        </div>
        <div class="Cell">
            <p>Due</p>
        </div>
        <div class="Cell">
            <p>Total</p>
        </div>
        <div class="Cell">
            <p>Receive</p>
        </div>
        <div class="Cell">
            <p>Date</p>
        </div>
        <div class="Cell">
            <p>Status</p>
        </div>
        <div class="Cell">
            <p>Action</p>
        </div>
    </div>

    <div class='Row'>
        <div class='Cell'>
            <p>Row 1 Column 1</p>
        </div>
        <div class="Cell">
            <p>Row 1 Column 2</p>
        </div>

    <div class="Cell">
      <p>Row 1 Column 3</p>
    </div>

    </div>
    <div class="Row">
        <div class="Cell">
            <p>Row 2 Column 1</p>
        </div>
        <div class="Cell">
            <p>Row 2 Column 2</p>
        </div>
        <div class="Cell">
            <p>Row 2 Column 3</p>
        </div>
    </div>
</div>

<style type="text/css">
    .Table
    {
        display: table;
    }
    .Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
    }
    .Heading
    {
        display: table-row;
        font-weight: bold;
        text-align: center;
    }
    .Row
    {
        display: table-row;
    }
    .Cell
    {
        display: table-cell;
        border: solid;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
    }

    .Heading.thead-dark .Cell {
	border-color: #32383e;
	color: #fff;
}

.Heading.thead-dark {
	background-color: #212529;
	/* color: #fff; */
}
.Heading.thead-dark .Cell p {
	margin: 10px;
}

.Row .Cell {
	border: none;
	padding: 0 10px;
}
.Row:nth-of-type(2n+1) {
	background-color: rgba(0,0,0,.05);
}
</style> -->
