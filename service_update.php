<?php
session_start();
if (!$_SESSION['user_name']) {
    header('Location: login.php');
}
$user_name = $_SESSION['user_name'];
//echo $user_name;
require 'Connection/conn.php';
$sql_user  = "SELECT * FROM user_account WHERE user_phone_no = '$user_name'";
$sql_user_query = mysqli_query($conn, $sql_user);
while ($user_row = mysqli_fetch_assoc($sql_user_query)) {
    $id = $user_row['user_id'];
    $name = $user_row['user_name'];
    $email = $user_row['user_email'];
    $phone_number = $user_row['user_phone_no'];
    $today = date("d-m-Y");
    $time  = date("h : i : sa");

}
$cust_id = $_GET['cust_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon_io/favicon-32x32.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/1074.css">
    <link rel="stylesheet" href="css/960.css">
    <link rel="stylesheet" href="css/600.css">
    <script src="js/javascript.js"></script>
    <title>Service Update<?php echo ' '. $name ?></title>
</head>

<body>
    <!-- User Image and company Icon -->
    <?php include('navbar.php'); ?>
    <!-- User Image and company Icon End-->

    <!-- Page Content Section Starts -->
    <div class="container">
        <section class="content">
            <!-- This is the Side Menu Bar -->
            <!-- End of One Side Mene bar  -->
        </section>
        <!-- Working area section starts from here -->
        <section class="work-area">
            <!-- Sub Navigation Menu bar -->
            <div class="sub-nav-menu">
                <ul>
                    <li><a href="service_form.php">New Service</a></li><span class="span">|</span>
                    <li><a href="service_search.php">Search</a></li><span class="span">|</span>
                    <li><a href="filter_service.php">Status</a></li><span class="span">|</span>
                </ul>
            </div>
            <!-- Sub Navigation Menu bar End-->
            <div class="pages">
                <!-- <div class="slid-bar">
                <marquee behavior="slide" direction="left" scrollamount="5">
                    <p><strong><?php //echo $name ?></strong></p>
                    </marquee>
                </div> -->
                <div class="border">
                    <div class="income" style="width:750px">
                        <div class="signup-header">
                            <img src="img/form.png" alt="Application_image" class="header-image">
                            <p class="form-heading">Update Service Status</p>
                        </div>
                        <?php
$sql = "SELECT * FROM cyber_work WHERE customer_id='$cust_id'";
$data_query = mysqli_query($conn, $sql);
$data_fields = mysqli_fetch_assoc($data_query);
$customer_id =  $data_fields['customer_id'];
?>
                        <form action="" method="POST">
                            <div class="row">
                                <span><label for="customerid">Customer ID : </label></span>
                                <span><label><?php echo $customer_id ?>
                                    </label></span>
                            </div>
                            <div class="row">
                                <!--form row-->
                                <div class="row">
                                    <!--form row-->
                                    <div class="col-25">
                                        <span><label for="service">Application Type :</label></span>
                                    </div>
                                    <?php
                                $service = mysqli_query($conn,"SELECT * FROM service_list");
                                ?>
                                    <div class="col-25">
                                        <select name="service" id="service" required>
                                            <option value="<?php echo $data_fields['services']; ?>">
                                                <?php echo $data_fields['services']; ?></option>
                                            <?php 
                                        while($ser = mysqli_fetch_assoc($service)){ ?>
                                            <option value="<?php  echo $ser['service_name']; ?>">
                                                <?php  echo $ser['service_name']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="col-25">
                                        <span><label for="rdate">Recieved Date : </label></span>
                                    </div>
                                    <div class="col-25">
                                        <input type="date" name="rdate" id="rdate"
                                            value="<?php echo $data_fields['received_on']; ?>">
                                    </div>
                                    <div class="col-25">
                                        <span><label for="cname">Customer Name :</label></span> <span
                                            class="important">*</span>
                                    </div>
                                    <div class="col-25">
                                        <input type="text" name="cname" id="cname"
                                            value="<?php echo $data_fields['customer_name']; ?>"
                                            placeholder="Enter Name" required onkeydown="upperCaseF(this)">
                                    </div>
                                    <div class="col-25">
                                        <span><label for="dob">Date of Birth : </label></span><span
                                            class="important">*</span>
                                    </div>
                                    <div class="col-25">
                                        <input type="date" name="dob" id="dob"
                                            value="<?php echo $data_fields['dob']; ?>" required>
                                    </div>
                                    <div class="col-25">
                                        <span><label for="dob">Applied Date : </label></span><span
                                            class="important">*</span>
                                    </div>
                                    <div class="col-25">
                                        <input type="date" name="adate" id="dob"
                                            value="<?php echo $data_fields['applied_on']; ?>" required>
                                    </div>
                                    <div class="col-25">
                                        <span><label for="mno">Mobile No : </label></span><span
                                            class="important">*</span>
                                    </div>
                                    <div class="col-25">
                                        <input type="number" name="mno" id="mno"
                                            value="<?php echo $data_fields['mobile_no']; ?>" required>
                                    </div>

                                    <div class="col-25">
                                        <span><label for="ackno">Ack No : </label></span><span
                                            class="important">*</span>
                                    </div>
                                    <div class="col-25">
                                        <input type="text" id="ackno" name="ackno"
                                            value="<?php echo $data_fields['ack_no']; ?>" required
                                            onkeydown="upperCaseF(this)">
                                    </div>
                                    <div class="col-25">
                                        <span><label for="docno">Document No :</label></span>
                                    </div>
                                    <div class="col-25">
                                        <input type="text" id="docno" name="docno"
                                            value="<?php echo $data_fields['document_no']; ?>"
                                            onkeydown="upperCaseF(this)">
                                    </div>

                                    <div class="col-25">
                                        <span><label for="ano">Total Amount : </label></span><span
                                            class="important">*</span>
                                    </div>
                                    <div class="col-25">
                                        <input type="number" id="amount" name="ano"
                                            value="<?php echo $data_fields['total_amount']; ?>" required>
                                    </div>
                                    <div class="col-25">
                                        <span><label for="paid">Amount Paid : </label></span><span
                                            class="important">*</span>
                                    </div>
                                    <div class="col-25">
                                        <input type="number" id="paid" name="paid"
                                            value="<?php echo $data_fields['amount_paid']; ?>" required
                                            onblur="balance()">
                                    </div>
                                    <div class="col-25">
                                        <span><label for="bal">Balance : </label></span>
                                    </div>
                                    <div class="col-25">
                                        <input type="number" id="bal" name="bal"
                                            value="<?php echo $data_fields['balance']; ?>" required readonly>
                                    </div>
                                    <div class="col-25">
                                        <span><label for="status">Statuse : </label></span><span
                                            class="important">*</span>
                                    </div>
                                    <?php
                                $query = "SELECT * FROM status";
                                $d_query = mysqli_query($conn, $query);
?>
                                    <div class="col-25">
                                        <select name="status" id="status" required>

                                            <option value="<?php echo $data_fields['status']; ?>">
                                                <?php echo $data_fields['status']; ?></option>
                                            <?php
                                      while($field = mysqli_fetch_assoc($d_query)){
                                ?>
                                            <option value="<?php echo $field['status']; ?>">
                                                <?php echo $field['status']; ?></option>
                                            <?php
                                        }?>
                                        </select>
                                    </div>
                                    <div class="row"></div>
                                    <div class="col-25">
                                        <span><label for="pw">Payment Mode : </label></span>
                                    </div>
                                    <div class="col-25">
                                        <?php 
                                        $part= "SELECT * FROM payment_mode";
                                        $par_qu = mysqli_query($conn,$part);
                                        ?>
                                        <select name="payment_mode" id="payment_mode">
                                            <option value="<?php echo $data_fields['payment_mode']; ?>">
                                                <?php echo $data_fields['payment_mode']; ?></option>
                                            <?php
                                                    while ($rec2 =  mysqli_fetch_assoc($par_qu))
                                                    {
                                                ?>
                                            <option value="<?php  echo $rec2['payment_mode'];?>">
                                                <?php  echo $rec2['payment_mode'];?></option>
                                            <?php
                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="col-25">
                                        <span><label for="ddate">Updated On :</label></span><span
                                            class="important">*</span>
                                    </div>
                                    <div class="col-25">
                                        <input type="date" name="deliverdate" id="ddate"
                                            value="<?php echo $data_fields['delivered_on']; ?>" required>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <!--form row-->
                                    <input class="btn btn-info" type="submit" name="Update"
                                        value="Update Application" </div>
                           <?php
                    $name = trim(ucwords(strtolower($data_fields['customer_name'])));
                    $mobileNumber = trim(ucwords(strtolower($data_fields['mobile_no'])));
                    $service = trim(ucwords(strtolower($data_fields['services'])));
                    $status = trim(ucwords(strtolower($data_fields['status'])));
                    $ack = trim(strtoupper($data_fields['ack_no']));
                    $received = trim($data_fields['received_on']);
                    $updated = trim($data_fields['delivered_on']);
                    $ack_length = strlen($ack);
                    $mask_length = $ack_length / 3;
                    $mask_start_index = floor(($ack_length - $mask_length) / 2);
                    $ack = substr_replace($ack, str_repeat('X', $mask_length), $mask_start_index, $mask_length);

                    // Convert received date to a human-readable format
                    $receivedDate = new DateTime($received);
                    $receivedHumanReadable = $receivedDate->format('F j, Y'); // Example format: August 23, 2024

                    // Check if updated_on is empty or null and set to today's date if so
                    if (empty($updated)) {
                        $updatedDate = new DateTime(); // This sets it to today's date
                    } else {
                        $updatedDate = new DateTime($updated);
                    }
                    $updatedHumanReadable = $updatedDate->format('F j, Y'); // Example format: August 23, 2024

                    // Calculate the difference in days between received_on and updated_on
                    $dateDifference = $receivedDate->diff($updatedDate)->days;
                    $dateDifferenceText = "**" . $dateDifference . " days**";

                    if ($status == "Received" || $status == "Submitted") {
                        $greet = "*Congratulations*🥳";
                    } else {
                        $greet = "*Update Alert*🎉";
                    }

                    $body = $greet . "\n\nYour *" . $service . "* Application Status is *" . $status . "*\n\nApplicant Details:\n👤 Name: *" . $name . "*\n🗓 Received on: *" . $receivedHumanReadable . "* \n📱 Ph: *+91 " . trim($mobileNumber) . "* \n📝 Service: *" . $service . "*\n📊 Ack No: *" . $ack . "*\n📈 Updated *" . $updatedHumanReadable . "*\n\n⏳ Processed in: " . $dateDifferenceText . "\n📈Status *" . $status . "*\n \n\n*Join Us for More Govt Schemes!* 👇. \n https://bit.ly/digitalcyber \n\n*We Value Your Feedback! Share Your Experience Here* 👇\n 👉 Chikkabasthi : https://bit.ly/3tOC8HJ \nThank you for choosing \n*Digital Cyber Pvt Ltd*";

                    $whatsappLink = "whatsapp://send?phone=+91" . $mobileNumber . "&text=" . rawurlencode($body);
                ?>


                                    <a class="btn btn-success btn-sm" href="<?php echo $whatsappLink; ?>" target="_blank">Send WhatsApp</a>
                                        <a class="btn btn-primary btn-sm" href="tel:<?php echo $data_fields['mobile_no']; ?>" >Call Now <?php echo $data_fields['mobile_no']; ?></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
    $today = date("Y-m-d");
    if(isset($_POST['Update']))
    {  
        $service = $_POST['service'];
        $reveive_date = $_POST['rdate'];
        $customer_name = $_POST['cname'];
        $dob = $_POST['dob'];
        $applied_on = $_POST['adate'];
        $mobile_no = $_POST['mno'];
        $delivered_on = $_POST['deliverdate'];
        $ack_no = $_POST['ackno'];
        $doc_no = $_POST['docno'];
        $total_amnt = $_POST['ano'];
        $paid = $_POST['paid'];
        $bal = $_POST['bal'];
        $status = $_POST['status'];
        $payment_mode = $_POST['payment_mode'];

        if($service == "---Select---" ) 
        {
            echo '<script>alert("Please Select Application Type "); </script>' ;
        }
        elseif($payment_mode == "---Select---")
        {
            echo '<script>alert("Please Select Payment Mode "); </script>' ;
        }
        elseif ($service == "NEW PAN CARD" or $service == "PAN CARD CORRECTION" or $service == "REPRINT PAN CARD" )
        {
           $cyber_work = "UPDATE `cyber_work` SET `services`='$service',`received_on`='$reveive_date',`customer_name`='$customer_name',`dob`='$dob',`applied_on`='$applied_on',`mobile_no`='$mobile_no',`ack_no`='$ack_no',`document_no`='$doc_no',`status`='$status',`delivered_on`='$delivered_on',`total_amount`='$total_amnt',`amount_paid`='$paid',`balance`='$bal',`payment_mode`='$payment_mode' WHERE customer_id='$customer_id' AND mobile_no = '$mobile_no'  ";

            $pan_card = "UPDATE `pan_card` SET `pancard_type`='$service',`received_date`='$reveive_date',`customer_name`='$customer_name',`dob`='$dob',`mobile_no`='$mobile_no',`ack_no`='$ack_no',`pan_no`='$doc_no',`status`='$status',`delivered_on`='$delivered_on',`amount_paid`='$paid',`balance`='$bal',`payment_mode`='$payment_mode' WHERE customer_id='$customer_id' AND mobile_no = '$mobile_no'  ";
           mysqli_query($conn, $pan_card); 

            if (mysqli_query($conn, $cyber_work)) 
            { 
                echo '<script>alert(" ' .$customer_name . ' Your Application Status Updated Successfully. ");</script>';
                echo "<script>window.location.href = 'http://cyberpe.epizy.com/service_view.php?cust_id=$customer_id'</script>";
            }//http://cyberpe.epizy.com
            else
            {
            echo 'error' . "<br>" . mysqli_error($conn);
            }
        }
        elseif ($service == "AADHAR ADDRESS CORRECTION" OR $service == "AADHAR NAME CORRECTION" OR $service == "AADHAR DOB CORRECTION" OR $service == "AADHAR GENDER CORRECTION" )
        {
           $cyber_work = "UPDATE `cyber_work` SET `services`='$service',`received_on`='$reveive_date',`customer_name`='$customer_name',`dob`='$dob',`applied_on`='$applied_on',`mobile_no`='$mobile_no',`ack_no`='$ack_no',`document_no`='$doc_no',`status`='$status',`delivered_on`='$delivered_on',`total_amount`='$total_amnt',`amount_paid`='$paid',`balance`='$bal',`payment_mode`='$payment_mode' WHERE customer_id='$customer_id' AND mobile_no = '$mobile_no'";

            $aadhar_card = "UPDATE aadhar_card SET correction_type='$service',received_date='$reveive_date',customer_name='$customer_name',dob='$dob',mobile_no='$mobile_no',aadhar_no='$doc_no',urn_no='$ack_no',status='$status',delivered_on='$delivered_on',total_amount='$total_amnt',amount_paid='$paid',balance='$bal',payment_mode='$payment_mode' WHERE customer_id='$customer_id' AND mobile_no = '$mobile_no'";
            mysqli_query($conn, $aadhar_card);
     
            if (mysqli_query($conn, $cyber_work))
            { 
               echo '<script>alert(" ' .$customer_name. ' Your Application Status Updated Successfully. ");</script>';
                echo "<script>window.location.href = 'http://cyberpe.epizy.com/service_view.php?cust_id=$customer_id'</script>";
            }//https://digitalcyber.000webhostapp.com
            else
            {
            echo 'error' . "<br>" . mysqli_error($conn);
            }
        }
       elseif ($service == "NEW ELECTION ID CARD" or $service == "ELECTION ID CARD CORRECTION"or $service == "ELCTION ID CARD DELETION")
        {
           $cyber_work = "UPDATE `cyber_work` SET `services`='$service',`received_on`='$reveive_date',`customer_name`='$customer_name',`dob`='$dob',`applied_on`='$applied_on',`mobile_no`='$mobile_no',`ack_no`='$ack_no',`document_no`='$doc_no',`status`='$status',`delivered_on`='$delivered_on',`total_amount`='$total_amnt',`amount_paid`='$paid',`balance`='$bal',`payment_mode`='$payment_mode' WHERE customer_id='$customer_id' AND mobile_no = '$mobile_no'  ";

            $voterid_card = "UPDATE `voterid_card` SET `application_type`='$service',`applied_on`='$reveive_date',`customer_name`='$customer_name',`mobile_no`='$mobile_no',`ack_no`='$ack_no',`id_card_no`='$doc_no',`status`='$status',`delivered_on`='$delivered_on',`amount_paid`='$paid',`balance`='$bal',`payment_mode`='$payment_mode' WHERE customer_id='$customer_id' AND mobile_no = '$mobile_no'  ";
           mysqli_query($conn, $voterid_card); 

            if (mysqli_query($conn, $cyber_work)) 
            { 
                echo '<script>alert(" ' .$customer_name . ' Your Application Status Updated Successfully. ");</script>';
                echo "<script>window.location.href = 'http://cyberpe.epizy.com/service_view.php?cust_id=$customer_id'</script>";
            } //https://digitalcyber.000webhostapp.com
        } 
       elseif ($service == "LLP Scheme" or $service == "CCS Scheme" or $service == "Gold Scheme")
        {
           $cyber_work = "UPDATE `cyber_work` SET `services`='$service',`received_on`='$reveive_date',`customer_name`='$customer_name',`dob`='$dob',`applied_on`='$applied_on',`mobile_no`='$mobile_no',`ack_no`='$ack_no',`document_no`='$doc_no',`status`='$status',`delivered_on`='$delivered_on',`total_amount`='$total_amnt',`amount_paid`='$paid',`balance`='$bal',`payment_mode`='$payment_mode' WHERE customer_id='$customer_id' AND mobile_no = '$mobile_no'  ";

            $ima_claim = "UPDATE `ima_claim` SET `scheme`='$service',`received_date`='$reveive_date',`customer_name`='$customer_name',`mobile_no`='$mobile_no',`cms_no`='$ack_no',`ima_id`='$doc_no',`status`='$status',`amount_paid`='$paid',`balance`='$bal',`payment_mode`='$payment_mode' WHERE customer_id='$customer_id' AND mobile_no = '$mobile_no'  ";
           mysqli_query($conn, $ima_claim); 

            if (mysqli_query($conn, $cyber_work)) 
            { 
                echo '<script>alert(" ' .$customer_name . ' Your Application Status Updated Successfully. ");</script>';
                echo "<script>window.location.href = 'http://cyberpe.epizy.com/service_view.php?cust_id=$customer_id'</script>";
            }//https://digitalcyber.000webhostapp.com
            else
            {
            echo 'error' . "<br>" . mysqli_error($conn);
            }
        }
        else
        {
            $cyber_work = "UPDATE `cyber_work` SET `services`='$service',`customer_id`='$customer_id',`received_on`='$reveive_date',`customer_name`='$customer_name',`dob`='$dob',`applied_on`='$applied_on',`mobile_no`='$mobile_no',`ack_no`='$ack_no',`document_no`='$doc_no',`status`='$status',`delivered_on`='$delivered_on',`total_amount`='$total_amnt',`amount_paid`='$paid',`balance`='$bal',`payment_mode`='$payment_mode' WHERE customer_id='$customer_id'";
            if (mysqli_query($conn, $cyber_work)) 
            { 
                echo '<script>alert(" ' .$customer_name. ' Your Application Status Updated Successfully. ");</script>';
                echo "<script>window.location.href = 'http://cyberpe.epizy.com/service_view.php?cust_id=$customer_id'</script>";
            }//http://cyberpe.epizy.com
            else
            {
            echo 'error' . "<br>" . mysqli_error($conn);
            }
        }
    }

            ?>
                    <!-- End of working area section  -->

                    <!-- End of Page Content -->
                </div>


                <!-- Footer Section -->
                <?php include('./Template/footer.php'); ?>
                <!-- Footer Section End-->



</body>

</html>