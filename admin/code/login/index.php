<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--link boxicon--->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!--link google font--->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        .c_login {
            width: 100%;
            height: 100%;
           
        }
        .row {
            width: 100%;
        }
        .c1{
            margin-top: 8rem;
        }
        .card {
            width: 400px;
            margin-top: 10rem;
            margin-left: 2rem;
            height: 350px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border: none;
            border-radius: 5px;
        }
        .login_form{
            text-align: center;
        }
        .login_form label{
            float: left;
            padding-left: 16px;
            margin-bottom: 2px;
            font-weight: 600;
        }
        .login_form input{
            width: 90%;
            position: relative;
            padding: 10px;
            outline: none;
            border: 1px solid #ccc;  
            padding-left: 30px;
            margin-bottom: 18px;
            border-radius: 4px;
               
        }
        .login_form input:focus{
            border-color: #1877f2;
            box-shadow: 0 0 0 2px #e7f3ff;
            caret-color: #1877f2;
        }
        .login_form i {
            position: absolute;
            left: 0;
            margin-top: 15px;
            margin-left: 30px;
            color: #ccc;
        }
        .login_btn{
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }
        .login_btn button{
            width: 60%;
            padding: 8px;
            border: none;
            border-radius: 15rem;
            color: #fff;
            background-color: #0066ff;
        }
        .error-txt{
            color: #dc3545;
            text-align: left;
            margin-top: 5px;
        }
        .error{
            display: none;
        }
        .c1 h2{
            text-align: center;
        }
        .c1 p{
            text-align: center;
            color: #0066ff;
            font-size: 25px;
            font-weight: 600;
        }
        .eye_check {      
            margin: 0 5px;
            margin-left: 1.5rem;
        }
        
        .error_name, .error_pass{
            color: red;
            text-align: center;
            font-weight: 600;
            display: none;
            /* width: 90%;
            padding: 8px;
            background-color: #dc3545;
            margin: auto; */
        }
        .alert_card {
            width: 65%;
            height: 45px;
            margin-bottom: -6rem;
            margin-top: 5rem;
            margin-left: 2rem;
        }
    </style>
</head>
<body>
    <!---login--->
    <div class="container c_login">
    <div class="row">
        <div class="col c1">
            <h2>Hệ Thống Quản Lý Tin Tức</h2>
            <p>Trường THSP Trà Vinh</p>
            <img src="https://media.istockphoto.com/vectors/online-registration-and-sign-up-concept-young-man-signing-up-or-login-vector-id1219250758?k=20&m=1219250758&s=170667a&w=0&h=L92i6CGjAyshZXG5ViGpZqq3OuVjleC-hIM2AkaMd8s=">
        </div>
        <div class="col">
           
            <div class="card">
                <form method="POST" action="xulylogin.php" name="form" onsubmit="return validated();" >
                    <input type="hidden" name="id">
                    <div class="login_form">
                        <label>Tên đăng nhập</label>             
                        <input type="text" name="user" id="user" autocomplete="off">
                        <i class="fa-solid fa-user"></i>        
                    </div>
                    <div class="error_name" id="error_name">Vui lòng nhập tên đăng nhập!</div>
                    <div class="login_form">
                        <label>Mật khẩu</label>
                        <input type="password" id="pass" class="input" name="pass" id="">
                        <i class="fa-solid fa-lock"></i>            
                    </div>
                    <div class="error_pass" id="error_pass">Vui lòng nhập mật khẩu</div>
                    <input type="checkbox" id="check" class="eye_check" value="Hiện" onclick="togglePassword()">Hiện mật khẩu   
                    <div class="login_btn">
                        <button type="submit" name="login">Đăng Nhập</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    </div>
    <script>
       var user = document.forms['form']['user'];
       var pass = document.forms['form']['pass'];
       var error_name = document.getElementById('error_name');
     
       var error_pass = document.getElementById('error_pass');
       user.addEventListener('textInput', user_Verify);
       pass.addEventListener('textInput', pass_Verify);
        function validated(){
            if(user.value.length < 5){
                user.style.border = "1px solid red";
                error_name.style.display ="block";
                user.focus;
                return false;
            }
            if(pass.value.length < 6){
                pass.style.border = "1px solid red";
                
                error_pass.style.display ="block";
                pass.focus;
                return false;
            }
        }
        function user_Verify(){
            if(user.value.length >= 5){
                user.style.border = "1px solid #2dc653";
                error_name.style.display = "none";
                user.focus;
                return true;
            }
        }
        function pass_Verify(){
            if(pass.value.length >= 5){
                pass.style.border = "1px solid #2dc653";
                error_pass.style.display = "none";
                pass.focus;
                return true;
            }
        }
    </script>
    <script>
    function togglePassword() {
            var upass = document.getElementById('pass');
            var toggleBtn = document.getElementById('check');
            if(upass.type == "password"){
                upass.type = "text";
                toggleBtn.value = "Hide Password Characters";
            } else {
                upass.type = "password";
                toggleBtn.value = "Show Password Characters";
            }
        }
    </script>
    <!--end------>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c793ad069e.js" crossorigin="anonymous"></script>
    <script src="../../templates/JS/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>