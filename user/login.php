<?php
    if (isset($_SESSION['user_id'])) {

	header('location: ../dashboard/');

} else {
    session_start();
    require '../details.php';
    // include 'ip_security.php';
}
?>

<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= NAME ?> - Login</title>
    <meta name="title" Content="<?= NAME ?> - Login">

    <meta name="description" content="HYIPLab - Complete HYIP Investment System . Most Advanced HYIP Investment System Script in codecanyon.\\n\\nhyip, bitcoin, investment,  hyip business, hyip script, best hyip, buy hyip script, advanced hyip script, hyip software, high yield investment program, hyip manager, hyip manager script, cheap hyip script, reliable hyip, secure hyip script, php hyip script, new hyip script, hyip program">
    <meta name="keywords" content="hyip,bitcoin,investment,hyip business,hyip script,best hyip,buy hyip script,advanced hyip script,hyip software,hight yield investment program">
    <link rel="shortcut icon" href="../uploads/<?= FAV ?>" type="image/x-icon">

    
    <link rel="apple-touch-icon" href="../uploads/<?= LOGO ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?= NAME ?> - Login">
    
    <meta itemprop="name" content="<?= NAME ?> - Login">
    <meta itemprop="description" content="HYIPLab - Complete HYIP Investment System . Most Advanced HYIP Investment System Script in codecanyon.\\n\\nhyip, bitcoin, investment,  hyip business, hyip script, best hyip, buy hyip script, advanced hyip script, hyip software, high yield investment program, hyip manager, hyip manager script, cheap hyip script, reliable hyip, secure hyip script, php hyip script, new hyip script, hyip program">
    <meta itemprop="image" content="../assets/images/seo/633eef9a9b3161665068954.jpg">
    
    <meta property="og:type" content="website">
    <meta property="og:title" content="HYIPLab - Complete HYIP Investment System">
    <meta property="og:description" content="HYIPLab - Complete HYIP Investment System . Most Advanced HYIP Investment System Script in codecanyon.">
    <meta property="og:image" content="../assets/images/seo/633eef9a9b3161665068954.jpg"/>
    <meta property="og:image:type" content="jpg"/>
    <meta property="og:image:width" content="1180" />
    <meta property="og:image:height" content="600" />
    <meta property="og:url" content="login.php">
    
    <meta name="twitter:card" content="summary_large_image">
    <!-- font  -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,400;1,500&amp;family=Maven+Pro:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../cdn.jsdelivr.net/npm/bootstrap-icons%401.10.5/font/bootstrap-icons.css">



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

    <link rel="stylesheet" href="../assets/templates/invester/css/color7f14.css?color=0023f4">

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
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="auth-container">
                        <a href="../" class="text-center d-block mb-4 auth-page-logo">
                            <img src="../uploads/<?= LOGO ?>" alt="logo" class="logo-img">
                        </a>
                        
                        <div class="auth-header text-center mb-5">
                            <h3 class="auth-title mb-2"></h3>
                            <p class="auth-subtitle text-muted"></p>
                        </div>

                        <?php
                            if(isset($_SESSION['status']) && $_SESSION['status'] != null) {
                                ?>
                                    <div id="errorMessage" class="error-popup">
                                        <i class="bi bi-exclamation-triangle-fill"></i>
                                        <span class="error-text"><?= $_SESSION['status'] ?></span>
                                    </div>
                                <?php
                                unset($_SESSION['status']);
                            }
                        ?>
                        
                        <form action="../dashboard/code.php" method="POST" class="verify-gcaptcha">
                            <div class="form-group mb-3">
                                <label class="form-label">Username or Email</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter your username or email">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input type="checkbox" id="remember" name="remember" class="form-check-input">
                                    <label for="remember" class="form-check-label">Remember me</label>
                                </div>
                                <a href="password/reset.php" class="text-primary fw-medium">Forgot Password?</a>
                            </div>
                                                  
                            <button type="submit" name="login" class="btn btn-primary w-100 py-2 mb-3">Login</button>
                            
                            <div class="divider my-4">
                                <span class="divider-line"></span>
                                <span class="divider-text px-3">OR</span>
                                <span class="divider-line"></span>
                            </div>
                            
                            <button type="button" class="btn btn-light w-100 py-2 metamaskLogin border">
                                <img src="../assets/templates/invester/images/metamask.png" alt="Metamask" class="metamask-icon me-2">
                                Login with Metamask                            </button>
                            
                            <div class="text-center mt-4 pt-2">
                                <p class="mb-0 text-muted">Don't have an account? <a href="register.php" class="text-primary fw-medium">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="../assets/global/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/global/js/bootstrap.bundle.min.js"></script>

    <!-- Pluglin Link -->
    <script src="../assets/templates/invester/js/lib/slick.min.js"></script>
    <script src="../assets/templates/invester/js/lib/magnific-popup.min.js"></script>
    <script src="../assets/templates/invester/js/lib/apexcharts.min.js"></script>

        <script src="../assets/global/js/web3.min.js"></script>

    <!-- Main js -->
    <script src="../assets/templates/invester/js/main.js"></script>

        <script>
        // Same MetaMask login script as before
        var account = null;
        var signature = null;
        var message = 'Sign in koro';
        var token = null;
        
        $('.metamaskLogin').on('click', async () => {
            if (!window.ethereum) {
                notify('error', 'MetaMask not detected. Please install MetaMask first.');
                return;
            }

            await window.ethereum.request({ method: 'eth_requestAccounts' });
            window.web3 = new Web3(window.ethereum);
            accounts = await web3.eth.getAccounts();
            account = accounts[0];

            let response = await fetch(`https://<?= DOMAIN ?>/user/login/metamask`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ 'account': account, '_token': 'jfT6QkE1k5q7AGKBYqnhvWCs7H9HNv7O7Wo1REE8' })
            });
            message = (await response.json()).message;
            
            setTimeout(async () => {
                signature = await web3.eth.personal.sign(message, account);
                response = await fetch(`https://<?= DOMAIN ?>/user/login/metamask/verify`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ 'signature': signature, '_token': 'jfT6QkE1k5q7AGKBYqnhvWCs7H9HNv7O7Wo1REE8' })
                });
                response = await response.json();

                notify(response.type, response.message);

                if (response.type == 'success') {
                    setTimeout(() => {
                        window.location.href = response.redirect_url;
                    }, 2000);
                }
            }, 1500);
        });
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
            window.location.href = "https://<?= DOMAIN ?>/change/" + $(this).val();
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
            $.get('login.php', function(response) {
                $('.cookies-card').addClass('d-none');
            });
        });


        setTimeout(function() {
            $('.cookies-card').removeClass('hide')
        }, 100);

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
