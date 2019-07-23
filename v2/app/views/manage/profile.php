<?php include APPROOT . '/views/shared/header.php'; ?>

<?php include APPROOT . '/views/shared/navigation.php'; ?>

<div class="container profile">

<h2>Admin Access Only</h2>


<div class="row"><?php flash('register_success'); ?></div>

<div class="row">
    

    <?php 

   for($i=0; $i<sizeof($data); $i++){
   
        $memCat = '';
        $memStat = '';

        if($data[$i]["status"] == 0){
            $memStat = "Inactive Member";
        } else {
            $memStat = "Active Member";
        }

        switch($data[$i]["user_cat"]){
            case 1:
                $memCat = "Affilitate Member";
                    break;
            case 2: 
                $memCat = "Student Member";
                    break;
            case 3:
                $memCat = "Professional Member";        
                    break;
            case 4: 
                $memCat = "Corporate Member";        
                    break;

        }

   echo "<div class='col-md-4'>";
   echo "<div class='card card-articles'>";
   echo "<div class='card-body'>";
   echo "<h4 class='h2 mb-0 text-gray-200'>" . $data[$i]["f_name"] . " " . $data[$i]["s_name"] . "</h4>";
   echo "<small>" . $memCat . "</small><br />";
   echo "<div class='card-footer'>Gender - <b>" . $data[$i]["gender"] . "<br /></b>Status - <b>" . $memStat . "</b><br /></div>";
   echo "<a class='btn btn-secondary' href='" . URLROOT . "/manage/editAccount/" . $data[$i]["id"] . "'>Manage</a><a class='btn btn-danger' href='" . URLROOT . "/manage/deleteAccount/" . $data[$i]["id"] . "'>Remove</a>";
   echo "</div>";
   echo "</div>";
   echo "</div>";
   }
   
   ?>

</div>

<hr />
    <!-- Profile UPDATE Form -->

    </div>

<?php require APPROOT . "/views/shared/footer.php"; ?>
