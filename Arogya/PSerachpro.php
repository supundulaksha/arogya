<?php
    session_start();
    if(isset($_SESSION['un'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Arogya Health Care Hospital</title>
  <link rel="icon" href="imgs/logo.ico" type="image/x-icon">
  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
  rel="stylesheet"
/>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<?php include 'NavBar.php';?>
<br><br><br>
  <section class="h-100 bg-light">
        <div class="card-body p-md-5 text-black">
        <h3 class="mb-5 text-uppercase">SEARCH RESULTS</h3>

            <?php
                $pid=$_POST['txtPID'];
                $conn=mysqli_connect('localhost','root','','arogya');
                if($conn){
                    //echo'Database is Connected';
                    if(!empty($pid)){
                        $queSel="SELECT * FROM patient WHERE PID='$pid'";
                        if(mysqli_query($conn,$queSel)){
                            $dataRes=mysqli_query($conn,$queSel);
                            if(mysqli_num_rows($dataRes)>0){
                                echo'<font color="#000066" face="calibri" size="5">Search Result for Patient ID:'.$pid.';</font>';
                                echo'<table width="100%" align="center" border=".1" cellpadding="5" cellspacing="0">
                                    <tr>
                                        <th bgcolor="#000066"><font color="#ffffff">Patient ID</font></th>
                                        <th bgcolor="#000066"><font color="#ffffff">Patient Name</font></th>
                                        <th bgcolor="#000066"><font color="#ffffff">Telephone Number</font></th>
                                        <th bgcolor="#000066"><font color="#ffffff">NIC</font></th>
                                        <th bgcolor="#000066"><font color="#ffffff">Gender</font></th>
                                        <th bgcolor="#000066"><font color="#ffffff">Address</font></th>
                                        <th bgcolor="#000066"><font color="#ffffff">Date of Birth</font></th>
                                        <th bgcolor="#000066"><font color="#ffffff">Email ID</font></th>
                                        <th bgcolor="#000066"><font color="#ffffff">Medical History</font></th>
                                        <th bgcolor="#000066"><font color="#ffffff">Additional Notes</font></th>
                                        <th bgcolor="#000066"><font color="#ffffff">Edit</font></th>
                                        <th bgcolor="#000066"><font color="#ffffff">Delete</font></th>
                                    </tr>';
                                while($rowVal=mysqli_fetch_assoc($dataRes)){
                                    echo'<tr>
                                        <td>'.$rowVal['PID'].'</td>
                                        <td>'.$rowVal['FName'].' '.$rowVal['LName'].'</td>
                                        <td>'.$rowVal['TelNo'].'</td>
                                        <td>'.$rowVal['NIC'].'</td>
                                        <td>'.$rowVal['Gender'].'</td>
                                        <td>'.$rowVal['PAddress'].'</td>
                                        <td>'.$rowVal['DOB'].'</td>
                                        <td>'.$rowVal['Email'].'</td>
                                        <td>'.$rowVal['MedicalHistory'].'</td>
                                        <td>'.$rowVal['Notes'].'</td>
                                        <td><a href="PUpdate.php?pid='.$rowVal['PID'].'"><img src="imgs/edit.png" width="100" height="46"></a></td>
                                        <td><a href="PDelete.php?pid='.$rowVal['PID'].'"><img src="imgs/delete.png" width="100" height="46"></a></td>
                                    </tr>';
                                }
                                echo'</table>';
                            }
                        }
                        else{
                            echo'Data not selected for Customer ID:'.$pid.'!'.mysqli_error($conn);
                        }
                    }
                    else{
                        $queSel="SELECT * FROM patient";
                        if(mysqli_query($conn,$queSel)){
                            $dataRes=mysqli_query($conn,$queSel);
                            if(mysqli_num_rows($dataRes)>0){
                                echo'<table width="100%" align="center" border=".1" cellpadding="5" cellspacing="0">
                                    <tr>
                                    <th bgcolor="#000066"><font color="#ffffff">Patient ID</font></th>
                                    <th bgcolor="#000066"><font color="#ffffff">Patient Name</font></th>
                                    <th bgcolor="#000066"><font color="#ffffff">Telephone Number</font></th>
                                    <th bgcolor="#000066"><font color="#ffffff">NIC</font></th>
                                    <th bgcolor="#000066"><font color="#ffffff">Gender</font></th>
                                    <th bgcolor="#000066"><font color="#ffffff">Address</font></th>
                                    <th bgcolor="#000066"><font color="#ffffff">Date of Birth</font></th>
                                    <th bgcolor="#000066"><font color="#ffffff">Email ID</font></th>
                                    <th bgcolor="#000066"><font color="#ffffff">Medical History</font></th>
                                    <th bgcolor="#000066"><font color="#ffffff">Additional Notes</font></th>
                                    <th bgcolor="#000066"><font color="#ffffff">Edit</font></th>
                                    <th bgcolor="#000066"><font color="#ffffff">Delete</font></th>
                                    </tr>';
                                while($rowVal=mysqli_fetch_assoc($dataRes)){
                                    echo'<tr>
                                    <td>'.$rowVal['PID'].'</td>
                                    <td>'.$rowVal['FName'].' '.$rowVal['LName'].'</td>
                                    <td>'.$rowVal['TelNo'].'</td>
                                    <td>'.$rowVal['NIC'].'</td>
                                    <td>'.$rowVal['Gender'].'</td>
                                    <td>'.$rowVal['PAddress'].'</td>
                                    <td>'.$rowVal['DOB'].'</td>
                                    <td>'.$rowVal['Email'].'</td>
                                    <td>'.$rowVal['MedicalHistory'].'</td>
                                    <td>'.$rowVal['Notes'].'</td>
                                    <td><a href="PUpdate.php?pid='.$rowVal['PID'].'"><img src="imgs/edit.png" width="100" height="46"></a></td>
                                    <td><a href="PDelete.php?pid='.$rowVal['PID'].'"><img src="imgs/delete.png" width="100" height="46"></a></td>
                                    </tr>';
                                }
                                echo'</table>';
                            }
                        }
                    }
                }
                else{
                    echo'Error 303!<br>Database is not Connected!<br><a href="loginform1.html"><img src="imgs/back.png"></a>';
                }
            ?>
        </div>
    </section>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include 'Footer.php';?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <?php
    }
  ?>
</body>
</html>