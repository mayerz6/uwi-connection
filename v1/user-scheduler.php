<?php session_start(); ?>
<?php ob_start(); ?>

<?php  include 'classes/db.php';  ?>


<!DOCTYPE html>
<html lang="en">

	<head>
	
     <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<meta name="theme-color" content="#000000">
	
        <link rel="icon" href="favicon.png">

<title>BIPA Registry</title>
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
			<script>
          $( function() {
            $( "#lbStartDate" ).datepicker();
            $( "#lbEndDate" ).datepicker();
        	$('#lbStartTime').timepicki();
        	$('#lbEndTime').timepicki();
          } );
 		 </script>
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
    <?php if($_SESSION) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="user-profile.php">Profile</a>
      </li>
      
      <?php } else { ?>
       <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
     
       <?php if($_SESSION) { ?>
       <li class="nav-item">
        <a class="nav-link" href="scheduler.php">Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign-out.php">Sign Out</a>
      </li>
      <?php } else { ?>
      <li class="nav-item">
        <a class="nav-link" href="registration.php">Registration</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>
        </header>

    	  <!--  End of Site Navigation  -->
   


 <?php 

if($_SESSION){ 

$response = "default";
$response_error = "default";
$server_error = "default";
$user_error = "default";

 $userConnect = new database;
 
$events = $userConnect->fetchDataByHost($_SESSION['id']);

 $userData = $userConnect->fetchUserByUsername($_SESSION['username']);
 
/* ########################################################################################################################## */

/* Once the user clicks on the SUBMIT button; EXECUTE the following code. */
if(isset($_POST['submit'])){
   
      /* Extract all the elements within the $_POST super GLOBAL. */
      extract($_POST);
 
    //  $hostData = $userConnect->fetchUserByUsername($ddlMeetingHost);
     
      $userId = $userData[0]['id'];
   //   $hostId = $hostData[0]['id'];
        $hostId = $userData[0]['id'];

 /* We MUST sanitize our input fields for SECURITY purposes. */
//  $roomId = filter_var($ddlMeetingRoom, FILTER_SANITIZE_STRING);
           $roomId = '1';
           
 //   $dbConnect = new database;
    
  $name = filter_var($tbEventName, FILTER_SANITIZE_STRING);
  $description = filter_var($tbEventDescription, FILTER_SANITIZE_STRING);
 
  $eventSD = filter_var($tbStartDate, FILTER_SANITIZE_STRING);
  $eventED = filter_var($tbEndDate, FILTER_SANITIZE_STRING);
  $eventST = filter_var($tbStartTime, FILTER_SANITIZE_STRING);
  $eventET = filter_var($tbEndTime, FILTER_SANITIZE_STRING);

    
 /* Conversion of the text entered to represent the DATE and TIME into a formal that our database can understand. */
   $eventST = date("H:i", strtotime("$eventST"));
   $eventET = date("H:i", strtotime("$eventET"));
   $eventSD = date("Y-m-d", strtotime("$eventSD"));
   $eventED = date("Y-m-d", strtotime("$eventED"));
   
$_SESSION['eName'] = $name;
$_SESSION['eDes'] = $description;
$_SESSION['sDate'] = $eventSD;
$_SESSION['eDate'] = $eventED;
$_SESSION['sTime'] = $eventST;
$_SESSION['eTime'] = $eventET;

  
   /* Concatenation of the DATE and TIME values inorder to prepare them for INSERTION into our SQL query. */
   $start_Date = $eventSD . " " . $eventST;
   $end_Date = $eventED . " " . $eventET;

         
         $i = $dbConnect->roomIsAvailable($roomId, $eventSD, $eventED, $eventST, $eventET);

      //   exit;
  //   echo 'We are connected...';
     
            if($i==0){

              $eventData = array(
                'name' => $name,
                'description' => $description,
                'startDate' => $start_Date,
                'endDate'   => $end_Date,
                'userId'    => $userId,
                'hostId'    => $hostId
              );
                
        // $query = "INSERT INTO Events (name, description, eventSD, eventED, userId, hostId, IsPublic, RecurrenceType) ";
        // $query .= "VALUES('$name', '$description', convert('$start_Date', datetime), convert('$end_Date', datetime), '$userId', '$hostId', 1, 'N')";

        // Code for testing...  
       $num = $dbConnect->addEventData($eventData);


       // print_r($query); exit;

        // $results = mysqli_query($connection, $query);
              if($num){

                unset($_SESSION['eName']);
                unset($_SESSION['eDes']);
                unset($_SESSION['sDate']);
                unset($_SESSION['eDate']);
                unset($_SESSION['sTime']);
                unset($_SESSION['eTime']);
                
                  $response_error = "msg-success";
                  
                  
              //    $connection->close();
                  
                  header("location: user-scheduler.php");

              } else{

                $user_error = "error";
                $response_error = "error";

              }
       
          
        } else {

        $user_error = "error";
         $response_error = "error";

        }


     
} else {


        $response = "default";
        $response_error = "default";
        $server_error = "default";
        $user_error = "default";

    $_SESSION['eName'] = "";
    $_SESSION['eDes'] = "";
    $_SESSION['sDate'] = "";
    $_SESSION['eDate'] = "";
    $_SESSION['sTime'] = "";
    $_SESSION['eTime'] = "";
    
  //   $connection->close();

    /* We are testing whether the event is being EDITED or CREATED */
   if( !isset($_GET['startDate']) || empty($_GET['startDate'])) {
      
    $evtDate = "";
    $evtTime = "";

    $_SESSION['eName'] = "";
    $_SESSION['eDes'] = "";
    $_SESSION['sDate'] = "";
    $_SESSION['eDate'] = "";
    $_SESSION['sTime'] = "";
    $_SESSION['eTime'] = "";

           
  } else if ( isset($_GET['startDate']) || !empty($_GET['startDate'])) {

    $bookingDate = $_GET['startDate'];
    $bookingTime = date("g:i A", strtotime($_GET['startTime']));
    $bookingEndTime = date("g:i A", strtotime($_GET['startTime']) + 1800);
     
      $evtTime = $bookingTime;
      $evtEndTime = $bookingEndTime;
      $evtDate = $bookingDate;

      $_SESSION['eName'] = "";
      $_SESSION['eDes'] = "";
      $_SESSION['sDate'] = "";
      $_SESSION['eDate'] = "";
      $_SESSION['sTime'] = "";
      $_SESSION['eTime'] = "";
  
         
        }

  
}
  
  
/* ########################################################################################################################## */


?>
   


<div class="screen"> 

<div class="jumbotron">
            <h2>Hey <b><?php echo $userData[0]['fname']; ?></b> ... Manage your schedule here!</h2>
            <p>...secure access ONLY!</p>
        </div>

<div class="row">
        <!-- Your custom calendar APP -->
      <div class="col-md-7"><div id="calendar"></div></div>
      
      <!-- SECTION defined to capture user defined EVENTS within their calendar -->
       <div class="col-md-5">
       
         
<div class="container">
	<div class="form-section">
	
   <h4>Add Event Details</h4>

     
          <small>You can now <a href="calendar.php">view</a> your entry within the Calendar.</small>
              <br />
              <br />
          
    <form name="editForm" onsubmit="return eventUpdate()" action="user-scheduler.php" method="post">
     	 <div class="form-row">
        
     <!-- Section of FORM for Event registration; meant to take up 3/4 of the screen.  -->    
        <div class="col-md-12">
            <div class="form-group">
        
       
          <label for="lbName">Name:</label>
            <input name="tbEventName" id="lbName" type="text" class="form-control" value="<?php echo $_SESSION['eName']; ?>" placeholder="Enter your 'Event Name'..." />
                <div class="inputError" id="eventNameError"></div>

         <label for="txtDescription">Description:</label>
             <textarea name="tbEventDescription" placeholder="Enter your 'Event Description'..." class="form-control" id="txtDescription" rows="5"><?php echo $_SESSION['eDes']; ?></textarea>        
                <div class="inputError" id="eventDescriptionError"></div>

            </div>
        </div>

    </div>
              
        <div class="form-row">
        	  <small class="form-text text-muted">Please use the <b>MM/DD/YYYY</b> format for DATE and the <b>24 hour(AM/PM)</b> time format for TIME.</small>
        </div>

        <br />
        <br />
 <!-- Section detailing the EVENT Date & Time input -->
             <div class="form-row">
                
                <div class="form-group col-6">
  
               
             <label for="lbStartDate">Start Date: </label>
                <div class='input-group date' id='datetimepicker4'>
                    <?php if( isset($_GET['startDate']) || !empty($_GET['startDate']) ) { ?>
                        <input name="tbStartDate" value="<?php echo $evtDate; ?>" type="text" class="form-control" id="lbStartDate" />
                    <?php } else { ?>
                        <input name="tbStartDate" value="<?php echo $_SESSION['sDate']; ?>" type="text" class="form-control" id="lbStartDate" />
                    <?php } ?>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

                     <div class="inputError" id="startDateError"></div>

                </div>

                <div class="form-group col-6">
                
                <label for="lbEndDate">End Date:</label> 
                <div class='input-group date' id='datetimepicker5'>
                     <?php if( isset($_GET['startDate']) || !empty($_GET['startDate']) ) { ?>
                        <input name="tbEndDate" value="<?php echo $evtDate; ?>" type="text" class="form-control" id="lbEndDate" /> 
                     <?php } else { ?>
                        <input name="tbEndDate" value="<?php echo $_SESSION['eDate']; ?>" type="text" class="form-control" id="lbEndDate" />    
                     <?php } ?>
                             <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                </div>
                
                <div class="inputError" id="endDateError"></div>

                </div>

                </div>
              
                <div class="form-row">

             	    <div class="form-group col-6">
               
                      <label for="lbStartTime">Start Time:</label>    
                      <div class='input-group date' id='datetimepicker3'>
                            <input name="tbStartTime" value="<?php echo $_SESSION['sTime']; ?>" type="text" class="form-control" id="lbStartTime" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                            </div>
                            <div class="inputError" id="startTimeError"></div>

                    </div>
                    <div class="form-group col-6">
                    <label for="lbEndTime">End Time:</label> 
                    <div class='input-group date' id='datetimepicker2'>
                    
                     <input name="tbEndTime" value="<?php echo $_SESSION['eTime']; ?>" type="text" class="form-control" id="lbEndTime" />
                     <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                    </div>
                    <div class="inputError" id="endTimeError"></div>
                 </div>

                 <h4 class="<?php echo $user_error; ?>">Room has already been BOOKED!!! Meeting Room is UNAVAILABLE for this date and time.</h4>
           </div>

       <!-- Section detailing the EVENT Date & Time input  -->

        <!--//
                <div class="form-row">
                     
                      <div class="form-group col-6">
               
                  <label for="lbMeetingRoom">Meeting Room:</label> 
                          
                        <select class="form-control" id="lbMeetingRoom" name="ddlMeetingRoom">
                              <option>Select Room</option>
                                <option value="1">Room 1</option>
                                <option value="2">Room 2</option>
                                <option value="3">Room 3</option>
                                <option value="4">Room 4</option>
                        </select>


                </div>
                <div class="inputError" id="roomError"></div>           
            </div>
        //-->
                        <div class="form-row">
                        <div class="form-group col-6">
                        <button name="submit" class="btn btn-default">Submit</button>
                          <button onClick="window.location='user-profile.php';" name="cancel" class="btn btn-danger">Cancel</button>
                                </div>          
                                </div>
                        
                        
        
    </form>
    

     <h4 class="<?php echo $server_error; ?>">Server connection failed...Please retry later!</h4>
    
    

       
       
       
       <!-- SECTION defined to capture user defined EVENTS within their calendar -->
       </div>
</div>

</div>
</div>
</div>

<div class="container">
        <footer>&copy; Copyright Larry Mayers | All Rights Reservered</footer>
</div>

    </body>
    

<?php


} else {


 $connection->close();
 
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
 	editable: false,
     allDaySlot: false,
 	header: {
 	  left: 'prev,next today',
 	  center: 'title',
 	  right: 'month,agendaWeek,agendaDay'
 	},
     allDay: false,
      defaultView: 'month',
      displayEventTime: false,

 	events: <?php echo $events; ?>,

 	// Convert the allDay from string to boolean
 	eventRender: function(event) {
 	                  
          // element.find('.fc-event-title').html('<div><b>' + event.title + '</b></div><div>' + event.hostFname + ' ' + event.hostSname + '</div>');       
               
                
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


    
   //  dayClick: function(date, allDay, jsEvent, view) {
    //	 window.location = "add-event.php?startDate=" + $.fullCalendar.formatDate(date, "MM/dd/yyyy") + "&startTime=" + $.fullCalendar.formatDate(date, "HH:mm:ss");
    //	 },
    	 
     selectable: true,
     eventClick: function(event) {
    
     //   window.location = "view-event.php?id=" + event.id;
     
    
       // change the border color just for fun
      // $(this).css('border-color', 'red')
     }
   });
  })



/* Grab the textbox fields of the login form */

var ename = document.forms["editForm"]["tbEventName"];
var description = document.forms["editForm"]["tbEventDescription"];
var sDate = document.forms["editForm"]["tbStartDate"];
var eDate = document.forms["editForm"]["tbEndDate"];
var sTime = document.forms["editForm"]["tbStartTime"];
var eTime = document.forms["editForm"]["tbEndTime"];
// var mRoom = document.forms["editForm"]["ddlMeetingRoom"];
// var mHost = document.forms["editForm"]["ddlMeetingHost"];


 /* Grab the hidden/empty DIVs to present error messages  */
var nameError = document.getElementById("eventNameError");
var descriptionError = document.getElementById("eventDescriptionError");
var sdError = document.getElementById("startDateError");
var edError = document.getElementById("endDateError");
var stError = document.getElementById("startTimeError");
var etError = document.getElementById("endTimeError");
var roomError = document.getElementById("roomError");
var hostError = document.getElementById("hostError");


/* Initialize EVENT LISTENERS */
ename.addEventListener("blur", nameVerify, true);
description.addEventListener("blur", descVerify, true);
sDate.addEventListener("blur", sDateVerify, true);
eDate.addEventListener("blur", eDateVerify, true);
sTime.addEventListener("blur", sTimeVerify, true);
eTime.addEventListener("blur", eTimeVerify, true);
// mRoom.addEventListener("blur", mRoomVerify, true);
// mHost.addEventListener("blur", mHostVerify, true);



function eventUpdate(){
        
        if(ename.value == ""){
                      ename.style.border = "1px solid #ff0000";
                          nameError.textContent = "Event name is required!";
                              nameError.style.color = "#ff0000";
                                  ename.focus();
                                      return false;
                  }
      
               if(description.value == ""){
                    description.style.border = "1px solid #ff0000";
                    descriptionError.textContent = "Event Description is required!";
                    descriptionError.style.color = "#ff0000";
                              description.focus();
                                      return false;
                  }
      
                  if(sDate.value == ""){
                    sDate.style.border = "1px solid #ff0000";
                    sdError.textContent = "Event Start Date is required!";
                    sdError.style.color = "#ff0000";
                              sDate.focus();
                                      return false;
                  }
                  
                  if(eDate.value == ""){
                    eDate.style.border = "1px solid #ff0000";
                    edError.textContent = "Event End Date is required!";
                    edError.style.color = "#ff0000";
                            eDate.focus();
                                      return false;
                  }


                   if(sTime.value == ""){
                    sTime.style.border = "1px solid #ff0000";
                    stError.textContent = "Event Start Time is required!";
                    stError.style.color = "#ff0000";
                            sTime.focus();
                                      return false;
                  }

                   if(eTime.value == ""){
                    eTime.style.border = "1px solid #ff0000";
                    etError.textContent = "Event End Time is required!";
                    etError.style.color = "#ff0000";
                            eTime.focus();
                                      return false;
                  }

                      if(mRoom.value == ""){
                        mRoom.style.border = "1px solid #ff0000";
                        roomError.textContent = "Event Meeting Room is required!";
                        roomError.style.color = "#ff0000";
                            mRoom.focus();
                                      return false;
                  }
      
                  if(mHost.value == ""){
                    mHost.style.border = "1px solid #ff0000";
                    hostError.textContent = "Event Meeting Host is required!";
                    hostError.style.color = "#ff0000";
                             mHost.focus();
                                      return false;
                  }
      
      
              }
      
      



/* This function DEACTIVATES the error messages showcased once  */
    /* the INPUT field IS NOT BLANK! */
    function nameVerify() {
        if(ename.value != ""){
            ename.style.border = "0px solid #ff0000";
            nameError.innerHTML = "";
                    return true;
        }
    }

      function descVerify() {
        if(description.value != ""){
            description.style.border = "0px solid #ff0000";
            descriptionError.innerHTML = "";
                    return true;
        }
    }

      function sDateVerify() {
        if(sDate.value != ""){
            sDate.style.border = "0px solid #ff0000";
            sdError.innerHTML = "";
                    return true;
        }
    }

     function eDateVerify() {
        if(eDate.value != ""){
            eDate.style.border = "0px solid #ff0000";
            edError.innerHTML = "";
                    return true;
        }
    }

      function sTimeVerify() {
        if(sTime.value != ""){
            sTime.style.border = "0px solid #ff0000";
            stError.innerHTML = "";
                    return true;
        }
    }

    function eTimeVerify() {
        if(eTime.value != ""){
            eTime.style.border = "0px solid #ff0000";
            etError.innerHTML = "";
                    return true;
        }
    }

    function mRoomVerify(){
        if(mRoom.value != ""){
            mRoom.style.border = "0px solid #ff0000";
            roomError.innerHTML = "";
                    return true;
        }
    }

      function mHostVerify(){
        if(mHost.value != ""){
            mHost.style.border = "0px solid #ff0000";
            hostError.innerHTML = "";
                    return true;
        }
    }


</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>


<?php ob_end_flush(); ?>

