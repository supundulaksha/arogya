<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['txtUN']) && isset($_POST['txtPW'])) {
        $un = $_POST['txtUN'];
        $pw = $_POST['txtPW'];

        if (!empty($un) && !empty($pw)) {
            $conn = mysqli_connect('localhost', 'root', '', 'arogya');

            if (!$conn) {
                die('Database connection error: ' . mysqli_connect_error());
            }

            $queData = "SELECT * FROM users WHERE Username = ? LIMIT 1";
            $stmt = mysqli_prepare($conn, $queData);

            if (!$stmt) {
                die('Error in preparing query (queData): ' . mysqli_error($conn));
            }

            mysqli_stmt_bind_param($stmt, 's', $un);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (!$result) {
                die('Error executing queData query: ' . mysqli_error($conn));
            }

            if (mysqli_num_rows($result) > 0) {
                $rv = mysqli_fetch_assoc($result);

                if ($rv['Username'] == $un && $rv['Password'] == $pw) {
                    $_SESSION['RName'] = $rv['Realname'];
                    $_SESSION['un'] = $un;

                    $queSche = "INSERT INTO loginsch (Username, Login) VALUES (?, NOW())";
                    $stmt = mysqli_prepare($conn, $queSche);

                    if (!$stmt) {
                        die('Error in preparing query (queSche): ' . mysqli_error($conn));
                    }

                    mysqli_stmt_bind_param($stmt, 's', $un);
                    mysqli_stmt_execute($stmt);

                    $queGet = "SELECT MAX(LogSerial) AS maxLogSerial FROM loginsch WHERE Username = ? GROUP BY Username";
                    $stmt = mysqli_prepare($conn, $queGet);

                    if (!$stmt) {
                        die('Error in preparing query (queGet): ' . mysqli_error($conn));
                    }

                    mysqli_stmt_bind_param($stmt, 's', $un);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if (!$result) {
                        die('Error executing queGet query: ' . mysqli_error($conn));
                    }

                    if (mysqli_num_rows($result) > 0) {
                        $val = mysqli_fetch_assoc($result);
                        $_SESSION['uid'] = $val['maxLogSerial'];
                        mysqli_free_result($result);
                        mysqli_close($conn);
                        header("Location: main.php"); // Redirect to the main page after successful login
                        exit();
                    }
                } else {
                    echo 'UNAUTHORIZED ACCESS DENIED!<br>Please Register before trying to Login!<br><a href="loginform1.html"><img src="imgs/back.png" width="200" height="200"></a>';
                }
            } else {
                echo 'UNAUTHORIZED ACCESS DENIED!<br>Please Register before trying to Login!<br><a href="loginform1.html"><img src="imgs/back.png" width="200" height="200"></a>';
            }
        } else {
            echo 'Username or Password cannot be BLANK!<br><a href="loginform1.html"><img src="imgs/back.png" width="200" height="200"></a>';
        }
    } else {
        echo 'Invalid request!<br><a href="loginform1.html"><img src="imgs/back.png" width="200" height="200"></a>';
    }
} else {
    echo 'Invalid request!<br><a href="loginform1.html"><img src="imgs/back.png" width="200" height="200"></a>';
}
?>
