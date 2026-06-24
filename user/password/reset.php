<?php
    session_start();
    require '../details.php';
?>

<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= NAME ?> - Account Recovery</title>
    <meta name="title" Content="<?= NAME ?> - Account Recovery">

    <meta name="description" content="HYIPLab - Complete HYIP Investment System . Most Advanced HYIP Investment System Script in codecanyon.\\n\\nhyip, bitcoin, investment,  hyip business, hyip script, best hyip, buy hyip script, advanced hyip script, hyip software, high yield investment program, hyip manager, hyip manager script, cheap hyip script, reliable hyip, secure hyip script, php hyip script, new hyip script, hyip program">
    <meta name="keywords" content="hyip,bitcoin,investment,hyip business,hyip script,best hyip,buy hyip script,advanced hyip script,hyip software,hight yield investment program,Hyip manager,hyip manager script,cheap hyip script,realable hyip,secure hyip script,php hyip script,new hyip script,hyip program">
    <link rel="shortcut icon" href="../../uploads/<?= FAV ?>" type="image/x-icon">

    
    <link rel="apple-touch-icon" href="../../uploads/<?= LOGO ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?= NAME ?> - Account Recovery">
    
    <meta itemprop="name" content="<?= NAME ?> - Account Recovery">
    <meta itemprop="description" content="HYIPLab - Complete HYIP Investment System . Most Advanced HYIP Investment System Script in codecanyon.\\n\\nhyip, bitcoin, investment,  hyip business, hyip script, best hyip, buy hyip script, advanced hyip script, hyip software, high yield investment program, hyip manager, hyip manager script, cheap hyip script, reliable hyip, secure hyip script, php hyip script, new hyip script, hyip program">
    <meta itemprop="image" content="../../uploads/<?= FAV ?>">
    
    <meta property="og:type" content="website">
    <meta property="og:title" content="HYIPLab - Complete HYIP Investment System">
    <meta property="og:description" content="HYIPLab - Complete HYIP Investment System . Most Advanced HYIP Investment System Script in codecanyon.">
    <meta property="og:image" content="../../uploads/<?= FAV ?>"/>
    <meta property="og:image:type" content="jpg"/>
    <meta property="og:image:width" content="1180" />
    <meta property="og:image:height" content="600" />
    <meta property="og:url" content="reset.php">
    
    <meta name="twitter:card" content="summary_large_image">
    <!-- font  -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,400;1,500&amp;family=Maven+Pro:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.10.5/font/bootstrap-icons.css">



    <link href="../../assets/global/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../assets/global/css/all.min.css" rel="stylesheet">
    <link href="../../assets/global/css/auth.css" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/global/css/line-awesome.min.css" />

    <link rel="stylesheet" href="../../assets/templates/invester/css/lib/animate.css">

    <!-- Plugin Link -->
    <link rel="stylesheet" href="../../assets/templates/invester/css/lib/slick.css">
    <link rel="stylesheet" href="../../assets/templates/invester/css/lib/magnific-popup.css">
    <link rel="stylesheet" href="../../assets/templates/invester/css/lib/apexcharts.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../../assets/templates/invester/css/main.css">

    
    <link rel="stylesheet" href="../../assets/templates/invester/css/custom.css">

    <link rel="stylesheet" href="../../assets/templates/invester/css/color7f14.css?color=0023f4">

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

    </style>

</head>

<body>
    

<!-- Account Section -->
<section class="account-section position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="auth-card">
                    <div class="text-center">
                        <a href="../../index.html" class="text-center d-block mb-4 auth-page-logo">
                            <img src="../../assets/images/logoIcon/logo_2.png" alt="logo" class="logo-img">
                        </a>
                    </div>
                    
                    <form action="../../dashboard/code.php" method="POST" class="auth-form verify-gcaptcha">
                        <input type="hidden" name="_token" value="jfT6QkE1k5q7AGKBYqnhvWCs7H9HNv7O7Wo1REE8">                        
                        <div class="auth-header">
                            <h4 class="auth-header__title">Account Recovery</h4>
                            <p class="auth-header__subtitle">
                                To recover your account please provide your email or username to find your account.                            </p>
                        </div>
                        
                        <div class="form-group">
                            <label>Email or Username</label>
                            <input type="text" 
                                   class="form-control form--control" 
                                   name="value" 
                                   value="" 
                                   required 
                                   autofocus="off">
                        </div>
                        
                                                
                        
                            <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                                Submit                            </button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Account Section -->


                <!-- cookies dark version start -->
        <!-- <div class="cookies-card text-center hide">
            <div class="cookies-card__icon bg--base">
                <i class="las la-cookie-bite"></i>
            </div>
            <p class="mt-4 cookies-card__content">We may use cookies or any other tracking technologies when you visit our website, including any other media form, mobile website, or mobile application related or connected to help customize the Site and improve your experience. <a href="../../cookie-policy.html" class="text-primary" target="_blank">learn more</a></p>
            <div class="cookies-card__btn mt-4">
                <a href="javascript:void(0)" class="btn btn--base text-white w-100 policy">Allow</a>
            </div>
        </div> -->
        <!-- cookies dark version end -->
    
    <script src="../../assets/global/js/jquery-3.6.0.min.js"></script>
    <script src="../../assets/global/js/bootstrap.bundle.min.js"></script>

    <!-- Pluglin Link -->
    <script src="../../assets/templates/invester/js/lib/slick.min.js"></script>
    <script src="../../assets/templates/invester/js/lib/magnific-popup.min.js"></script>
    <script src="../../assets/templates/invester/js/lib/apexcharts.min.js"></script>

    
    <!-- Main js -->
    <script src="../../assets/templates/invester/js/main.js"></script>

    
    
    <link rel="stylesheet" href="../../assets/global/css/iziToast.min.css">
<script src="../../assets/global/js/iziToast.min.js"></script>


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
            window.location.href = "https://bluewave-iso.net/change/" + $(this).val();
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
            $.get('reset.html', function(response) {
                $('.cookies-card').addClass('d-none');
            });
        });


        setTimeout(function() {
            $('.cookies-card').removeClass('hide')
        }, 2000);
    </script>
</body>


<!-- Mirrored from bluewave-iso.net/user/password/reset by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Jul 2025 08:51:50 GMT -->
</html>
