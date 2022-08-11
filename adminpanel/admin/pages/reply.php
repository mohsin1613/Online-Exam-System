<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div><b>REPLY OF MESSAGES</b></div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <header class="card-header">
                    <div class="text-center">Reply Here</div>
                </header>

                <div align="center">
                    <form action="" method="post">
                        <textarea name="content" rows="5" cols="90"></textarea> <br><br>
                        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Send Message"><br><br>
                    </form>
                </div>
            </div>
        </div>

    </div>

    
    <?php 
                    if(isset($_POST['submit']) && isset($_POST["content"])){
                      $message=$_POST['content'];
                      $sql=$conn->query("INSERT INTO message_tbl (message) values('$message')");
                      if($sql){
                        echo "<span>Message Send Successfully!!</span>";
                      }
                      else{
                        echo "<span>Message Not Send!!</span>";
                      }
                      

                    }
                    
                    ?>