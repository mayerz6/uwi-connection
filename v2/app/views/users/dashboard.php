<?php include APPROOT . '/views/shared/header.php'; ?>

<?php include APPROOT . '/views/shared/navigation.php'; ?>

 <div class="container">
 
    <div class="greeting-screen"> 
        <div class="row"><?php flash('login_success'); ?></div>
            <h2 class="greeting">Welcome to Your BIPA Profile</h2>
    </div>


    <div class="container">
       <div class="row">
          
          <!-- RIGHT Region Content -->
         <div class="col-sm-12">
          
          <!-- resumt -->
        <div class="panel panel-default">

               <div class="panel-heading resume-heading">
                  <div class="row">
                    
                        <div class="col-md-4">
                           <figure>
                              <img class="img-circle img-responsive" alt="" src="<?php echo URLROOT; ?>/assets/images/default_photo.png">
                           </figure>
                          
                          
                           <a href="<?php echo URLROOT; ?>/users/edit" class="btn btn-default btn-block btn-compose-email">Edit Account</a>
       

                           <!--
                           <div class="row">
                              <div class="col-xs-12 social-btns">
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-google">
                                    <i class="fa fa-google"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-facebook">
                                    <i class="fa fa-facebook"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-twitter">
                                    <i class="fa fa-twitter"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-linkedin">
                                    <i class="fa fa-linkedin"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-github">
                                    <i class="fa fa-github"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-stackoverflow">
                                    <i class="fa fa-stack-overflow"></i> </a>
                                 </div>
                              </div>
                           </div>
                           //-->
                        </div>
                        <div class="col-md-8">
                           <ul class="list-group">
                              <li class="list-group-item"><?php echo (!empty($data['f_name'])) ? $data['f_name'] : ''; ?> <?php echo (!empty($data['s_name'])) ? $data['s_name'] : ''; ?></li>
                              <li class="list-group-item"><?php echo (!empty($data['memDes'])) ? $data['memDes'] : ''; ?></li>
                              <li class="list-group-item"><?php echo (!empty($data['memCat'])) ? $data['memCat'] : ''; ?></li>
                              <li class="list-group-item"><i class="fa fa-phone"></i> <?php echo (!empty($data['mobile'])) ? $data['mobile'] : ''; ?> </li>
                              <li class="list-group-item"><i class="fa fa-envelope"></i> <?php echo (!empty($data['email'])) ? $data['email'] : ''; ?></li>
                           </ul>
                        </div>
                     
                  </div>
               </div>

                     <!--
               <div class="bs-callout bs-callout-danger">
                  <h4>Summary</h4>
                  <p>
                     Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu, 
                     te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                  </p>
                  <p>
                     Odio recteque expetenda eum ea, cu atqui maiestatis cum. Te eum nibh laoreet, case nostrud nusquam an vis. 
                     Clita debitis apeirian et sit, integre iudicabit elaboraret duo ex. Nihil causae adipisci id eos.
                  </p>
               </div>
           
               <div class="bs-callout bs-callout-danger">
                  <h4>Research Interests</h4>
                  <p>
                     Software Engineering, Machine Learning, Image Processing,
                     Computer Vision, Artificial Neural Networks, Data Science,
                     Evolutionary Algorithms.
                  </p>
               </div>
            
               <div class="bs-callout bs-callout-danger">
                  <h4>Prior Experiences</h4>
                  <ul class="list-group">
                     <a class="list-group-item inactive-link" href="#">
                        <h4 class="list-group-item-heading">
                           Software Engineer at Twitter
                        </h4>
                        <p class="list-group-item-text">
                           Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu, 
                           te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                        </p>
                     </a>
                     <a class="list-group-item inactive-link" href="#">
                        <h4 class="list-group-item-heading">Software Engineer at LinkedIn</h4>
                        <p class="list-group-item-text">
                           Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. 
                           Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, 
                           nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                        </p>
                        <ul>
                           <li>
                              Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. 
                              Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, 
                              nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                           </li>
                           <li>
                              Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. 
                              Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, 
                              nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                           </li>
                        </ul>
                        <p></p>
                     </a>
                  </ul>
               </div>
               

               <div class="bs-callout bs-callout-danger">
                  <h4>Key Expertise</h4>
                  <ul class="list-group">
                     <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc </li>
                     <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                     <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                     <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                     <li class="list-group-item">Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                     <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                  </ul>
               </div>
               //-->

               <div class="bs-callout bs-callout-danger">
                  <h4>Membership Term</h4>
                  <table style="width=100%; table-layout: fixed;" class="table table-striped table-responsive ">
                     <thead>
                        <tr>
                           <th>Date of Application</th>
                           <th>Date of Admission</th>
                           <th>Date of Renewal</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <?php  

                              if($data['app_date'] <= $data['admit']){
                                 $admit = $data['admit'];
                                 $res = $data['resign'];
                              } else {
                                 $admit = "Pending";     
                                 $res ="";
                                                       }

                           ?>
                           <td><b><?php echo (!empty($data['app_date'])) ? $data['app_date'] : ''; ?></b></td>
                           <td><b><?php echo (!empty($admit)) ? $admit : ''; ?></b></td>
                           <td><b><?php  echo (!empty($res)) ? $res : ''; ?></b></td>
                        </tr>
                      <!--  <tr>
                           <td>BSc. in Computer Science and Engineering</td>
                           <td>2011</td>
                           <td> 3.25 </td>
                        </tr>   -->
                     </tbody>
                  </table>
               </div>

               <div class="bs-callout bs-callout-danger">
                  <h4>Language and Platform Skills</h4>
                  <ul class="list-group">
                     <a class="list-group-item inactive-link" href="#">
                        <div class="progress">
                           <div data-placement="top" style="width: 80%;" 
                              aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">80%</span>
                              <span class="progress-type">Java/ JavaEE/ Spring Framework </span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">70%</span>
                              <span class="progress-type">PHP/ Lamp Stack</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">70%</span>
                              <span class="progress-type">JavaScript/ NodeJS/ MEAN stack </span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 65%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">65%</span>
                              <span class="progress-type">Python/ Numpy/ Scipy</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">60%</span>
                              <span class="progress-type">C</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 50%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">50%</span>
                              <span class="progress-type">C++</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 10%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">10%</span>
                              <span class="progress-type">Go</span>
                           </div>
                        </div>
                        <div class="progress-meter">
                           <div style="width: 25%;" class="meter meter-left"><span class="meter-text">I suck</span></div>
                           <div style="width: 25%;" class="meter meter-left"><span class="meter-text">I know little</span></div>
                           <div style="width: 30%;" class="meter meter-right"><span class="meter-text">I'm a guru</span></div>
                           <div style="width: 20%;" class="meter meter-right"><span class="meter-text">I''m good</span></div>
                        </div>
                     </a>
                  </ul>
               </div>




            </div>
         </div>
       <!-- RIGHT Region Content -->

         <!-- LEFT Region Content -->
  <!--
        <div class="col-sm-3">
        
           <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
            <li class="active">
                <a href="#mail-inbox.html">
                    <i class="fa fa-inbox"></i> Inbox  <span class="label pull-right">7</span>
                </a>
            </li>
            <li>
                <a href="#mail-compose.html"><i class="fa fa-envelope-o"></i> Send Mail</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-certificate"></i> Important</a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-file-text-o"></i> Drafts <span class="label label-info pull-right inbox-notification">35</span>
                </a>
            </li>
            <li><a href="#"> <i class="fa fa-trash-o"></i> Trash</a></li>
        </ul>
        
        //-->
        <!-- /.nav -->
                                                         <!--
        <h5 class="nav-email-subtitle">More</h5>
        <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
            <li>
                <a href="#">
                    <i class="fa fa-folder-open"></i> Promotions  <span class="label label-danger pull-right">3</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-folder-open"></i> Job list
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-folder-open"></i> Backup
                </a>
            </li>
        </ul>
        //-->
        <!-- /.nav -->
    </div>
   
<!-- LEFT Region Content -->



    </div>
</div>
</div>

</div>


<br />
<br />

<?php include APPROOT . '/views/shared/footer.php';  ?>

<br />
<br />