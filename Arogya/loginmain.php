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
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="full-page">
        <div class="navbar">
            <div>
            <a href="index.php" class="ms-md-2">
            <img src="images/logo.png" alt="Logo" style="width:40px;" class=""> 
          </a>
            </div>
            <nav>
        <ul id='MenuItems'>
            <li><button class='loginbtn rounded' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button></li>
        </ul>
    </nav>

        </div>
        

<section>
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button'onclick='login()'class='toggle-btn'>Admin </button>
                 
                    
                </div>
                
                <form id='login' class='input-group-register' method="post" action="logpro.php">
		     
		     <input type='username' name='txtUN' class='input-field'placeholder='Enter username' required>
		     <input type='password' name='txtPW'class='input-field'placeholder='Enter Password'  required>
		     <input type='checkbox'class='check-box'><span>I agree to the terms and conditions</span>
                    <button type='submit'class='submit-btn'>Login</button>
	         </form>
           
            </div>
        </div>
    </div>
</section>
    <script>
        var x=document.getElementById('login');
		var y=document.getElementById('register');
        
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>