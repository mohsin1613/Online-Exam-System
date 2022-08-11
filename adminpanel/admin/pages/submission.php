<?php //error_reporting (E_ALL ^ E_NOTICE);

?>


<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>EXAMINEES SUBMISSION</div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Submission List
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Student ID</th>
                                <th style="padding-left: 19px;">Action</th>
                                <th style="padding-left:120px;">Score</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php
                            $selExmne = $conn->query("SELECT * FROM question_ans ");
                            if ($selExmne->rowCount() > 0) {
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $selExmneRow['name']; ?></td>
                                        <td><?php echo $selExmneRow['course']; ?></td>
                                        <td><?php echo $selExmneRow['stdid']; ?></td>
                                        <td>
                                            <a rel="facebox" href="facebox_modal/viewsolution.php?view=<?php echo $selExmneRow['id']; ?>" class="btn btn-sm btn-primary">View Solution</a>
                                        </td>
                                        <td class="text-center">
                                            <form method="post">
                                                <input type="number" name="mark" placeholder="Marks">
                                                <a href="#?mid=<?php echo $selExmneRow['id']; ?>"><input type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary"></a>
                                            </form>
                                        </td>
                                        

                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="2">
                                        <h3 class="p-3">NO EXAMINEE FOUND</h3>
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


    
<!-- Start Here -->
<?php

if (isset($_post['submit']) && isset($_post['mark'])) {
    $id = $_post['mid'];
    $mark = $_POST['mark'];
    $sql = $conn->query("UPDATE question_ans SET mark='$mark' WHERE id='$id'");

    if ($sql) {
        echo "Successfully!";
    } else { ?>
        <script type="text/javascript">
            toastr.success('Have Fun')
        </script>
<?php
    }
}

?>

<!-- End here -->