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
            <div class="bg--light">
                <div class="dashboard-inner ">
                    <div class="mb-4">
                        <div class="row mb-4">
                            <div class="col-lg-8">
                                <h3 class="mb-2">Investment Plan</h3>
                            </div>
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
                        <div class="row gy-4">
                            <?php
                                function getMaxInterest($min, $max, $per) {
                                    if ($max == 0) {
                                        return number_format(($min * $per) / 100, 2);
                                    } else {
                                        return number_format(($max * $per) / 100, 2);
                                    }
                                }

                                $sql = "SELECT * FROM plan WHERE status = 1 ORDER BY id DESC";
                                $run = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($run)) {
                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="plan-item style--two text-center mw-100 w-100 h-100">
                                    <div class="plan-item__header">
                                        <h4 class="mb-1 plan-title"><?= $row['name'] ?></h4>
                                        <p class="mb-2">Total <?= $row['per'] ?>% ROI</p>
                                        <div class="plan-rate">
                                            <h3 class="rate"><?= $row['per'] ?>%</h3>
                                            <p>FOR <?= $row['duration'] ?> Hour(s)</p>
                                        </div>
                                    </div>
                                    <div class="plan-item__body my-4">
                                        <ul class="list list-style-three text-start">
                                            <li class="d-flex flex-wrap justify-content-between align-items-center">
                                                <span class="label">Investment</span>
                                                <span class="value">$<?= number_format($row['min'], 2) ?> - <?= ($row['max'] == 0) ? 'Unlimited' : '$' . number_format($row['max'], 2); ?></span>
                                            </li>
                                            <li class="d-flex flex-wrap justify-content-between align-items-center">
                                                <span class="label">Max. Earn</span>
                                                <span class="value"><?= getMaxInterest($row['min'], $row['max'], $row['per']) ?> USD</span>
                                            </li>
                                            <li class="d-flex flex-wrap justify-content-between align-items-center">
                                                <span class="label">Total Return</span>
                                                <span class="value">capital + <?= $row['per'] ?>%</span>
                                            </li>
                                            <li>
                                                Compound interest available
                                            </li>
                                            <li>
                                                Hold capital & reinvest
                                            </li>
                                        </ul>
                                    </div>
                                    <button class="cmn--btn plan-btn btn mt-2 investModal" data-bs-toggle="modal" data-plan="{&quot;id&quot;:<?= $row['id'] ?>,&quot;time_setting_id&quot;:5,&quot;name&quot;:&quot;<?= $row['name'] ?>&quot;,&quot;minimum&quot;:&quot;<?= number_format($row['min'], 2) ?>&quot;,&quot;maximum&quot;:&quot;<?= ($row['max'] == 0) ? 'Unlimited' : number_format($row['max'], 2); ?>&quot;,&quot;fixed_amount&quot;:&quot;0.00000000&quot;,&quot;interest&quot;:&quot;<?= $row['per'] ?>&quot;,&quot;interest_type&quot;:1,&quot;repeat_time&quot;:&quot;1&quot;,&quot;lifetime&quot;:0,&quot;capital_back&quot;:1,&quot;compound_interest&quot;:1,&quot;hold_capital&quot;:1,&quot;featured&quot;:1,&quot;status&quot;:1,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;time_setting&quot;:{&quot;id&quot;:<?= $row['id'] ?>,&quot;name&quot;:&quot;<?= $row['duration'] ?> Days&quot;,&quot;time&quot;:&quot;<?= $row['duration'] ?>&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;}}" data-bs-target="#investModal" type="button">Invest Now</button>
                                </div>
                            </div>

                            <div class="modal fade" id="investModal">
                                <div class="modal-dialog modal-lg modal-dialog-centered modal-content-bg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm to invest on <span class="planName"></span></h5>
                                            <button type="button" class="close" data-bs-dismiss="modal">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <form action="code.php" method="post" id="investForm">
                                            <input type="hidden" name="_token" value="Rl6nikVoa3o45jTzwrKb4seoP72kc3Hi1l3rVgq9">
                                            <input type="hidden" name="plan_id" value="<?= $row['id'] ?>">
                                            <input type="hidden" name="gateway_data" id="gateway_data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <h6 class="text-center investAmountRange"></h6>
                                                    <p class="text-center mt-1 interestDetails"></p>
                                                    <p class="text-center interestValidity"></p>
                                                    <p class="text-center"><strong class="calculatedInterest"></strong></p>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Pay Via</label>
                                                            <select class="form-control form--control form-select" name="wallet_type" required id="wallet_type_select">
                                                                <option value="">Select One</option>
                                                                <option value="5"  data-gateway="{&quot;id&quot;:5,&quot;name&quot;:&quot;Balance&quot;,&quot;currency&quot;:&quot;usd&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1004,&quot;gateway_alias&quot;:&quot;cardano_(ada)&quot;,&quot;min_amount&quot;:&quot;<?= $row['min'] ?>&quot;,&quot;max_amount&quot;:&quot;<?= $row['max'] ?>&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:null,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;method&quot;:{&quot;id&quot;:63,&quot;form_id&quot;:6,&quot;code&quot;:&quot;1004&quot;,&quot;name&quot;:&quot;Balance&quot;,&quot;alias&quot;:&quot;balance&quot;,&quot;status&quot;:true,&quot;supported_currencies&quot;:[],&quot;crypto&quot;:0,&quot;description&quot;:&quot;Account Balance:&lt;div&gt;&lt;b&gt;<?= bal ?>&lt;\/b&gt;&lt;\/div&gt;&quot;,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;}}">Balance</option>
                                                                <option value="4"  data-gateway="{&quot;id&quot;:4,&quot;name&quot;:&quot;BTC&quot;,&quot;currency&quot;:&quot;usd&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1003,&quot;gateway_alias&quot;:&quot;cro&quot;,&quot;min_amount&quot;:&quot;<?= $row['min'] ?>&quot;,&quot;max_amount&quot;:&quot;<?= $row['max'] ?>&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:null,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;method&quot;:{&quot;id&quot;:62,&quot;form_id&quot;:5,&quot;code&quot;:&quot;1003&quot;,&quot;name&quot;:&quot;BTC&quot;,&quot;alias&quot;:&quot;btc&quot;,&quot;status&quot;:true,&quot;supported_currencies&quot;:[],&quot;crypto&quot;:0,&quot;description&quot;:&quot;make payment to address:&lt;div&gt;&lt;b&gt;<?= BTC ?>&lt;\/b&gt;&lt;\/div&gt;&quot;,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;}}">BTC</option>
                                                                <option value="3"  data-gateway="{&quot;id&quot;:3,&quot;name&quot;:&quot;USDT(trc20)&quot;,&quot;currency&quot;:&quot;Usd&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1002,&quot;gateway_alias&quot;:&quot;solana_(sol)&quot;,&quot;min_amount&quot;:&quot;<?= $row['min'] ?>&quot;,&quot;max_amount&quot;:&quot;<?= $row['max'] ?>&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:null,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;method&quot;:{&quot;id&quot;:61,&quot;form_id&quot;:4,&quot;code&quot;:&quot;1002&quot;,&quot;name&quot;:&quot;USDT(trc20)&quot;,&quot;alias&quot;:&quot;usdt(trc20)&quot;,&quot;status&quot;:true,&quot;supported_currencies&quot;:[],&quot;crypto&quot;:0,&quot;description&quot;:&quot;Make Payments to address:&lt;div&gt;&lt;b&gt;<?= TRC ?>&lt;\/b&gt;&lt;br&gt;&lt;\/div&gt;&quot;,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;}}">USDT(trc20)</option>
                                                                <option value="2"  data-gateway="{&quot;id&quot;:2,&quot;name&quot;:&quot;USDT(erc20)&quot;,&quot;currency&quot;:&quot;Usd&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1001,&quot;gateway_alias&quot;:&quot;usdt_trc20&quot;,&quot;min_amount&quot;:&quot;<?= $row['min'] ?>&quot;,&quot;max_amount&quot;:&quot;<?= $row['max'] ?>&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:null,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;method&quot;:{&quot;id&quot;:60,&quot;form_id&quot;:3,&quot;code&quot;:&quot;1001&quot;,&quot;name&quot;:&quot;USDT(erc20)&quot;,&quot;alias&quot;:&quot;usdt(erc20)&quot;,&quot;status&quot;:true,&quot;supported_currencies&quot;:[],&quot;crypto&quot;:0,&quot;description&quot;:&quot;Make payments to wallet:&lt;div&gt;&lt;b&gt;<?= ERC ?>&lt;\/b&gt;&lt;br&gt;&lt;\/div&gt;&quot;,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;}}">USDT(erc20)</option>
                                                                <option value="1"  data-gateway="{&quot;id&quot;:1,&quot;name&quot;:&quot;ETH&quot;,&quot;currency&quot;:&quot;usd&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1000,&quot;gateway_alias&quot;:&quot;xrp&quot;,&quot;min_amount&quot;:&quot;<?= $row['min'] ?>&quot;,&quot;max_amount&quot;:&quot;<?= $row['max'] ?>&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:null,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;method&quot;:{&quot;id&quot;:59,&quot;form_id&quot;:2,&quot;code&quot;:&quot;1000&quot;,&quot;name&quot;:&quot;ETH&quot;,&quot;alias&quot;:&quot;eth&quot;,&quot;status&quot;:true,&quot;supported_currencies&quot;:[],&quot;crypto&quot;:0,&quot;description&quot;:&quot;Make payments to address: &lt;b&gt;<?= ETH ?>&lt;\/b&gt;&quot;,&quot;created_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;,&quot;updated_at&quot;:&quot;<?= date("Y-m-d H:i:s", time()) ?>&quot;}}">ETH</option>
                                                            </select>
                                                            <code class="gateway-info rate-info d-none">Rate: 1 USD = <span class="gateway-rate"></span> <span class="method_currency"></span></code>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Invest Amount</label>
                                                            <div class="input-group">
                                                                <input type="number" step="any" min="10" class="form-control form--control" name="amount" required>
                                                                <div class="input-group-text">USD</div>
                                                            </div>
                                                            <code class="gateway-info d-none">Charge: <span class="charge"></span> USD. Total amount: <span class="total"></span> USD</code>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-md-6 compoundInterest">
                                                        <div class="form-group">
                                                            <label>Compound Interest (optional)</label>
                                                            <div class="input-group">
                                                                <input type="number" min="0" class="form-control form--control" name="compound_interest">
                                                                <div class="input-group-text">Times</div>
                                                            </div>
                                                            <small class="fst-italic text--info"><i class="fas fa-info-circle"></i> Your interest will add to the investment capital amount for a specific time that you're entering.</small>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 investTime">
                                                        <div class="form-group">
                                                            <label>Auto Schedule Invest</label>
                                                            <select class="form-control form--control form-select" name="invest_time" required>
                                                                <option value="invest_now">Invest Now</option>
                                                                <option value="schedule">Schedule</option>
                                                            </select>
                                                            <small class="fst-italic text--info"><i class="fas fa-info-circle"></i> You can set your investment as a scheduler or invest instant.</small>
                                                        </div>
                                                    </div> -->
                                                </div>

                                                <!-- <div class="row schedule">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="required">Schedule For</label>
                                                            <div class="input-group">
                                                                <input type="number" min="0" class="form-control form--control" name="schedule_times">
                                                                <span class="input-group-text">Times</span>
                                                            </div>
                                                            <small class="fst-italic text--info"><i class="fas fa-info-circle"></i> Set how many times you want to invest.</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="required">After</label>
                                                            <div class="input-group">
                                                                <input type="number" min="0" class="form-control form--control" name="hours">
                                                                <span class="input-group-text">Hours</span>
                                                            </div>
                                                            <small class="fst-italic text--info"><i class="fas fa-info-circle"></i> Set a frequency at which you prefer to make investments.</small>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn--dark" data-bs-dismiss="modal">No</button>
                                                <button type="submit" name="plan" class="btn btn--base">Yes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>


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
    <!-- <script>
    Set gateway_data hidden input to selected option's data-gateway JSON on submit'
    $(document).on('submit', '#investForm', function(e) {
        var selected = $('#wallet_type_select option:selected');
        var gateway = selected.data('gateway');
        if (gateway) {
            $('#gateway_data').val(JSON.stringify(gateway));
        } else {
            $('#gateway_data').val('');
        }
    });
    </script> -->

        <script>
        (function($) {
            "use strict"
            var symbol = '$';
            var currency = 'USD';
            var plan;

            $('.investModal').click(function() {
                $('.gateway-info').addClass('d-none');
                var modal = $('#investModal');
                plan = $(this).data('plan');
                modal.find('[name=plan_id]').val(plan.id);
                modal.find('.planName').text(plan.name);
                let fixedAmount = parseFloat(plan.fixed_amount).toFixed(2);
                let minimumAmount = plan.minimum;
                let maximumAmount = plan.maximum;
                let interestAmount = parseFloat(plan.interest);

                if (plan.fixed_amount > 0) {
                    modal.find('.investAmountRange').text(`Invest: ${symbol}${fixedAmount}`);
                    modal.find('[name=amount]').val(parseFloat(plan.fixed_amount).toFixed(2));
                    modal.find('[name=amount]').attr('readonly', true);
                } else {
                    modal.find('.investAmountRange').text(`Invest: ${symbol}${minimumAmount} - ${symbol}${maximumAmount}`);
                    modal.find('[name=amount]').val('');
                    modal.find('[name=amount]').removeAttr('readonly');
                }

                if (plan.interest_type == '1') {
                    modal.find('.interestDetails').html(`<strong> Interest: ${interestAmount}% </strong>`);
                } else {
                    modal.find('.interestDetails').html(`<strong> Interest: ${interestAmount} ${currency}  </strong>`);
                }

                if (plan.lifetime == '0') {
                    modal.find('.interestValidity').html(`<strong>  Every ${plan.time_setting.time} hours for ${plan.repeat_time} times</strong>`);
                } else {
                    modal.find('.interestValidity').html(`<strong>  Every ${plan.time_setting.time} hours for life time </strong>`);
                }

                if (plan.compound_interest == '1') {
                    $('.compoundInterest').show();
                    $('.investTime').removeClass('col-md-12');
                } else {
                    $('.compoundInterest').hide();
                    $('.investTime').addClass('col-md-12');
                }
                calculateInterest();
            });

            $('[name=amount]').on('input', function() {
                $('[name=wallet_type]').trigger('change');
                calculateInterest();
            })

            $('[name=wallet_type]').change(function() {
                var amount = $('[name=amount]').val();
                var resource = $('select[name=wallet_type] option:selected').data('gateway');
                $('#gateway_data').val(JSON.stringify(resource));
                if ($(this).val() && $(this).val() != 'deposit_wallet' && $(this).val() != 'interest_wallet' && amount) {
                    var resource = $('select[name=wallet_type] option:selected').data('gateway');
                    $('#gateway_data').val(JSON.stringify(resource));
                    var fixed_charge = parseFloat(resource.fixed_charge);
                    var percent_charge = parseFloat(resource.percent_charge);
                    var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                    $('.charge').text(charge);
                    $('.gateway-rate').text(parseFloat(resource.rate));
                    $('.gateway-info').removeClass('d-none');
                    if (resource.currency == 'USD') {
                        $('.rate-info').addClass('d-none');
                    } else {
                        $('.rate-info').removeClass('d-none');
                    }
                    $('.method_currency').text(resource.currency);
                    $('.total').text(parseFloat(charge) + parseFloat(amount));
                } else {
                    $('.gateway-info').addClass('d-none');
                }
            });

            $('[name=invest_time]').on('change', function() {
                let investTime = $(this).find(':selected').val();
                if (investTime == 'invest_now') {
                    $('.schedule').hide();
                } else {
                    $('.schedule').show();
                }
            }).change();

            $('[name=schedule_times]').on('input', function() {
                let text = $(this).val() == 1 ? `After` : `Every`;
                $('[name=hours]').closest('.form-group').find('label').text(text);
            });

            $('[name=compound_interest]').on('input', function() {
                calculateInterest();
            })

            function calculateInterest() {
                let interest = parseFloat(plan.interest);
                let interestType = plan.interest_type; //1: percent, 0: fixed
                let repeatTime = plan.repeat_time;
                let capitalBack = plan.capital_back;
                let investAmount = $('[name=amount]').val() * 1;
                let compoundInterest = $('[name=compound_interest]').val() ?? 0;
                let calculatedInterest = 0;
                let baseInterest = 0;

                if (repeatTime == 0 || investAmount == 0) {
                    $('.calculatedInterest').hide();
                    return false;
                } else {
                    $('.calculatedInterest').show();
                }

                let totalInterest = interest * repeatTime;

                if (interestType == '1') {
                    if (compoundInterest > 0) {
                        let remainingRepeatTime = repeatTime - compoundInterest;
                        let interestRatio = 1 + interest / 100;
                        let compoundCapital = investAmount * Math.pow(interestRatio, compoundInterest);
                        totalInterest = (compoundCapital * interest / 100) * remainingRepeatTime;
                    } else {
                        totalInterest = interest * investAmount / 100 * repeatTime;
                    }
                }

                totalInterest = capitalBack ? totalInterest : totalInterest - investAmount;
                $('.calculatedInterest').text(`Total Profit ` + symbol + totalInterest.toFixed(2));
            }

            
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
