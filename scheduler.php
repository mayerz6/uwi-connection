<?php session_start(); ?>
<?php ob_start(); ?>

<?php  include 'classes/db.php';  ?>


 <?php 

$response = "default";
$response_error = "default";
$server_error = "default";
$user_error = "default";

if($_SESSION){ 

  
?>
   

<!DOCTYPE html>
<html lang="en">

	<head>
	
     <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<meta name="theme-color" content="#000000">
	
        <link rel="icon" href="favicon.png">

<title>UWI Connection</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/fullcalendar.css" />
  <link rel="stylesheet" href="assets/css/fullcalendar.print.css" media="print" />
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <link rel="stylesheet" href="assets/css/timepicki.css" />
  <link rel="stylesheet" href="assets/css/styles.css" />


<script src='assets/js/jquery.min.js'></script> 
<script src='assets/js/timepicki.js'></script>
<!--  <script src='assets/js/jquery-ui.custom.min.js'></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->				
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
		<!-- HTML5 shiv and respond.js IE8 support of HTML5 elements and media queries -->
			<!--//     
			         [if lt IE 9]
			     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>    
			         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			             [endif]
	          //-->


    </head>

    <body>						
    			 <!--  Site Navigation  -->
                 <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="schedule.php">Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign-out.php">Sign Out</a>
      </li>
    </ul>
  </div>
</nav>
        </header>

    	  <!--  End of Site Navigation  -->
   


<div class="screen"> 
   <div id="calendar"></div>
</div>


        
<footer>&copy; Copyright UWI | All Rights Reservered</footer>
    
    </body>
    

<?php

} else {

	header('Location: index.php');
	  exit;
  
  }

?>


 <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src='assets/js/fullcalendar.min.js'></script>

 <script>


  $(document).ready(function() {

   var date = new Date()
   var d = date.getDate()
   var m = date.getMonth()
   var y = date.getFullYear()

   var calendar = $('#calendar').fullCalendar({
 	editable: true,
     allDaySlot: false,
 	header: {
 	  left: 'prev,next today',
 	  center: 'title',
 	  right: 'month,agendaWeek,agendaDay'
 	},
     allDay: false,
   defaultView: 'month',
      displayEventTime: true,

 	events: [],<?php // echo $events; ?>

 	// Convert the allDay from string to boolean
 	eventRender: function(event) {
 	
    if (event.allDay === 'true') {
 		event.allDay = true
 	  } else {
 		event.allDay = false
 	       }
 	
   },
 	selectable: true,
 	select: function(start, end, allDay) {

        
 	  if (title) {
 		start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss")
 		end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss")

         
 		calendar.fullCalendar('renderEvent',
 		{
 		  title: title,
 		  start: start,
 	      end: end,
 		  allDay: false
 		},
 		 true)
 	  }
 	 calendar.fullCalendar('unselect')
    },


    
     dayClick: function(date, allDay, jsEvent, view) {
    	 window.location = "add-event.php?startDate=" + $.fullCalendar.formatDate(date, "MM/dd/yyyy") + "&startTime=" + $.fullCalendar.formatDate(date, "HH:mm:ss");
    	 },
    	 
     selectable: true,
     eventClick: function(event) {
    
        window.location = "view-event.php?id=" + event.id;
     
    
       // change the border color just for fun
      // $(this).css('border-color', 'red')
     }
   });
  })


</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>


<?php ob_end_flush(); ?>

