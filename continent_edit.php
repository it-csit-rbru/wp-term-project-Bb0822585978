<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-6015261004-project</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: #82E0AA;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                     <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                <h3><marquee direction="left">CED 60</marquee></h3>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                <h4>แก้ไขทวีป</h4>    
                <?php
                    include 'connectdb.php';
                    if(isset($_GET['submit'])){
                        $ct_id     = $_GET['ct_id'];
                        $ct_name   = $_GET['ct_name'];
                        $sql        = "update continent set ct_name='$ct_name' where ct_id='$ct_id'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "แก้ไขทวีป $ct_name เรียบร้อยแล้ว<br>";
                        echo '<a href="continent_list.php">แสดงทวีปทั้งหมด</a>';
                    }else{
                        $fct_id = $_REQUEST['ct_id'];
                        $sql =  "SELECT * FROM continent where ct_id='$fct_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $fct_name = $row['ct_name'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    <form class="form-horizontal" role="form" name="continent_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="ct_id" id="ct_id" value="<?php echo "$fct_id";?>">
                        <div class="form-group">
                            <label for="ct_name" class="col-md-2 col-lg-2 control-label">ทวีป</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="ct_name" id="ct_name" class="form-control" value="<?php echo "$fct_name";?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div>
                    </form>
                <?php
                    }
                ?>
                </div>    
            </div>
            <div class="row">
                <address>นายชัยชนะ  คงอินทร์  6015261004</address>
                <address>คณะครุศาสตร์  สาขาคอมพิวเตอร์ศึกษา</address>
            </div>
