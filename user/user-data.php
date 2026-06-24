<?php
    session_start();
    require '../details.php';
    // include '../ip_security.php';
    include('../database/db_config.php');
    


    if (isset($_SESSION['user_id'])) {
        $username = $_SESSION['user_id'];

    } elseif (isset($_POST['r_v_code'])) {
        # code...
    } else {
        $_SESSION['status'] = 'Complete the registration form!';
        header('location: register.php');
    }

?>

<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= NAME ?> - User Data</title>
    <meta name="title" Content="<?= NAME ?> - User Data">

    <meta name="description" content="HYIPLab - Complete HYIP Investment System . Most Advanced HYIP Investment System Script in codecanyon.\\n\\nhyip, bitcoin, investment,  hyip business, hyip script, best hyip, buy hyip script, advanced hyip script, hyip software, high yield investment program, hyip manager, hyip manager script, cheap hyip script, reliable hyip, secure hyip script, php hyip script, new hyip script, hyip program">
    <meta name="keywords" content="hyip,bitcoin,investment,hyip business,hyip script,best hyip,buy hyip script,advanced hyip script,hyip software,hight yield investment program,Hyip manager,hyip manager script,cheap hyip script,realable hyip,secure hyip script,php hyip script,new hyip script,hyip program">
    <link rel="shortcut icon" href="../uploads/<?= FAV ?>" type="image/x-icon">

    
    <link rel="apple-touch-icon" href="../uploads/<?= LOGO ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?= NAME ?> - User Data">
    
    <meta itemprop="name" content="<?= NAME ?> - User Data">
    <meta itemprop="description" content="HYIPLab - Complete HYIP Investment System . Most Advanced HYIP Investment System Script in codecanyon.\\n\\nhyip, bitcoin, investment,  hyip business, hyip script, best hyip, buy hyip script, advanced hyip script, hyip software, high yield investment program, hyip manager, hyip manager script, cheap hyip script, reliable hyip, secure hyip script, php hyip script, new hyip script, hyip program">
    <meta itemprop="image" content="../uploads/<?= LOGO ?>">
    
    <meta property="og:type" content="website">
    <meta property="og:title" content="HYIPLab - Complete HYIP Investment System">
    <meta property="og:description" content="HYIPLab - Complete HYIP Investment System . Most Advanced HYIP Investment System Script in codecanyon.">
    <meta property="og:image" content="../uploads/<?= LOGO ?>"/>
    <meta property="og:image:type" content="jpg"/>
    <meta property="og:image:width" content="1180" />
    <meta property="og:image:height" content="600" />
    <meta property="og:url" content="user-data.php">
    
    <meta name="twitter:card" content="summary_large_image">
    <!-- font  -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,400;1,500&family=Maven+Pro:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">



    <link href="../assets/global/css/bootstrap.min.css" rel="stylesheet">

    <link href="../assets/global/css/all.min.css" rel="stylesheet">
    <link href="../assets/global/css/auth.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/global/css/line-awesome.min.css" />

    <link rel="stylesheet" href="../assets/templates/invester/css/lib/animate.css">

    <!-- Plugin Link -->
    <link rel="stylesheet" href="../assets/templates/invester/css/lib/slick.css">
    <link rel="stylesheet" href="../assets/templates/invester/css/lib/magnific-popup.css">
    <link rel="stylesheet" href="../assets/templates/invester/css/lib/apexcharts.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../assets/templates/invester/css/main.css">

    
    <link rel="stylesheet" href="../assets/templates/invester/css/custom.css">

    <link rel="stylesheet" href="../assets/templates/invester/css/color.php?color=0023f4">

        <style>
        .pb-120 {
            padding-bottom: clamp(40px, 4vw, 40px);
        }

        .pt-120 {
            padding-top: clamp(40px, 4vw, 40px);
        }

        .container {
            max-width: 1140px;
        }
        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 1rem;
            padding: 0.75rem 1rem;
            color: #fff;
            transition: transform 0.2s ease;
        }


        .stat-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-size: 1.1rem;
            color: #fff;
            flex-shrink: 0;
        }

        .bg-pink {
            background-color: #ff4d91;
        }

        .bg-blue {
            background-color: #3399ff;
        }

        .value {
            font-size: 0.9rem;
            font-weight: bold;
        }

        .error-popup {
             position: fixed;
            top: 20px;
            right: 20px;
            background-color: #e16466ff;
            color: #fff;
            padding: 15px 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            font-family: Arial, sans-serif;
            font-size: 16px;
            z-index: 9999;
            opacity: 0.4;
            transform: translateY(-90px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .error-popup.show {
            opacity: 1;
            transform: translateY(0);
        }


    </style>

</head>

<body>
            <!-- Account Section -->
    <section class="account-section position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <a href="../" class="text-center d-block mb-3 mb-sm-4 auth-page-logo"><img src="../uploads/<?= LOGO ?>" alt="logo"></a>

                        <?php
                            if(isset($_SESSION['status']) && $_SESSION['status'] != null) {
                                ?>
                                    <div id="errorMessage" class="error-popup">
                                        <i class="bi bi-exclamation-triangle-fill"></i>
                                        <span class="error-text"><?= $_SESSION['status'] ?></span>
                                    </div>
                                <?php
                                unset($_SESSION['status']);
                            } elseif (isset($_SESSION['success']) && $_SESSION['success'] != null) {
                                ?>
                                    <div id="errorMessage" class="error-popup" style="background-color: #5ae061ff;">
                                        <i class="bi bi-check-circle-fill"></i>
                                        <span class="error-text"><?= $_SESSION['success'] ?></span>
                                    </div>
                                <?php
                                unset($_SESSION['success']);
                            }
                        ?>

                    <form action="../dashboard/code.php" method="POST" class="account-form">

                        <?php if (isset($_POST['referral']) && $_POST['referral'] != null) {
                            ?>
                                <input type="hidden" name="ref" value="<?= $ref ?>">
                            <?php
                        } ?>
                        <input type="hidden" name="ip" value="<?= $ip ?>">  
                        <input type="hidden" name="v_code" value="<?= $v_code ?>">

                         <div class="row">

                            <div class="form-group col-sm-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control form--control" name="firstname" value="" required>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control form--control" name="lastname" value="" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control form--control" name="address" value="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control form--control" name="state" value="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-label">Zip Code</label>
                                <input type="text" class="form-control form--control" name="zip" value="">
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control form--control" name="city" value="">
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="form-label">Email Verification Code</label>
                                <input type="text" class="form-control form--control" name="v_code" value="" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="v_btn" class="btn btn--base w-100">Submit</button>
                            </div><br>
                            <div class="col-12 mt-3">
                                <a href="../dashboard/r_v_code.php" class="btn btn--light w-100">Resend Code</a>
                                <!-- <button type="submit" name="r_v_code" class="btn btn--light w-100">Resend Code</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="existModalLongTitle">You are with us</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="text-center">You already have an account please Login </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <a href="login.php" class="btn btn--base">Login</a>
                </div>
            </div>
        </div>
    </div> -->


        
    <script src="../assets/global/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/global/js/bootstrap.bundle.min.js"></script>

    <!-- Pluglin Link -->
    <script src="../assets/templates/invester/js/lib/slick.min.js"></script>
    <script src="../assets/templates/invester/js/lib/magnific-popup.min.js"></script>
    <script src="../assets/templates/invester/js/lib/apexcharts.min.js"></script>

    
    <!-- Main js -->
    <script src="../assets/templates/invester/js/main.js"></script>

        <script>
        "use strict";
        (function($) {
                            $(`option[data-code=NG]`).attr('selected', '');
                        $('select[name=country]').change(function() {
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            $('.checkUser').on('focusout', function(e) {
                var url = `../user/check-user`;
                var value = $(this).val();
                var token = '20GmdhYXrNaLzmVnplTUA2vnJk7vI9v745LQcwb4';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {
                        mobile: mobile,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response.data != false) {
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
    </script>

    
    <link rel="stylesheet" href="../assets/global/css/iziToast.min.css">
<script src="../assets/global/js/iziToast.min.js"></script>


<script>
    "use strict";
    function notify(status, message) {
        if (typeof message == 'string') {
            iziToast[status]({
                message: message,
                position: "topRight"
            });
        } else {
            $.each(message, function(i, val) {
                iziToast[status]({
                    message: val,
                    position: "topRight"
                });
            });
        }
    }
</script>

    <script>
        $(".langSel").on("change", function() {
            window.location.href = "../change/" + $(this).val();
        });

        Array.from(document.querySelectorAll('table')).forEach(table => {
            let heading = table.querySelectorAll('thead tr th');
            Array.from(table.querySelectorAll('tbody tr')).forEach((row) => {
                Array.from(row.querySelectorAll('td')).forEach((colum, i) => {
                    colum.setAttribute('data-label', heading[i].innerText)
                });
            });
        });

        $.each($('input, select, textarea'), function(i, element) {
            var elementType = $(element);
            if (elementType.attr('type') != 'checkbox') {
                if (element.hasAttribute('required')) {
                    $(element).closest('.form-group').find('label').addClass('required');
                }
            }
        });

        var inputElements = $('[type=text],[type=password],[type=email],[type=number],select,textarea');
        $.each(inputElements, function(index, element) {
            element = $(element);
            element.closest('.form-group').find('label').attr('for', element.attr('name'));
            element.attr('id', element.attr('name'))
        });

        $('.policy').on('click', function() {
            $.get('../cookie/accept', function(response) {
                $('.cookies-card').addClass('d-none');
            });
        });


        setTimeout(function() {
            $('.cookies-card').removeClass('hide')
        }, 2000);

        function showError() {
        const error = document.getElementById("errorMessage");
        error.classList.add("show");

        setTimeout(() => {
            error.classList.remove("show");
        }, 3000); // 3 seconds
        }

        // Call this function when needed
        showError();
    </script>
</body>

</html>
