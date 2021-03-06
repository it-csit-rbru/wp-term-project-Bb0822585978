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
                    <h4>แสดงรายการสั่งซื้อ</h4>
                    <a href="buy_add.php" class="btn btn-link">เพิ่มข้อมูลการสั่งซื้อ</a>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>รหัสการสั่งซื้อ</th>
                                    <th>จำนวนการสั่งซื้อ</th>                                    
                                    <th>ยอดรวมการสั่งซื้อ</th>
                                    <th>ทวีปที่สั่งซื้อ</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                    <?php
                        include 'connectdb.php';                        
                        $sql =  'SELECT * FROM buy_detail order by b_id';
                        $result = mysqli_query($conn,$sql);
                        while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                            echo '<tr>';
                            echo '<td>' . $row['b_id'] . '</td>';
                            echo '<td>' . $row['b_num']. '</td>';                      
                            echo '<td>' . $row['b_total'] . '</td>';                            
                            echo '<td>' . $row['ct_name'] . '</td>';                                                                            
                            echo '<td>';
                            ?>
                                <a href="buy_edit.php?b_id=<?php echo $row['b_id'];?>" class="btn btn-warning">แก้ไข</a>
                                <a href="JavaScript:if(confirm('ยืนยันการลบ')==true)
                                   {window.location='buy_delete.php?b_id=<?php echo $row["b_id"];?>'}" class="btn btn-danger">ลบ</a>
                            <?php
                                    echo '</td>';                            
                            echo '</tr>';
                        }
                        mysqli_free_result($result);
                        echo '</table>';
                        mysqli_close($conn);
                    ?>
                            </tbody>
                        </table>    
                </div>    
            </div>
            <div class="row">
                <address>นายชัยชนะ  คงอินทร์  6015261004</address>
                <address>คณะครุศาสตร์  สาขาคอมพิวเตอร์ศึกษา</address>
            </div>
