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
        background-image: url('./bg.jpeg');
        background-position: center;
        background-size: cover;
        height: 100%;
        background-repeat: no-repeat;
    }

    .logindiv {
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
                                            <img src="./logo.png" alt="">
                                            <h4 class="fw-bold text-uppercase text-dark text-center logintext">Reset Password</h4>
                                        </div>
                                        <div>
                                            <p class="text-danger text-center" id="errors"></p>
                                            <p class="text-success text-center" id="send"></p>

                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label for="typeEmailX" class="text-start">Email</label>
                                            <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" />
                                            <!-- <label class="form-label" for="typeEmailX">Email</label> -->
                                        </div>
                                        <div class="row loginbtn">
                                            <button class="btn btn-lg px-5 " id="submit" type="button">Reset</button>
                                        </div>
                                    </form>
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
        $('#submit').on('click', function(e) {
            // alert('ok woking')
            e.preventDefault();

            let formss = new FormData(myform);
            $.ajax({
                type: "POST",
                url: "../Ajax/reset.php",
                data: formss,
                processData: false,
                contentType: false,
                success: function(response) {
                    // alert(response);
                    if (response == 'send') {
                        $('#send').text("Please chek Your Mail reset link are send on your mail");
                    } else if (response == 'invalid') {
                        $('#errors').text("Email Is Invalid Please Enter Correct Email");
                    }
                }
            });
            //   console.log(formss)
        })
    </script>

</body>

</html>