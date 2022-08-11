<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>ANNOUNCEMENT</div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Realtime Clarification of Exam
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Announcement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selExmne = $conn->query("SELECT * FROM message_tbl order by id asc");
                            if ($selExmne->rowCount() > 0) {
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $selExmneRow['id']; ?></td>
                                        <td>
                                            <?php
                                            echo $selExmneRow['message'];
                                            ?>
                                        </td>
                                       
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="2">
                                        <h3 class="p-3">No Message Found</h3>
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