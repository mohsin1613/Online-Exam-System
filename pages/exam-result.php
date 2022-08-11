<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>EXAMINEE RESULT</div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Examinee Result
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Student ID</th>
                                <th>Course</th>
                                <th>Mark</th>
                                <th>Percent(%)</th>
                                <!-- <th width="10%"></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selExmne = $conn->query("SELECT * FROM question_ans order by course asc");
                            if ($selExmne->rowCount() > 0) {
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $selExmneRow['name']; ?></td>
                                        <td>
                                            <?php
                                            echo $selExmneRow['stdid'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $selExmneRow['course'];
                                            ?>
                                        </td>
                                        <td>
                                            <span>
                    
                                                <?php
                                               echo $selExmneRow['mark'];
                                                ?>
                                            </span>/50
                                        </td>
                                        <td>
                                            <span style="color:green; font-weight:bold;">
                                                <?php
                                                $score = floatval($selExmneRow['mark']);
                                                $ans = $score /50.0* 100;
                                                if($ans >=50){
                                                  echo $ans;
                                                // echo "$ans";
                                                echo "%";
                                                } else {
                                                ?>
                                            </span>
                                                <span style="color:red; font-weight:bold"><?php echo $ans."%"; ?></span>  <?php  } ?>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
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