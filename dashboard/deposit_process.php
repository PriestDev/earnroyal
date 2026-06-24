<?php
    
    if (isset($_POST['deposit_preview'])) {
        $amount = $_POST['amount'];
        $gatewayData = json_decode($_POST['gateway_data'], true);

        if ($amount <= 0) {
            $_SESSION['error'] = "Invalid amount";
            header('location: deposit.php');
        }
    } elseif (isset($_SESSION['deposit_plan']) && $_SESSION['deposit_plan'] != null) {
        $amount = $_SESSION['amount'];
        $gatewayData = $_SESSION['gateway_data'];

        if ($amount <= 0) {
            $_SESSION['error'] = "Invalid amount";
            header('location: plan.php');
        }
        unset($_SESSION['deposit_plan']);
    } else {
        $_SESSION['status'] = 'Create deposit request';
        header('location: deposit.php');
        exit(); 
    }

    function getWalletAddress($gatewayData) {
        if ($gatewayData['method']['name'] == 'USDT(trc20)') {
            return 'Usdt:'.TRC;
        } elseif ($gatewayData['method']['name'] == 'BTC') {
            return 'Bitcoin:'.BTC;
        }elseif ($gatewayData['method']['name'] == 'ETH') {
            return 'Ethereum:'.ETH;
        }elseif ($gatewayData['method']['name'] == 'USDT(erc20)') {
            return 'Usdt:'.ERC;
        } else {
            return null;
        }
    }

    include 'assets/header.php';
?>

<body>
    

<div class="d-flex flex-wrap">

   <?php include 'assets/sidebar.php'; ?>

<style>
.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.sidebar-menu li a {
    display: flex;
    align-items: center;
    padding: 0.75rem 1.25rem;
    color: #4b5563;
    text-decoration: none;
    border-radius: 0.5rem;
    transition: all 0.2s ease;
    font-weight: 500;
}

.sidebar-menu li a:hover {
    background-color: #f3f4f6;
    color: #1e40af;
}

.sidebar-menu li a.active {
    background-color: #eff6ff;
    color: #1e40af;
}

.sidebar-menu li a span {
    margin-left: 0.75rem;
}

.menu-icon {
    width: 20px;
    height: 20px;
    flex-shrink: 0;
}

/* Active state styling */
.sidebar-menu li a.active .menu-icon {
    stroke: #2563eb;
}

/* Submenu styling */
.sidebar-menu-item {
    position: relative;
}

.sidebar-submenu {
    list-style: none;
    padding: 0;
    margin: 0;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    background-color: #f8f9fa;
    border-radius: 0.5rem;
    margin-top: 0.25rem;
}

.sidebar-submenu.show {
    max-height: 300px;
}

.sidebar-submenu li a {
    padding: 0.5rem 1rem 0.5rem 2.5rem;
    font-size: 0.875rem;
    color: #6b7280;
    border-radius: 0.375rem;
    margin: 0.125rem 0.5rem;
}

.sidebar-submenu li a:hover,
.sidebar-submenu li a.active {
    background-color: #e5e7eb;
    color: #1e40af;
}

.submenu-toggle {
    margin-left: auto;
    transition: transform 0.3s ease;
    font-size: 0.875rem;
}

.submenu-toggle.rotated {
    transform: rotate(180deg);
}

.sidebar-menu-item > a {
    position: relative;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .sidebar-menu {
        flex-direction: row;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    
    .sidebar-menu li {
        flex: 1 0 calc(50% - 0.5rem);
    }
    
    .sidebar-menu li a {
        padding: 0.75rem;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }
    
    .sidebar-menu li a span {
        margin-left: 0;
        margin-top: 0.5rem;
        font-size: 0.75rem;
    }
    
    .menu-icon {
        width: 18px;
        height: 18px;
    }
    
    .submenu-toggle {
        display: none;
    }
    
    .sidebar-submenu {
        position: static;
        max-height: none;
        background: transparent;
        margin-top: 0;
    }
    
    .sidebar-submenu li {
        flex: 1 0 100%;
        margin-top: 0.25rem;
    }
    
    .sidebar-submenu li a {
        padding: 0.5rem;
        margin: 0;
        font-size: 0.75rem;
        background-color: rgba(59, 130, 246, 0.1);
        border-radius: 0.375rem;
    }
}

@media (max-width: 480px) {
    .sidebar-menu li {
        flex: 1 0 100%;
    }
    
    .sidebar-menu li a {
        flex-direction: row;
        justify-content: flex-start;
        text-align: left;
    }
    
    .sidebar-menu li a span {
        margin-left: 0.75rem;
        margin-top: 0;
        font-size: 0.875rem;
    }
    
    .submenu-toggle {
        display: inline-block;
        margin-left: auto;
    }
}
</style>

<script>
// Add animation delays
document.querySelectorAll('.sidebar-menu li').forEach((li, index) => {
    li.style.setProperty('--i', index);
});

// Submenu toggle functionality
document.querySelectorAll('.sidebar-menu-item > a').forEach(item => {
    item.addEventListener('click', function(e) {
        // Only prevent default if this has a submenu
        const submenu = this.parentElement.querySelector('.sidebar-submenu');
        if (submenu) {
            e.preventDefault();
            
            const toggle = this.querySelector('.submenu-toggle');
            const isOpen = submenu.classList.contains('show');
            
            // Close all other submenus
            document.querySelectorAll('.sidebar-submenu.show').forEach(openSubmenu => {
                if (openSubmenu !== submenu) {
                    openSubmenu.classList.remove('show');
                    const otherToggle = openSubmenu.parentElement.querySelector('.submenu-toggle');
                    if (otherToggle) {
                        otherToggle.classList.remove('rotated');
                    }
                }
            });
            
            // Toggle current submenu
            if (isOpen) {
                submenu.classList.remove('show');
                if (toggle) toggle.classList.remove('rotated');
            } else {
                submenu.classList.add('show');
                if (toggle) toggle.classList.add('rotated');
            }
        }
    });
});

// Auto-open submenu if current page is a submenu item
document.addEventListener('DOMContentLoaded', function() {
    const activeSubmenuItem = document.querySelector('.sidebar-submenu li a.active');
    if (activeSubmenuItem) {
        const submenu = activeSubmenuItem.closest('.sidebar-submenu');
        const toggle = submenu.parentElement.querySelector('.submenu-toggle');
        submenu.classList.add('show');
        if (toggle) toggle.classList.add('rotated');
    }
});
</script> 
    <div class="dashboard-wrapper">

        <?php include 'assets/navbar.php'; ?>
<style>
  /* Toggle container */
.invert-toggle {
  background: none;
  border: none;
  padding: 5px;
  cursor: pointer;
}

/* Slider track */
.toggle-slider {
  display: block;
  width: 60px;
  height: 28px;
  background: #e0e0e0;
  border-radius: 14px;
  position: relative;
  transition: background 0.3s ease;
}

/* Slider knob */
.toggle-knob {
  position: absolute;
  left: 2px;
  top: 2px;
  width: 24px;
  height: 24px;
  background: white;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0,0,0,0.2);
  transition: transform 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* SVG icons */
.icon {
  position: absolute;
  width: 16px;
  height: 16px;
  stroke: currentColor;
  stroke-width: 2;
  stroke-linecap: round;
  fill: none;
  transition: opacity 0.3s ease;
}

.icon.moon {
  opacity: 0;
  fill: currentColor;
  stroke: none;
}
.method-header {
    background: linear-gradient(135deg, #f8f9ff 0%, #f0f3ff 100%);
    padding: 1.5rem;
    border-radius: 12px;
    border: 1px solid rgba(79, 70, 229, 0.1);
}

.method-title {
    color: #111827;
    font-weight: 700;
    position: relative;
    padding-bottom: 10px;
}

.method-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background:rgb(26, 77, 190);
    border-radius: 3px;
}

.method-subtitle {
    color: #6b7280;
    margin-bottom: 0;
}
/* Responsive */
@media (max-width: 767px) {
    .method-header {
        padding: 1rem;
    }
    
    .method-title {
        font-size: 1.5rem;
    }
    
    .btn-history, .btn-submit {
        padding: 10px 16px;
    }
}

/* Dark mode styles */
body.inverted .toggle-slider {
  background: #555;
}

body.inverted .toggle-knob {
  transform: translateX(32px);
}

body.inverted .icon.sun {
  opacity: 0;
}

body.inverted .icon.moon {
  opacity: 1;
}

/* Color inversion effect */
body.inverted {
  filter: invert(1) hue-rotate(180deg);
  background-color: white;
}

body.inverted img,
body.inverted video {
  filter: invert(1) hue-rotate(180deg);
}
</style>

        <div class=" dashboard-container ">

            <div class="dashboard-inner">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="method-header mb-4">
                <h3 class="method-title mb-2">Deposit Confirmation</h3>
                <p class="method-subtitle mb-1">Send deposit amount to the below information and submit required proof to the system's admin. The admin will check the request and will match the submitted proof. After verification, if everything is ok, the admin will approve the request and the amount will be deposited to your Deposit Wallet.</p>
            </div>
            <div class="card custom--card">
                <div class="card-header card-header-bg">
                    <h5 class="text-center"> <i class="fas fa-wallet"></i> <?= $gatewayData['method']['name'] ?> Payment</h5>
                </div>
                <div class="card-body  ">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="gdgNRvpuzpmbnS8XuTuWuUKJFTBSEJc9OmShIg9e">   
                        <input type="hidden" name="amount" value="<?= $amount ?>">  
                        <input type="hidden" name="p_meth" value="<?= $gatewayData['method']['name'] ?>">                   
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                
                                        // $gatewayData = json_decode($_POST['gateway_data'], true);
                                        // echo '<pre>';
                                        // print_r($gatewayData);
                                        // echo '</pre>';
                                        // echo $gatewayData['method']['description'];
                                ?>
                                <p class="text-center mt-2">You have requested <b class="text--success"><?= number_format($amount, 2) ?> USD</b> , Please pay <b class="text--success"><?= number_format($amount, 2) ?> USD </b> for successful payment</p>
                                
                                <div class="text-center my-4">
                                    <p><?= $gatewayData['method']['description'] ?></p>
                                </div>
                                <h4 class="text-center">OR</h4>
                                <div class="text-center mt2">
                                    <p>Scan below</p>
                                    <img height="250" width="250" id="qr" src="https://qrcode.tec-it.com/API/QRCode?data=bitcoin:<?= BTC; ?>" style="padding: 10px; background: #fff;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Upload Screenshot of Payment</label>
                                <input type="file" name="proof" class="form-control" accept=".png, .jpg, .jpeg" required>

                                    <!-- <input type="text"
                                    class="form-control form--control"
                                    name="transaction_hash"
                                    value=""
                                                > -->
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" name="deposit_btn" class="btn btn--base w-100">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>

        
    <script src="assets/global/js/jquery-3.6.0.min.js"></script>
    <script src="assets/global/js/bootstrap.bundle.min.js"></script>

    <!-- Pluglin Link -->
    <script src="assets/templates/invester/js/lib/slick.min.js"></script>
    <script src="assets/templates/invester/js/lib/magnific-popup.min.js"></script>
    <script src="assets/templates/invester/js/lib/apexcharts.min.js"></script>

    
    <!-- Main js -->
    <script src="assets/templates/invester/js/main.js"></script>

        <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        
        const toggle = document.getElementById('invertToggle');

        toggle.addEventListener('click', () => {
        document.body.classList.toggle('inverted');
        localStorage.setItem('colorInversion', document.body.classList.contains('inverted'));
        });

        // Check for saved preference
        if (localStorage.getItem('colorInversion') === 'true') {
        document.body.classList.add('inverted');
        }
            </script>

            
            <link rel="stylesheet" href="assets/global/css/iziToast.min.css">
        <script src="assets/global/js/iziToast.min.js"></script>


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
                window.location.href = "deposit_process.php" + $(this).val();
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
                $.get('cookie/accept', function(response) {
                    $('.cookies-card').addClass('d-none');
                });
            });


            setTimeout(function() {
                $('.cookies-card').removeClass('hide')
            }, 2000);
        </script>
    </body>

</html>
