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
                <div class="jumbotron" style="background-color: #85C1E9;">
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
                    <h4>แก้ไขข้อมูลการสั่งซื้อ</h4>
                    <?php
                        $b_id = $_REQUEST['b_id'];
                        if(isset($_GET['submit'])){
                            $b_id = $_GET['b_id'];
                            $b_ct_id = $_GET['b_ct_id'];
                            $b_num = $_GET['b_num'];
                            $b_total = $_GET['b_total'];
                            $sql = "update buy set ";
                            $sql .= "b_num='$b_num',b_total='$b_total',b_ct_id='$b_ct_id' ";
                            $sql .="where b_id='$b_id' ";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "แก้ไขข้อมูลการสั่งซื้อ $b_num $b_total เรียบร้อยแล้ว<br>";
                            echo '<a href="buy_list.php">แสดงรายการสั่งซื้อทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="buy_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <input type="hidden" name="b_id" id="b_id" value="<?php echo "$b_id";?>">
                            <label for="b_ct_id" class="col-md-2 col-lg-2 control-label">การสั่งซื้อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="b_ct_id" id="b_ct_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from buy where b_id='$b_id'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $b_num = $row2['b_num'];
                                    $b_total = $row2['b_total'];
                                    $b_ct_id = $row2['b_ct_id'];
                                    $sql =  "SELECT * FROM continent order by ct_id";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ct_id'].'"';
                                        if($row['ct_id']==$b_ct_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['ct_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="b_num" class="col-md-2 col-lg-2 control-label">จำนวนการสั่งซื้อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="b_num" id="b_num" class="form-control" 
                                       value="<?php echo $b_num;?>">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="b_total" class="col-md-2 col-lg-2 control-label">ยอดรวมการสั่งซื้อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="b_total" id="b_total" class="form-control" 
                                       value="<?php echo $b_total;?>">
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
