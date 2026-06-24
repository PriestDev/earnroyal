<?php
    include 'assets/header.php';
?>

<body>
    

<div class="d-flex flex-wrap">

    <?php include 'assets/sidebar.php' ?>

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

        <?php include 'assets/navbar.php' ?>
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
                            <h3 class="method-title mb-2">Withdraw Funds</h3>
                            <p class="method-subtitle mb-1">The fund will be withdrawal only from Interest Wallet. So make sure that you've sufficient balance to the interest wallet. </p>
                        </div>
                        <div class="text-end mb-4">
                            <a href="withdraw-log.php" class="btn btn--secondary btn--smd"><i class="fas fa-long-arrow-alt-left"></i> Withdraw History</a>
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

                        <div class="card custom--card">
                            <div class="card-body">
                                <form action="code.php" method="post">
                                    <input type="hidden" name="_token" value="Rl6nikVoa3o45jTzwrKb4seoP72kc3Hi1l3rVgq9">
                                    
                                    <div class="form-group mb-3">
                                        <?php 
                                            if (wth_amt_status == 0) {
                                                ?>
                                                <label class="form-label">Select gateway</label>
                                                <select class="form-control form--control form-select" name="wth_select" required>
                                                    <option value="">Select Gateway</option>
                                                    <option value="2">Profit Balance: $<?= number_format(profit, 2) ?></option>
                                                    <option value="3">Referral Balance: $<?= number_format(ref, 2) ?></option>
                                                    <option value="1">Deposit Balance: $<?= number_format(bal, 2) ?></option>
                                                </select>
                                                <?php
                                            } elseif (wth_amt_status == 1) {
                                                ?>
                                                <label for="gateway">Withdrawable Amount ($)</label>
                                                <input type="text" class="form-control" name="wth_amt_u" readonly value="<?= wth_amt ?>" id="exampleInputEmail3">
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Payment Method</label>
                                        <select class="form-control form--control form-select" name="method_code" required>
                                            <option value="">Select Method</option>
                                            <option value="1" data-resource="{&quot;id&quot;:1,&quot;form_id&quot;:13,&quot;name&quot;:&quot;Bitcoin&quot;,&quot;min_limit&quot;:&quot;10.00000000&quot;,&quot;max_limit&quot;:&quot;10000000.00000000&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;currency&quot;:&quot;Usd&quot;,&quot;description&quot;:&quot;Paste withdrawal address&amp;nbsp;&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;}">  Bitcoin</option>
                                            <option value="2" data-resource="{&quot;id&quot;:2,&quot;form_id&quot;:14,&quot;name&quot;:&quot;USDT(trc20)&quot;,&quot;min_limit&quot;:&quot;10.00000000&quot;,&quot;max_limit&quot;:&quot;10000000.00000000&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;currency&quot;:&quot;Usd&quot;,&quot;description&quot;:&quot;Paste withdrawal address&amp;nbsp;&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;}">  USDT(trc20)</option>
                                            <option value="3" data-resource="{&quot;id&quot;:3,&quot;form_id&quot;:15,&quot;name&quot;:&quot;USDT(erc20)&quot;,&quot;min_limit&quot;:&quot;10.00000000&quot;,&quot;max_limit&quot;:&quot;10000000.00000000&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;currency&quot;:&quot;Usd&quot;,&quot;description&quot;:&quot;Paste withdrawal address&amp;nbsp;&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;}">  USDT(erc20)</option>
                                            <option value="4" data-resource="{&quot;id&quot;:4,&quot;form_id&quot;:16,&quot;name&quot;:&quot;Ethereum&quot;,&quot;min_limit&quot;:&quot;10.00000000&quot;,&quot;max_limit&quot;:&quot;10000000.00000000&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;currency&quot;:&quot;usd&quot;,&quot;description&quot;:&quot;Paste withdrawal address&amp;nbsp;&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;}">  Ethereum</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Amount</label>
                                        <div class="input-group">
                                            <input type="number" min="1" step="any" name="amount" value="" class="form-control form--control" required>
                                            <span class="input-group-text">USD</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Wallet Address</label>
                                        <div class="input-group">
                                            <input type="text" step="any" name="wallet" value="" class="form-control form--control" required>
                                        </div>
                                    </div>
                                    <!-- <div class="mt-3 preview-details d-none">
                                        <ul class="list-group text-center">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Limit</span>
                                                <span><span class="min fw-bold">0</span> USD - <span class="max fw-bold">0</span> USD</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Charge</span>
                                                <span><span class="charge fw-bold">0</span> USD</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Receivable</span> <span><span class="receivable fw-bold"> 0</span> USD </span>
                                            </li>
                                            <li class="list-group-item d-none justify-content-between rate-element">

                                            </li>
                                            <li class="list-group-item d-none justify-content-between in-site-cur">
                                                <span>In <span class="base-currency"></span></span>
                                                <strong class="final_amo">0</strong>
                                            </li>
                                        </ul>
                                    </div> -->
                                    <button type="submit" name="wth_btn" class="btn btn--base w-100 mt-3">Submit</button>
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
    (function ($) {
        "use strict";
        $('select[name=method_code]').change(function(){
            if(!$('select[name=method_code]').val()){
                $('.preview-details').addClass('d-none');
                return false;
            }
            var resource = $('select[name=method_code] option:selected').data('resource');
            var fixed_charge = parseFloat(resource.fixed_charge);
            var percent_charge = parseFloat(resource.percent_charge);
            var rate = parseFloat(resource.rate)
            var toFixedDigit = 2;
            $('.min').text(parseFloat(resource.min_limit).toFixed(2));
            $('.max').text(parseFloat(resource.max_limit).toFixed(2));
            var amount = parseFloat($('input[name=amount]').val());
            if (!amount) {
                amount = 0;
            }
            if(amount <= 0){
                $('.preview-details').addClass('d-none');
                return false;
            }
            $('.preview-details').removeClass('d-none');

            var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
            $('.charge').text(charge);
            if (resource.currency != 'USD') {
                var rateElement = `<span>Conversion Rate</span> <span class="fw-bold">1 USD = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span>`;
                $('.rate-element').html(rateElement);
                $('.rate-element').removeClass('d-none');
                $('.in-site-cur').removeClass('d-none');
                $('.rate-element').addClass('d-flex');
                $('.in-site-cur').addClass('d-flex');
            }else{
                $('.rate-element').html('')
                $('.rate-element').addClass('d-none');
                $('.in-site-cur').addClass('d-none');
                $('.rate-element').removeClass('d-flex');
                $('.in-site-cur').removeClass('d-flex');
            }
            var receivable = parseFloat((parseFloat(amount) - parseFloat(charge))).toFixed(2);
            $('.receivable').text(receivable);
            var final_amo = parseFloat(parseFloat(receivable)*rate).toFixed(toFixedDigit);
            $('.final_amo').text(final_amo);
            $('.base-currency').text(resource.currency);
            $('.method_currency').text(resource.currency);
            $('input[name=amount]').on('input');
        });
        $('input[name=amount]').on('input',function(){
            var data = $('select[name=method_code]').change();
            $('.amount').text(parseFloat($(this).val()).toFixed(2));
        });
    })(jQuery);
</script>
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
            window.location.href = "change/" + $(this).val();
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
