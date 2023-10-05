<?php
session_start();
if (isset($_SESSION['un'])) {
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
    <?php include 'NavBar.php'; ?>

    <section class="h-100 bg-light">
        <form action="Staffregpro.php" method="POST">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4">
                            <?php
                            // Check if the form has been submitted
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $conn = mysqli_connect('localhost', 'root', '', 'arogya');
                                if ($conn) {
                                    // Retrieve form data
                                    $fname = mysqli_real_escape_string($conn, $_POST['txtFN']);
                                    $lname = mysqli_real_escape_string($conn, $_POST['txtLN']);
                                    $address = mysqli_real_escape_string($conn, $_POST['txtAdd']);
                                    $gender = mysqli_real_escape_string($conn, $_POST['radio']);
                                    $dob = mysqli_real_escape_string($conn, $_POST['txtDOB']);
                                    $email = mysqli_real_escape_string($conn, $_POST['txtEM']);
                                    $nic = mysqli_real_escape_string($conn, $_POST['txtNIC']);
                                    $tel = mysqli_real_escape_string($conn, $_POST['txtConNo']);
                                    $designation = mysqli_real_escape_string($conn, $_POST['txtDes']);
                                    $qualification = mysqli_real_escape_string($conn, $_POST['txtQul']);

                                    // Define $queSave with your SQL query
									$queSave = "INSERT INTO staff (FName, LName, SAddress, Gender, DOB, Email, NIC, TelNo, Designation, Qualification)
									VALUES ('$fname', '$lname', '$address', '$gender', '$dob', '$email', '$nic', '$tel', '$designation', '$qualification')";
						
                                    // Execute the SQL query
                                    if (mysqli_query($conn, $queSave)) {
                                        echo '<p align="center">Data Successfully Saved to the Database!</p>';
                                    } else {
                                        echo '<p align="center">Data Not Saved to the Database! ' . mysqli_error($conn) . '</p>';
                                    }

                                    // Close the database connection
                                    mysqli_close($conn);
                                } else {
                                    echo 'Error 303!<br>Database is NOT CONNECTED!<br><a href="loginform1.html">';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <?php include 'Footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
}
?>
