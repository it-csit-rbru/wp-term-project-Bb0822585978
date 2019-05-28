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
                    <h4>เพิ่มข้อมูลการสั่งซื้อ</h4>
                    <?php
                        if(isset($_GET['submit'])){                            
                            $b_id = $_GET['b_id'];
                            $b_num = $_GET['b_num'];
                            $b_total = $_GET['b_total'];                            
                            $b_ct_id = $_GET['b_ct_id'];                            
                            $sql = "insert into buy";
                            $sql .= " values (null,'$b_num','$b_total','$b_ct_id')";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มลูกค้า $b_num   เรียบร้อยแล้ว<br>";
                            echo '<a href="buy_list.php">แสดงรายชื่อลูกค้าทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="buy_add" action="<?php echo $_SERVER['PHP_SELF'];?>">                    
                        <div class="form-group">
                            <label for="b_id" class="col-md-2 col-lg-2 control-label">รหัสการสั่งซื้อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="b_id" id="b_id" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <label for="b_num" class="col-md-2 col-lg-2 control-label">จำนวนการสั่งซื้อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="b_num" id="b_num" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="b_total" class="col-md-2 col-lg-2 control-label">ยอดรวมการสั่งซื้อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="b_total" id="b_total" class="form-control">
                            </div>    
                        </div> 
                        
                        <div class="form-group">
                            <label for="b_ct_id" class="col-md-2 col-lg-2 control-label">ทวีปที่สั่งซื้อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="b_ct_id" id="b_ct_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM continent order by ct_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ct_id'] . '">';
                                        echo $row['ct_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
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
