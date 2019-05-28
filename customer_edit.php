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
                <div class="jumbotron" style="background-color: #76D7C4;">
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
                    <h4>แก้ไขข้อมูลลูกค้า</h4>
                    <?php
                        $ctm_id = $_REQUEST['ctm_id'];
                        if(isset($_GET['submit'])){
                            $ctm_id = $_GET['ctm_id'];
                            $ctm_g_id = $_GET['ctm_g_id'];
                            $ctm_fname = $_GET['ctm_fname'];
                            $ctm_lname = $_GET['ctm_lname'];
                            $ctm_age = $_GET['ctm_age'];
                            $sql = "update customer set ";
                            $sql .= "ctm_lname='$ctm_lname',ctm_fname='$ctm_fname',ctm_g_id='$ctm_g_id',ctm_age='$ctm_age' ";
                            $sql .="where ctm_id='$ctm_id' ";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "แก้ไขข้อมูลลูกค้า $ctm_fname $ctm_lname เรียบร้อยแล้ว<br>";
                            echo '<a href="customer_list.php">แสดงรายชื่อลูกค้าทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="customer_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <input type="hidden" name="ctm_id" id="ctm_id" value="<?php echo "$ctm_id";?>">
                            <label for="ctm_g_id" class="col-md-2 col-lg-2 control-label">เพศ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="ctm_g_id" id="ctm_g_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from customer where ctm_id='$ctm_id'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $ctm_fname = $row2['ctm_fname'];
                                    $ctm_lname = $row2['ctm_lname'];
                                    $ctm_age = $row2['ctm_age'];
                                    $ctm_g_id = $row2['ctm_g_id'];
                                    $sql =  "SELECT * FROM gender order by g_id";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['g_id'].'"';
                                        if($row['g_id']==$ctm_g_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['g_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="ctm_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="ctm_fname" id="ctm_fname" class="form-control" 
                                       value="<?php echo $ctm_fname;?>">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="ctm_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="ctm_lname" id="ctm_lname" class="form-control" 
                                       value="<?php echo $ctm_lname;?>">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <label for="ctm_age" class="col-md-2 col-lg-2 control-label">อายุ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="ctm_age" id="ctm_age" class="form-control" 
                                       value="<?php echo $ctm_age;?>">
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
                <address>คณะวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ</address>
            </div>
