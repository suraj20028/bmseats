<?php 
    include('config.php');
    session_start();
    $name = $_SESSION['username'];
    $aid = $db->query("select aid from admin where username = '$name'");
    $h = $aid->fetch_array()[0] ?? '';
    //echo $h;
    $result = $db->query("SELECT * FROM cust where hid='$h' ");
    $data_record = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ORDER-DETAILS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery library -->
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include('navbar.php');?>
    <div class="row">

        <div class="col-md-4" style="margin-left:250px;">
            <h2>ORDERS</h2>
        </div>
    </div>
    <div class="row">

        <div class="col-md-4" style="margin-left:250px;MARGIN-BOTTOM:5PX;">
            <?php $apage = array('id'=>'',);?>
            <script>
            var page_0 = <?php echo json_encode($apage)?>
            </script>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>USER</th>
                        <th>UID</th>
                        <th>PID</th>
                        <th>QUANTITY</th>
                        <th>HID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($result) && ($data_record) > 0)  : $i=1; ?>
                    <?php  while ($users = mysqli_fetch_object($result)) { ?>

                    <tr class="<?=$users->uid?>_del">
                        <td><?=$name;?></td>
                        <td><?=$users->uid;?></td>
                        <td><?=$users->pid;?></td>
                        <td><?=$users->qty;?></td>
                        <td><?=$users->hid;?></td>
                        <script>
                        var page_<?php echo $users->hid ?> = <?php echo json_encode($users);?>
                        </script>

                    </tr>
                    <?php $i++; } ?>
                    <?php else : echo '<tr><td colspan="8"><div align="center">-------No record found -----</div></td></tr>'; ?>
                    <?php endif; ?>
                </tbody>
            </table>



            <!-- Ads and more  -->
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- header_responsive_ads -->
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9665679251236729"
                data-ad-slot="9239985429" data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>


        </div>
        <div class="col-md-2">

        </div>
    </div>



    <!-- End -->
</body>

</html>