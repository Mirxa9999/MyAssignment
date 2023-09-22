<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="./style.css" media="all"> -->

    <link rel="stylesheet" href="./style.css" media="all">
    <link rel="stylesheet" href="../assets/css/boostrap.min.css">
        <script src="../assets/js/boostrap.min.js"></script>
        <script src="../assets/js/jquery.min.js"></script>
        
</head>

<style>
    body {
        background-image: url('../assets/bg.jpeg');
        background-position: center;
        background-size: cover;
        height: 100%;
        background-repeat: no-repeat;
    }
    .logindiv{
        margin-top: 200px;
    }
</style>

<body>

    <div class="container-fluid   ">
        <section class=" gradient-custom">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center  logindiv mt-5">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card " style="border-radius: 1rem;">
                            <div class="card-body p-5 ">
                                <div class="login">
                                    <form method="post" id="myform">

                                    <div class="d-flex justify-content-center mb-4">

                                    <img src="../assets/logo1.png" alt="">
                                        <h2 class="fw-bold text-uppercase text-dark text-center logintext">Login</h2>
                                    </div>
                                        <div>
                                        <p class="text-danger text-center" id="errors"></p>
                                        <p class="text-success text-center" id="mailsend"></p>

                                        </div>
                                    <div class="form-outline form-white mb-4">
                                        <label for="typeEmailX" class="text-start">Email</label>
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg"  name="email"/>
                                        <!-- <label class="form-label" for="typeEmailX">Email</label> -->
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Password</label>
                                        <input type="password" id="typePasswordX"
                                            class="form-control form-control-lg" name="password" />
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">
                                            <div class="col-12">
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" id="gridCheck">
                                                  <label class="form-check-label" for="gridCheck">
                                                    Remember Me
                                                  </label>
                                                </div>
                                              </div>

                                            <!-- <p class="small mb-5 pb-lg-2"><a class="text-dark-50" href="#!">Forgot
                                                    password?</a></p> -->
                                        </div>
                                        <p class="small mb-5 pb-lg-2"><a class="forgot " href="./reset.php">Forgot
                                                password?</a></p>
                                    </div>
                                    <div class="row loginbtn">
                                        <button class="btn btn-lg px-5 " id="submit"
                                            type="button">Login</button>
                                    </div>
                                </form>
                                </div>
                                <div>
                                    <p class="mb-0 text-center loginsss">Don't have an account? <a href="signup.php"
                                            class="text-dark-50 fw-bold signupclr">Sign Up</a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $('#submit').on('click',function(e){
            // alert(e);
            $('#errors').text("")
            $('#mailsend').text("");
            // alert('ok woking')
            e.preventDefault();
            document.getElementById('submit').disabled =true
          let  formss= new FormData(myform);
          $.ajax({
            type: "POST",
            url: "../Ajax/login.php",
            data: formss,
            processData: false,
            contentType: false,
            success: function (response) {
                // alert(response);       
                document.getElementById('submit').disabled =false         
                if (response==1) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Your Credential Match Successfully'
                    })
                    window.location.href="../Assignment/home.php";
                }else if (response==2){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Your Credential Match Successfully'
                    })
                    window.location.href="../index.php";

                }else if (response=='error'){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'error',
                        title: 'Your Credential Not Match'
                    })
                    // $('#errors').text("Your Credential des'nt Match")
                    $('#mailsend').text('');
                }else if(response==3){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Check Your Email Verification link Send Your Email'
                    })
                    // $('#mailsend').text("Check Your email Verification link send on your email ");
                    $('#errors').text('');

                } 

            }
          });
        //   console.log(formss)
        })
    </script>

</body>

</html>

<script src="../Assignment/assets/js/sweetalert2.all.min.js"></script>
