<?php
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

       <?= include 'assets/navbar.php'; ?>
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
                        <h3 class="method-title mb-2">Deposit Funds</h3>
                        <p class="method-subtitle">Add funds using our system's gateway. The deposited amount will be credited to the deposit wallet. You'll just make investments from this wallet.</p>
                    </div>
                    <div class="text-end mb-3">
                        <a href="deposit-history.php" class="btn btn--secondary btn--smd"><i class="fas fa-long-arrow-alt-left"></i> Deposit History</a>
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

                    <form action="deposit_process.php" method="post">
                        <input type="hidden" name="_token" value="Rl6nikVoa3o45jTzwrKb4seoP72kc3Hi1l3rVgq9">                
                        <input type="hidden" name="method_code">
                        <input type="hidden" name="currency">
                        <input type="hidden" name="gateway_data" id="gateway_data">
                        <div class="card custom--card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Select Payment Method</label>
                                            <select class="form-select form-control form--control" name="gateway" required>
                                                <option value="">Select One</option>
                                        
                                                <option value="1003"  data-gateway="{&quot;id&quot;:4,&quot;name&quot;:&quot;BTC&quot;,&quot;wallet&quot;:&quot;<?= BTC ?>&quot;,&quot;currency&quot;:&quot;usd&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1003,&quot;gateway_alias&quot;:&quot;btc&quot;,&quot;min_amount&quot;:&quot;10.00&quot;,&quot;max_amount&quot;:&quot;100000000.00&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:null,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;method&quot;:{&quot;id&quot;:62,&quot;form_id&quot;:5,&quot;code&quot;:&quot;1003&quot;,&quot;name&quot;:&quot;BTC&quot;,&quot;alias&quot;:&quot;btc&quot;,&quot;status&quot;:true,&quot;supported_currencies&quot;:[],&quot;crypto&quot;:0,&quot;description&quot;:&quot;Make payment to address:&lt;div&gt;&lt;b&gt;<?= BTC ?>&lt;\/b&gt;&lt;\/div&gt;&quot;}}">Bitcoin (BTC)</option>
                                                <option value="1002"  data-gateway="{&quot;id&quot;:3,&quot;name&quot;:&quot;ETH&quot;,&quot;wallet&quot;:&quot;<?= ETH ?>&quot;,&quot;currency&quot;:&quot;Usd&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1002,&quot;gateway_alias&quot;:&quot;eth&quot;,&quot;min_amount&quot;:&quot;10.00&quot;,&quot;max_amount&quot;:&quot;1000000.00&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:null,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;method&quot;:{&quot;id&quot;:61,&quot;form_id&quot;:4,&quot;code&quot;:&quot;1002&quot;,&quot;name&quot;:&quot;ETH&quot;,&quot;alias&quot;:&quot;eth&quot;,&quot;status&quot;:true,&quot;supported_currencies&quot;:[],&quot;crypto&quot;:0,&quot;description&quot;:&quot;Make Payments to address:&lt;div&gt;&lt;b&gt;<?= ETH ?>&lt;\/b&gt;&lt;br&gt;&lt;\/div&gt;&quot;}}">Ethereum (ETH)</option>
                                                <option value="1001"  data-gateway="{&quot;id&quot;:2,&quot;name&quot;:&quot;USDT(trc20)&quot;,&quot;wallet&quot;:&quot;<?= TRC ?>&quot;,&quot;currency&quot;:&quot;Usd&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1001,&quot;gateway_alias&quot;:&quot;trc20&quot;,&quot;min_amount&quot;:&quot;10.00&quot;,&quot;max_amount&quot;:&quot;1000000.00&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:null,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;method&quot;:{&quot;id&quot;:60,&quot;form_id&quot;:3,&quot;code&quot;:&quot;1001&quot;,&quot;name&quot;:&quot;USDT(trc20)&quot;,&quot;alias&quot;:&quot;trc20&quot;,&quot;status&quot;:true,&quot;supported_currencies&quot;:[],&quot;crypto&quot;:0,&quot;description&quot;:&quot;Make payments to wallet:&lt;div&gt;&lt;b&gt;<?= TRC ?>&lt;\/b&gt;&lt;br&gt;&lt;\/div&gt;&quot;}}">Usdt TRC20</option>
                                                <option value="1000"  data-gateway="{&quot;id&quot;:1,&quot;name&quot;:&quot;USDT(erc20)&quot;,&quot;wallet&quot;:&quot;<?= ERC ?>&quot;,&quot;currency&quot;:&quot;usd&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1000,&quot;gateway_alias&quot;:&quot;erc20&quot;,&quot;min_amount&quot;:&quot;10.00&quot;,&quot;max_amount&quot;:&quot;10000.00&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:null,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;method&quot;:{&quot;id&quot;:59,&quot;form_id&quot;:2,&quot;code&quot;:&quot;1000&quot;,&quot;name&quot;:&quot;USDT(erc20)&quot;,&quot;alias&quot;:&quot;erc20&quot;,&quot;status&quot;:true,&quot;supported_currencies&quot;:[],&quot;crypto&quot;:0,&quot;description&quot;:&quot;Make payments to wallet: &lt;b&gt;<?= ERC ?>&lt;\/b&gt;&quot;}}">Usdt ERC20</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Amount</label>
                                            <div class="input-group">
                                                <input type="number" step="any" name="amount" class="form-control form--control" min="1" value="" autocomplete="off" required>
                                                <span class="input-group-text">USD</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="preview-details d-none mt-4">
                                    <div class="payment-summary-card p-4 rounded-3">
                                        <div class="payment-detail">
                                            <span class="detail-label">Limit</span>
                                            <span class="detail-value">
                                                <span class="min fw-bold">0</span> USD - 
                                                <span class="max fw-bold">0</span> USD
                                            </span>
                                        </div>
                                        
                                        <div class="payment-detail">
                                            <span class="detail-label">Charge</span>
                                            <span class="detail-value">
                                                <span class="charge fw-bold">0</span> USD
                                            </span>
                                        </div>
                                        
                                        <div class="payment-detail highlight">
                                            <span class="detail-label">Payable</span>
                                            <span class="detail-value">
                                                <span class="payable fw-bold">0</span> USD
                                            </span>
                                        </div>
                                        
                                        <div class="payment-detail d-none rate-element">
                                            <!-- Conversion rate will be inserted here -->
                                        </div>
                                        
                                        <div class="payment-detail d-none in-site-cur">
                                            <span class="detail-label">In <span class="method_currency"></span></span>
                                            <span class="detail-value">
                                                <span class="final_amo fw-bold">0</span>
                                            </span>
                                        </div>
                                        
                                        <div class="crypto-notice crypto_currency d-none p-3 rounded-2 mt-3">
                                            <i class="las la-info-circle me-2"></i>
                                            Conversion with <span class="method_currency"></span> and final value will show on next step        </div>
                                    </div>
                                </div>
                                <button type="submit" name="deposit_preview" class="btn btn--base w-100 mt-3">Continue On Payment</button>
                            </div>
                        </div>
                    </form>
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
            $('select[name=gateway]').change(function(){
                if(!$('select[name=gateway]').val()){
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                var resource = $('select[name=gateway] option:selected').data('gateway');
                $('#gateway_data').val(JSON.stringify(resource));
                var fixed_charge = parseFloat(resource.fixed_charge);
                var percent_charge = parseFloat(resource.percent_charge);
                var rate = parseFloat(resource.rate)
                if(resource.method.crypto == 1){
                    var toFixedDigit = 8;
                    $('.crypto_currency').removeClass('d-none');
                }else{
                    var toFixedDigit = 2;
                    $('.crypto_currency').addClass('d-none');
                }
                $('.min').text(parseFloat(resource.min_amount).toFixed(2));
                $('.max').text(parseFloat(resource.max_amount).toFixed(2));
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
                var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
                $('.payable').text(payable);
                var final_amo = (parseFloat((parseFloat(amount) + parseFloat(charge)))*rate).toFixed(toFixedDigit);
                $('.final_amo').text(final_amo);
                if (resource.currency != 'USD') {
                    var rateElement = `<span class="fw-bold">Conversion Rate</span> <span><span  class="fw-bold">1 USD = <span class="rate">${rate}</span>  <span class="method_currency">${resource.currency}</span></span></span>`;
                    $('.rate-element').html(rateElement)
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
                $('.method_currency').text(resource.currency);
                $('input[name=currency]').val(resource.currency);
                $('input[name=method_code]').val(resource.method_code);
                $('input[name=amount]').on('input');
            });
            $('input[name=amount]').on('input',function(){
                $('select[name=gateway]').change();
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
