<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                
            <!--add here-->
            <li class="app-sidebar__heading">AVAILABLE EXAMS</li>
            <li>
                <a href="#">
                     <i class="metismenu-icon pe-7s-display2"></i>
                    ALL Exams
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul >
                    <?php 
                        
                        if($selExam->rowCount() > 0)
                        {
                            while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                 <li>
                                 <a href="#" id="startQuiz" data-id="<?php echo $selExamRow['ex_id']; ?>"  >
                                    <?php 
                                        $lenthOfTxt = strlen($selExamRow['ex_title']);
                                        if($lenthOfTxt >= 23)
                                        { ?>
                                            <?php echo substr($selExamRow['ex_title'], 0, 20);?>.....
                                        <?php }
                                        else
                                        {
                                            echo $selExamRow['ex_title'];
                                        }
                                     ?>
                                 </a>
                                 </li>
                            <?php }
                        }
                        else
                        { ?>
                            <a href="#">
                                <i class="metismenu-icon"></i>No Exam's @ the moment
                            </a>
                        <?php }
                     ?>


                </ul>
                </li>

            <!--end of edit1-->
                <li class="app-sidebar__heading">ENROLLMENT OF EXAM'S</li>
                <li>
                <a href="#">
                     <i class="metismenu-icon pe-7s-display2"></i>
                     ALL Exams
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul >
                    <?php 
                        
                        if($allexam->rowCount() > 0)
                        {
                            while ($allexamrow = $allexam->fetch(PDO::FETCH_ASSOC)) { ?>
                                 <li>
                                 <a href="#" data-toggle="modal" data-target="#enroll" data-id="<?php echo $allexamrow['ex_id']; ?>"  >
                                    <?php 
                                        $lenthOfTxt = strlen($allexamrow['ex_title']);
                                        if($lenthOfTxt >= 23)
                                        { ?>
                                            <?php echo substr($allexamrow['ex_title'], 0, 20);?>.....
                                        <?php }
                                        else
                                        {
                                            echo $allexamrow['ex_title'];
                                        }
                                     ?>
                                 </a>
                                 </li>
                            <?php }
                        }
                        else
                        { ?>
                            <a href="#">
                                <i class="metismenu-icon"></i>No Exam's @ the moment
                            </a>
                        <?php }
                     ?>


                </ul>
                </li>

                 <li class="app-sidebar__heading">TAKEN EXAM'S</li>
                <li>
                  <?php 
                    $selTakenExam = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id WHERE exmne_id='$exmneId' ORDER BY ea.examat_id  ");

                    if($selTakenExam->rowCount() > 0)
                    {
                        while ($selTakenExamRow = $selTakenExam->fetch(PDO::FETCH_ASSOC)) { ?>
                            <a href="home.php?page=result&id=<?php echo $selTakenExamRow['ex_id']; ?>" >
                               
                                <?php echo $selTakenExamRow['ex_title']; ?>
                            </a>
                        <?php }
                    }
                    else
                    { ?>
                        <a href="#" class="pl-3">You are not taking exam yet</a>
                    <?php }
                    
                   ?>

                    
                </li>
                 
                <li class="app-sidebar__heading">QUESTIONS</li>
                <li>
                    <a href="#"  data-toggle="modal" data-target="#pdfview"  style="padding-left:10px;margin-left:10px;">
                        <i class="fa fa-university" style="padding-right:5px"></i>  View Question                      
                    </a>
                    <a href="#" data-toggle="modal" data-target="#submitans" style="padding-left:10px;margin-left:10px;" >
                    <i class="fa fa-university" style="padding-right:5px;"></i>   Submit Answer                      
                    </a>
                </li>

                <li class="app-sidebar__heading">Exam Result</li>
                <li>
                    <a href="home.php?page=exam-result">
                    <i class="metismenu-icon pe-7s-cup">
                    </i> Result Sheet                  
                    </a>
                  
                </li>
                <li class="app-sidebar__heading">Announcement</li>
                <li>
                    <a href="home.php?page=message">
                    <i class="metismenu-icon pe-7s-cup">
                    </i> Clarification                 
                    </a>
                </li>
  
                <li class="app-sidebar__heading">SEND MESSAGE</li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#feedbacksModal" >
                    <i class="metismenu-icon pe-7s-chat"></i> Add Message                        
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>  

<!-- enrollment  -->
<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    
    $name=$_POST['name'];
    $course=$_POST['course'];
    $stdid=$_POST['stdid'];
    $semester=$_POST['semester'];
   if(isset($semester)){
 	$insFedd = $conn->query("INSERT INTO enroll_tbl(name,course,stdid,semester) VALUES('$name','$course','$stdid','$semester') ");

     if($insFedd)
 	{
 		echo "Enroll Successful!!";
 	}
 	else
 	{
 		echo "Enroll No Successful!";
 	}
}
}
?>

<!-- end  -->

<!--  -->