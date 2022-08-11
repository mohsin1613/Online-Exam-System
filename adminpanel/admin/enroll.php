

<?php include("/conn.php"); ?>
<!--pdf file add here -->
<?php
						// If submit button is clicked
						if(isset($_POST['submit']))
						{
						// get name from the form when submitted
						$name = $_POST['name'];					

						if (isset($_FILES['pdf_file']['name']))
						{
						// If the ‘pdf_file’ field has an attachment
							$file_name = $_FILES['pdf_file']['name'];
							$file_tmp = $_FILES['pdf_file']['tmp_name'];

							// Move the uploaded pdf file into the pdf folder
							move_uploaded_file($file_tmp,"./pdf/".$file_name);
							// Insert the submitted data from the form into the table
							$insertquery ="INSERT INTO question_tbl(title,pdf) VALUES('$name','$file_name')";
							// Execute insert query
							$iquery = $conn->query($insertquery);	
								if ($iquery)
							{							
					?>											
								<div class=
								"alert alert-success alert-dismissible fade show text-center">
									<a class="close" data-dismiss="alert" aria-label="close">
									</a>
									<strong>Success!</strong> Data submitted successfully.
								</div>
								<?php
								}
								else
								{
								?>
								<div class=
								"alert alert-danger alert-dismissible fade show text-center">
									<a class="close" data-dismiss="alert" aria-label="close">
									</a>
									<strong>Failed!</strong> Try Again!
								</div>
								<?php
								}
							}
							else
							{
							?>
								<div class=
								"alert alert-danger alert-dismissible fade show text-center">
								<a class="close" data-dismiss="alert" aria-label="close">
								</a>
								<strong>Failed!</strong> File must be uploaded in PDF format!
								</div>
							<?php
							}// end if
						}// end if
					?>

<!-- pdf file end here -->