<?php 
  require '../details.php';
  include 'security.php';
  require 'user.php';
//   include '../ip_security.php';

    function getUserPendingDepositsSum($userId) {
        global $conn; // Use the global database connection
        $id = mysqli_real_escape_string($conn, $userId);
        // Sum up only pending deposits for this user
        $sql = "SELECT SUM(amt) AS total FROM transaction WHERE user_id = '$id' AND status = 'deposit' AND serial = 0";
        $result = mysqli_query($conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['total'] ? $row['total'] : 0;
        } else {
            return 0;
        }
    }

     function getUserTradeProfits($userId) {
        global $conn; // Use the global database connection
        $id = mysqli_real_escape_string($conn, $userId);
        // Sum up only successful trade profits for this user
        $sql = "SELECT SUM(profit) AS total FROM trade WHERE user = '$id' AND status = 2";
        $result = mysqli_query($conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['total'] ? $row['total'] : 0;
        } else {
            return 0;
        }
    }

    function getUserTradeCount($userId) {
        global $conn; // Use the global database connection
        $id = mysqli_real_escape_string($conn, $userId);
        // Count only successful trades for this user
        $sql = "SELECT SUM(amount) AS total FROM trade WHERE user = '$id' AND status = 2";
        $result = mysqli_query($conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['total'] ? $row['total'] : 0;
        } else {
            return 0;
        }
    }

    function getUserTradeActive($userId) {
        global $conn; // Use the global database connection
        $id = mysqli_real_escape_string($conn, $userId);
        // Count only active trades for this user
        $sql = "SELECT SUM(amount) AS total FROM trade WHERE user = '$id' AND status IN (0, 1)";
        $result = mysqli_query($conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['total'] ? $row['total'] : 0;
        } else {
            return 0;
        }
    }

    function getUserTradeProfitPending($userId) {
        global $conn; // Use the global database connection
        $id = mysqli_real_escape_string($conn, $userId);
        // Count only pending profits for this user
        $sql = "SELECT SUM(profit) AS total FROM trade WHERE user = '$id' AND status IN (0, 1)";
        $result = mysqli_query($conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['total'] ? $row['total'] : 0;
        } else {
            return 0;
        }
    }
    function getUserTradeCountPending($userId) {
        global $conn; // Use the global database connection
        $id = mysqli_real_escape_string($conn, $userId);
        // Count only pending trades for this user
        $sql = "SELECT COUNT(*) AS total FROM trade WHERE user = '$id' AND status IN (0, 1)";
        $result = mysqli_query($conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['total'] ? $row['total'] : 0;
        } else {
            return 0;
        }
    }

    function getUserTradePending($userId) {
        global $conn; // Use the global database connection
        $id = mysqli_real_escape_string($conn, $userId);
        // Count only pending trades for this user
        $sql = "SELECT * FROM trade WHERE user = '$id' AND status IN (0, 1) ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
            }
        }
        return $rows;
    }

    function getUserAllTrade($userId) {
        global $conn; // Use the global database connection
        $id = mysqli_real_escape_string($conn, $userId);
        // Count all trades for this user
        $sql = "SELECT * FROM trade WHERE user = '$id' ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
            }
        }
        return $rows;
    }

    function getUserWithdrawals($userId) {
        global $conn; // Use the global database connection
        $id = mysqli_real_escape_string($conn, $userId);
        // Count all withdrawals for this user
        $sql = "SELECT * FROM transaction WHERE user_id = '$id' AND status = 'withdraw' ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
            }
        }
        return $rows;
    }

    function getUserTransactions($userId) {
        global $conn; // Use the global database connection
        $id = mysqli_real_escape_string($conn, $userId);
        // Count all transactions for this user
        $sql = "SELECT * FROM transaction WHERE user_id = '$id' ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
            }
        }
        return $rows;
    }

?>

<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= NAME ?> - Dashboard</title>
    <meta name="title" Content="<?= NAME ?> - Dashboard">

    <meta name="description" content="HYIPLab - <?= NAME ?> . Most Advanced HYIP Investment System Script in codecanyon.\\n\\nhyip, bitcoin, investment,  hyip business, hyip script, best hyip, buy hyip script, advanced hyip script, hyip software, high yield investment program, hyip manager, hyip manager script, cheap hyip script, reliable hyip, secure hyip script, php hyip script, new hyip script, hyip program">
    <meta name="keywords" content="hyip,bitcoin,investment,hyip business,hyip script,best hyip,buy hyip script,advanced hyip script,hyip software,hight yield investment program,Hyip manager,hyip manager script,cheap hyip script,realable hyip,secure hyip script,php hyip script,new hyip script,hyip program">
    <link rel="shortcut icon" href="../uploads/<?= FAV ?>" type="image/x-icon">

    
    <link rel="apple-touch-icon" href="../uploads/<?= LOGO ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?= NAME ?> - Dashboard">
    
    <meta itemprop="name" content="<?= NAME ?> - Dashboard">
    <meta itemprop="description" content="HYIPLab - <?= NAME ?> . Most Advanced HYIP Investment System Script in codecanyon.\\n\\nhyip, bitcoin, investment,  hyip business, hyip script, best hyip, buy hyip script, advanced hyip script, hyip software, high yield investment program, hyip manager, hyip manager script, cheap hyip script, reliable hyip, secure hyip script, php hyip script, new hyip script, hyip program">
    <meta itemprop="image" content="../uploads<?= LOGO ?>">
    
    <meta property="og:type" content="website">
    <meta property="og:title" content="HYIPLab - <?= NAME ?>">
    <meta property="og:description" content="HYIPLab - <?= NAME ?> . Most Advanced HYIP Investment System Script in codecanyon.">
    <meta property="og:image" content="../uploads<?= LOGO ?>"/>
    <meta property="og:image:type" content="jpg"/>
    <meta property="og:image:width" content="1180" />
    <meta property="og:image:height" content="600" />
    <meta property="og:url" content="https://<?= DOMAIN ?>/dashboard">
    
    <meta name="twitter:card" content="summary_large_image">
    <!-- font  -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,400;1,500&family=Maven+Pro:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">



    <link href="assets/global/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/global/css/all.min.css" rel="stylesheet">
    <link href="assets/global/css/auth.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/global/css/line-awesome.min.css" />

    <link rel="stylesheet" href="assets/templates/invester/css/lib/animate.css">

    <!-- Plugin Link -->
    <link rel="stylesheet" href="assets/templates/invester/css/lib/slick.css">
    <link rel="stylesheet" href="assets/templates/invester/css/lib/magnific-popup.css">
    <link rel="stylesheet" href="assets/templates/invester/css/lib/apexcharts.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/templates/invester/css/main.css">

    
    <link rel="stylesheet" href="assets/templates/invester/css/custom.css">

    <link rel="stylesheet" href="assets/templates/invester/css/color.php?color=0023f4">

    <script src="https://kit.fontawesome.com/5db7e7763e.js" crossorigin="anonymous"></script>

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

    <style>
        .custom-progress {
            max-width: 40px !important;
            max-height: 40px;
            transform: rotate(-90deg);
        }

        .custom-progress .bg-circle {
            stroke: #00000011;
            fill: none;
            stroke-width: 4px;
            position: relative;
            z-index: -1;
        }

        .custom-progress .progress-circle {
            fill: none;
            stroke: hsl(var(--base));
            stroke-width: 4px;
            z-index: 11;
            position: absolute;
        }

        .expired-time-circle {
            position: relative;
            border: none !important;
            height: 38px;
            width: 38px;
            margin-right: 7px;
        }

        .expired-time-circle::before {
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 4px solid #dbdce1;
        }

        .expired-time-circle.danger-border .animation-circle {
            border-color: hsl(var(--base)) !important;
        }

        .animation-circle {
            position: absolute;
            top: 0;
            left: 0;
            border: 4px solid hsl(var(--base));
            height: 100%;
            width: 100%;
            border-radius: 150px;
            transform: rotateY(180deg);
            animation-name: clipCircle;
            animation-iteration-count: 1;
            animation-timing-function: cubic-bezier(0, 0, 1, 1);
            z-index: 1;
        }

        .account-wrapper .left .top {
            margin-top: 0;
        }

        .account-wrapper .left,
        .account-wrapper .right {
            width: 100%;
        }

        .account-wrapper .right {
            padding-left: 0;
            margin-top: 35px;
        }

        @keyframes clipCircle {
            0% {
                clip-path: polygon(50% 50%, 50% 0%, 50% 0%, 50% 0%, 50% 0%, 50% 0%, 50% 0%, 50% 0%, 50% 0%, 50% 0%);
                /* center, top-center*/
            }

            12.5% {
                clip-path: polygon(50% 50%, 50% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%);
                /* center, top-center, top-left*/
            }

            25% {
                clip-path: polygon(50% 50%, 50% 0%, 0% 0%, 0% 50%, 0% 50%, 0% 50%, 0% 50%, 0% 50%, 0% 50%, 0% 50%);
                /* center, top-center, top-left, left-center*/
            }

            37.5% {
                clip-path: polygon(50% 50%, 50% 0%, 0% 0%, 0% 50%, 0% 100%, 0% 100%, 0% 100%, 0% 100%, 0% 100%, 0% 100%);
                /* center, top-center, top-left, left-center, bottom-left*/
            }

            50% {
                clip-path: polygon(50% 50%, 50% 0%, 0% 0%, 0% 50%, 0% 100%, 50% 100%, 50% 100%, 50% 100%, 50% 100%, 50% 100%);
                /* center, top-center, top-left, left-center, bottom-left, bottom-center*/
            }

            62.5% {
                clip-path: polygon(50% 50%, 50% 0%, 0% 0%, 0% 50%, 0% 100%, 50% 100%, 100% 100%, 100% 100%, 100% 100%, 100% 100%);
                /* center, top-center, top-left, left-center, bottom-left, bottom-center, bottom-right*/
            }

            75% {
                clip-path: polygon(50% 50%, 50% 0%, 0% 0%, 0% 50%, 0% 100%, 50% 100%, 100% 100%, 100% 50%, 100% 50%, 100% 50%);
                /* center, top-center, top-left, left-center, bottom-left, bottom-center, bottom-right, right-center*/
            }

            87.5% {
                clip-path: polygon(50% 50%, 50% 0%, 0% 0%, 0% 50%, 0% 100%, 50% 100%, 100% 100%, 100% 50%, 100% 0%, 100% 0%);
                /* center, top-center, top-left, left-center, bottom-left, bottom-center, bottom-right, right-center top-right*/
            }

            100% {
                clip-path: polygon(50% 50%, 50% 0%, 0% 0%, 0% 50%, 0% 100%, 50% 100%, 100% 100%, 100% 50%, 100% 0%, 50% 0%);
                /* center, top-center, top-left, left-center, bottom-left, bottom-center, bottom-right, right-center top-right, top-center*/
            }
        }

        .capital-back {
            font-size: 10px;
        }

        .invest-details-link {
            height: 40px;
            width: 40px;
            line-height: 40px;
            text-align: center;
            border: 1px solid #c3bfbf;
            border-radius: 50px;
            color: #c3bfbf;
        }

        .invest-details-link:hover {
            border-color: #a7a7a7;
            color: #a7a7a7;
        }
    </style>

</head>