<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE Teacher</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Teacher List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Course</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExmne = $conn->query("SELECT * FROM teacher_tbl ORDER BY id ASC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selExmneRow['fullname']; ?></td>
                                           <td><?php echo $selExmneRow['department']; ?></td>
                                           <td><?php echo $selExmneRow['designation']; ?></td>
                                           <td>
                                            <?php echo $selExmneRow['course']; ?>
                                            </td>
                                           <td><?php echo $selExmneRow['email']; ?></td>
                                           <td><?php echo $selExmneRow['phone']; ?></td>
                                           <td>
                                               <a rel="facebox" href="facebox_modal/updateTeacher.php?id=<?php echo $selExmneRow['id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                               <a rel="facebox" href="facebox_modal/updateTeacher.php?delid=<?php echo $selExmneRow['id']; ?>" class="btn btn-sm btn-primary">Delete</a>
                                           </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Course Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
