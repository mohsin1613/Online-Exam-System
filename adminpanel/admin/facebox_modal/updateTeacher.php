
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selExmne = $conn->query("SELECT * FROM teacher_tbl WHERE id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<div style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update <b>( <?php echo strtoupper($selExmne['fullname']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
<form method="post">
     <div class="form-group">
        <legend>Fullname</legend>
        <input type="text" name="fullname" class="form-control" required="" value="<?php echo $selExmne['fullname']; ?>" >
     </div>

     <div class="form-group">
        <legend>Department</legend>
        <input type="text" name="department" class="form-control" required="" value="<?php echo $selExmne['department']; ?>" >
     </div>

     <div class="form-group">
        <legend>Designation</legend>
        <input type="text" name="designation" class="form-control" required="" value="<?php echo $selExmne['designation']; ?>"/>
     </div>

     <div class="form-group">
        <legend>Course</legend>
        <input type="text" name="course" class="form-control" required="" value="<?php echo $selExmne['course']; ?>"/>
     </div>

     <div class="form-group">
        <legend>Email</legend>
        <input type="email" name="email" class="form-control" required="" value="<?php echo $selExmne['email']; ?>" >
     </div>

     <div class="form-group">
        <legend>Phone</legend>
        <input type="text" name="number" class="form-control" required="" value="<?php echo $selExmne['phone']; ?>" >
     </div>
  <div class="form-group" align="right">
    <button type="submit" name="submit" class="btn btn-sm btn-primary">Update Now</button>
  </div>
</form>


<!--start here -->
<?php 
 if(isset($_POST['submit']) && isset($_POST['fullname']) && isset($_POST['department']) && isset($_POST['designation']) && isset($_POST['course']) && isset($_POST['email']) && isset($_POST['number']))
{

    $fullname=$_POST['fullname'];
    $department=$_POST['department'];
    $designation=$_POST['designation'];
    $course=$_POST['course'];
    $email=$_POST['email'];
    $phone=$_POST['number'];
  $sql=$conn->query(" UPDATE teacher_tbl SET
   name='$fullname',
   department='$department',
   designation='$designation',
   course='$course',
   email='$email',
   phone='$phone'
 WHERE id='$id'
   ");
if($sql) {
  echo "Update Successfully!";
}
else {
    echo "Update Not Found!";
}

}

$delsql=$conn->query("DELETE FROM teacher_tbl WHERE id='$id'");

?>

<!-- end here -->







  </div>
</div>



