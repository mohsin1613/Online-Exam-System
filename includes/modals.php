<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<!-- Modal For Add Course -->
<div class="modal fade" id="feedbacksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addFeebacks" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Messages</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Message AS</label><br>
            <?php 
               $selMe = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
             ?>
            <input type="radio" name="asMe" value="<?php echo $selMe['exmne_fullname']; ?>"> <?php echo $selMe['exmne_fullname']; ?> <br>
            <input type="radio" name="asMe" value="Anonymous"> Anonymous
            
          </div>
          <div class="form-group">
           <textarea name="myFeedbacks" class="form-control" rows="3" placeholder="Input your feedback here.."></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>

<div class="modal fade" id="enroll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addCourseFrm" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enrollment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Enrollment Here</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="" autocomplete="off">
            <input type="text" name="course" id="course" class="form-control" placeholder="Course" required="" autocomplete="off">
            <input type="number" name="stdid" id="stdid" class="form-control" placeholder="Student Id" required="" autocomplete="off">
            <input type="text" name="semester" id="semester" class="form-control" placeholder="Semester" required="" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Enroll Now</button>
      </div>
    </div>
   </form>
  </div>
</div>




<!-- view pdf here -->

<div class="modal fade" id="pdfview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-size">
   <form class="refreshFrm" method="post">
     <div class="modal-content modal-size" >
      <div class="modal-header">
        <h5 class="modal-title">Question PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mobody" >
    <?php
   $sel= $conn->query("SELECT * FROM question_tbl ORDER BY id DESC LIMIT 1 ")->fetch(PDO::FETCH_ASSOC);
  
    ?>
   <div class="embed-responsive embed-responsive-16by9"> 
   <iframe src="adminpanel/admin/pdf/<?php echo $sel['pdf'];?>" width="100%" height="100%"></iframe>
 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
   </form>
  </div>
</div>

<!-- view pdf end here -->


<!-- submit ans modal here -->

<!-- Modal For Add Question -->
<div class="modal fade" id="submitans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm"  enctype="multipart/form-data" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Submit Answer File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm"  method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label style="padding-right:25px"><b>Std Name</b></label>
            <input type="text" name="name" required=""><br/>
            <label style="padding-right:19px"><b>Student ID</b></label>
            <input type="number" name="stdid" required=""><br/>
            <label style="padding-right:3px"><b>Course Name</b></label>
            <input type="text" name="course" required=""> <br/>
            <label style="padding-right:19px"><b>File Upload</b></label>
            <input type="File" required="" name="pdf_file"> 
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
      </div>
      </form>
    </div>
   </form>
  </div>
</div>

<!-- submit modal end here -->

<!-- ans pdf file add here -->
<?php
						// If submit button is clicked
						if(isset($_POST['submit']))
						{
						// get name from the form when submitted
            $name = $_POST['name'];		
            $stdid = $_POST['stdid'];	
            $course = $_POST['course'];			
						if (isset($_FILES['pdf_file']['name']))
						{
						// If the ‘pdf_file’ field has an attachment
							$file_name = $_FILES['pdf_file']['name'];
							$file_tmp = $_FILES['pdf_file']['tmp_name'];

							// Move the uploaded pdf file into the pdf folder
							move_uploaded_file($file_tmp,"./Anspdf/".$file_name);
							// Insert the submitted data from the form into the table
							$insertquery ="INSERT INTO question_ans(name,stdid,course,pdf) VALUES('$name','$stdid','$course','$file_name')";
							// Execute insert query
							$iquery = $conn->query($insertquery);	
								if ($iquery)
							{	
                echo "File upload Successfully!!";
              }
              else{
                     echo "File not Upload Successfully!";
              }
            }
            
          }?>											
								
					
  
<!-- ans pdf file end here -->

