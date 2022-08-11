<?php 
  include("../../../conn.php");
  $id = $_GET['view'];
    $sel= $conn->query("SELECT * FROM question_ans WHERE id='$id' ")->fetch(PDO::FETCH_ASSOC);

?>

  <!-- view pdf end here -->
  <fieldset style="width:800px;height:600px;" >
  <div style="height: 600px; width: 800px;" > 
     <iframe src="../../Anspdf/<?php echo $sel['pdf']; ?>" width="100%" height="100%"></iframe>
   </div>
</fieldset>
