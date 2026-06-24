<?php 
    include 'assets/header.php';

    function getUserDepositsSum($userId) {
        global $conn; // Use the global database connection
        $id = mysqli_real_escape_string($conn, $userId);
        // Sum up only successful deposits for this user
        $sql = "SELECT SUM(amt) AS total FROM transaction WHERE user_id = '$id' AND status = 'deposit' AND serial = 1";
        $result = mysqli_query($conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['total'] ? $row['total'] : 0;
        } else {
            return 0;
        }
    }

    function getUserWithdrawalsSum($userId) {
        global $conn; // Use the global database connection
        $id = mysqli_real_escape_string($conn, $userId);
        // Sum up only successful withdrawals for this user
        $sql = "SELECT SUM(amt) AS total FROM transaction WHERE user_id = '$id' AND status = 'withdraw' AND serial = 1";
        $result = mysqli_query($conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['total'] ? $row['total'] : 0;
        } else {
            return 0;
        }
    }
    
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

            <!-- Smartsupp Live Chat script -->
<style>
    .stat-icon.bg-purple {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }
    
    .stat-icon.bg-green {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
    }
    
    .stat-icon.bg-red {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%) !important;
    }
    
    .stat-icon.bg-pink {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%) !important;
    }
    
    .stat-icon.bg-blue {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%) !important;
    }
    
    .stat-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
    }
    
    .crypto-portfolio-link {
        transition: all 0.3s ease;
        border-radius: 8px;
        padding: 8px;
    }
    
    .crypto-portfolio-link:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
    }
    
    .crypto-portfolio-link .value,
    .crypto-portfolio-link .label {
        color: white !important;
    }
</style>

    <div class="dashboard-inner">
        <?php 
            if (isset($_SESSION['welcome'])) {
                ?>
                    <h3 class="text-secondary">👋Welcome, <?= ucfirst(acct_id) ?> ! </h3>
                    <br>
                <?php
                unset($_SESSION['welcome']);
            }
        ?>
        <!-- <h2 class="name text--base">priest12</h2> -->

         <?php if (getUserDepositsSum(acct_id) <= 0) { ?>
                <div class="alert border border--danger" role="alert">
                    <div class="alert__icon d-flex align-items-center text--danger"><i class="fas fa-exclamation-triangle"></i></div>
                    <p class="alert__message">
                        <span class="fw-bold">Empty Balance</span><br>
                        <small><i>Your balance is empty. Please make <a href="deposit.php" class="link-color">deposit</a> for your next investment.</i></small>
                    </p>
                </div>
            <?php }

           if (getUserPendingDepositsSum(acct_id) > 0) { ?>
            <div class="alert border border--primary" role="alert">
                <div class="alert__icon d-flex align-items-center text--primary"><i class="fas fa-spinner"></i></div>
                <p class="alert__message">
                    <span class="fw-bold">Deposit Pending</span><br>
                    <small><i>Total <?= number_format(getUserPendingDepositsSum(acct_id), 2) ?> USD deposit request is pending. Please wait for admin approval. See <a href="deposit-history.php" class="link-color">deposit history</a></i></small>
                </p>
            </div>
            <?php } ?>
        
        

        
        
        <div class="row g-2 mt-2">
        <div class="col-lg-5">
    <div class="dashboard-widget balance-widget" style="border-bottom: none; min-height: 90px; background-color: #093ca1; background-size: cover; background-position: center; color: #fff; position: relative;">
        <!-- Hide/Show Toggle Button -->
        <button class="balance-toggle" style="position: absolute; top: 10px; right: 10px; background: rgba(255,255,255,0.2); border: none; color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer;">
            <i class="bi bi-eye-fill toggle-icon"></i>
        </button>
        
        <div class="d-flex justify-content-between">
            <h5 style="color: #fff !important;" class="text-secondary">Account Balance</h5>
        </div>
        
        <!-- Balance amount with hide/show class -->
        <h3 class="text--secondary my-4 balance-amount" style="color: #fff !important;">
            <span class="amount">$<?= number_format(bal, 2) ?></span> 
        </h3>
        
        <div class="widget-lists">
            <div class="row g-2">
                <div class="col-6">
                    <div class="stat-card d-flex align-items-center gap-2">
                        <div class="stat-icon bg-pink">
                            <i class="bi bi-arrow-down-circle-fill"></i>
                        </div>
                        <div>
                            <p class="label mb-1 fw-semibold text-white">Deposited</p>
                            <span class="value balance-value">$<?= number_format(getUserDepositsSum(acct_id), 2) ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-card d-flex align-items-center gap-2">
                        <div class="stat-icon bg-blue">
                            <i class="bi bi-arrow-up-circle-fill"></i>
                        </div>
                        <div>
                            <p class="label mb-1 fw-semibold text-white">Withdrawal</p>
                            <span class="value balance-value">$<?= number_format(getUserWithdrawalsSum(acct_id), 2) ?></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Crypto Portfolio Section -->
                    </div>
    </div>
</div>
            <!---
            <div class="col-lg-4">
                <div class="dashboard-widget">
                    <div class="d-flex justify-content-between">
                        <h5 class="text-secondary">Successful Withdrawals</h5>
                    </div>
                    <h3 class="text--secondary my-4">0.00 USD</h3>
                    <div class="widget-lists">
                        <div class="row">
                            <div class="col-4">
                                <p class="fw-bold">Submitted</p>
                                <span>$0.00</span>
                            </div>
                            <div class="col-4">
                                <p class="fw-bold">Pending</p>
                                <span>$0.00</span>
                            </div>
                            <div class="col-4">
                                <p class="fw-bold">Rejected</p>
                                <span>$0.00</span>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div> --->
            <div class="col-lg-7">
    <div class="dashboard-widget investment-widget">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="widget-title">Total Investments</h5>
            <button class="widget-menu">
                <i class="fas fa-ellipsis-v"></i>
            </button>
        </div>
        <h3 class="investment-amount"><?= number_format(profit, 2) ?> <span class="currency">USD</span></h3>
        
        <div class="investment-stats">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon completed">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <p class="stat-label">Completed</p>
                        <p class="stat-value">$<?= number_format(getUserTradeCount(acct_id), 2) ?></p>
                    </div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon running">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <div class="stat-content">
                        <p class="stat-label">Running</p>
                        <p class="stat-value">$<?= number_format(getUserTradeActive(acct_id), 2) ?></p>
                    </div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon interest">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="stat-content">
                        <p class="stat-label">Interests</p>
                        <p class="stat-value">$<?= number_format(getUserTradeProfits(acct_id), 2) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>

        


        <div class="row g-3 mt-4">
            <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "description": "",
      "proName": "BITSTAMP:BTCUSD"
    },
    {
      "description": "",
      "proName": "COINBASE:ETHUSD"
    },
    {
      "description": "",
      "proName": "BINANCE:SOLUSD"
    },
    {
      "description": "",
      "proName": "BITSTAMP:XRPUSD"
    },
    {
      "description": "",
      "proName": "BITFINEX:XLMUSD"
    }
  ],
  "showSymbolLogo": true,
  "isTransparent": true,
  "displayMode": "adaptive",
  "colorTheme": "light",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
    <div class="col-lg-12">
        <div class="dashboard-widget">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-secondary mb-0">Recent Transactions</h5>
            </div>
            <div class="accordion table--acordion" id="transactionAccordion">    
                <div class="accordion-body text-center p-4">
                    <!-- Add custom styles for the transaction table -->
                    <style>
                        .transaction-table {
                            width: 100%;
                            border-collapse: separate;
                            border-spacing: 0;
                            background: #f8fafc;
                            border-radius: 12px;
                            overflow: hidden;
                            box-shadow: 0 2px 8px rgba(9,60,161,0.05);
                            margin-bottom: 0;
                        }
                        .transaction-table thead {
                            background: #093ca1;
                        }
                        .transaction-table th, .transaction-table td {
                            padding: 0.85rem 1.2rem;
                            text-align: left;
                            font-size: 1rem;
                        }
                        .transaction-table th {
                            color: #fff;
                            font-weight: 600;
                            border-bottom: 2px solid #e5e7eb;
                        }
                        .transaction-table tbody tr {
                            transition: background 0.2s;
                        }
                        .transaction-table tbody tr:hover {
                            background: #eaf1fb;
                        }
                        .transaction-table td {
                            color: #334155;
                            border-bottom: 1px solid #e5e7eb;
                            vertical-align: middle;
                        }
                        .transaction-table td.status {
                            font-weight: 600;
                            text-transform: capitalize;
                        }
                        .transaction-table .status-pending {
                            color: #f59e42;
                            background: #fff7e6;
                            border-radius: 6px;
                            padding: 0.25em 0.75em;
                            display: inline-block;
                        }
                        .transaction-table .status-approved {
                            color: #22c55e;
                            background: #e6f9f0;
                            border-radius: 6px;
                            padding: 0.25em 0.75em;
                            display: inline-block;
                        }
                        .transaction-table .status-rejected {
                            color: #ef4444;
                            background: #fdeaea;
                            border-radius: 6px;
                            padding: 0.25em 0.75em;
                            display: inline-block;
                        }
                        @media (max-width: 600px) {
                            .transaction-table th, .transaction-table td {
                                padding: 0.6rem 0.5rem;
                                font-size: 0.95rem;
                            }
                        }
                    </style>

                    <table class="transaction-table">
                        <?php
                            $sql = "SELECT * FROM transaction WHERE user_id = '" . acct_id . "' ORDER BY create_date DESC LIMIT 10";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                        ?>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Transaction</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . date("Y-m-d H:i:s", strtotime($row['create_date'])) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['status'] === 'deposit' || $row['status'] === 'withdraw' ? ucfirst($row['status']) : 'other') . "</td>";
                                    echo "<td>$" . number_format($row['amt'], 2) . "</td>";
                                    // Status badge
                                    if ($row['serial'] == 0) {
                                        echo "<td class='status'><span class='status-pending'>Pending</span></td>";
                                    } elseif ($row['serial'] == 1) {
                                        echo "<td class='status'><span class='status-approved'>Approved</span></td>";
                                    } elseif ($row['serial'] == 2) {
                                        echo "<td class='status'><span class='status-rejected'>Rejected</span></td>";
                                    } else {
                                        echo "<td class='status'><span>Unknown</span></td>";
                                    }
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <?php } else { ?>
                        <h4 class="text--muted mb-0"><i class="far fa-frown"></i> Data not found</h4>
                    <?php } ?>
                </div>
            </div> 
        </div>
    </div>
    
 <!---
        <div id="myPopup" class="popup">
    <div class="popup-content">
        <span class="close-button" id="closePopup">&times;</span>
        <div class="popup-header">
            <h2>Crestlink-AI Top Partner</h2>
            <p>Beneficial Packages</p>
        </div>
        <div class="popup-body">
            <ul>
                <li>Partner's Loan (Investment Loan, Business Loan, Education and Residential Loan)</li>
                <li>Spousal Visa Support</li>
                <li>Relocation Packages</li>
                <li>Education Packages</li>
                <li>Citizenship By Investment</li>
            </ul>
        </div>
        <div class="popup-footer">
            <button id="closePopupButton" class="popup-button">Close</button>
        </div>
    </div>
</div>

        <div class="card-body">
                    <h4 class="mb-1">My unique referral link</h4>
                                        <p class="mb-3">Get 10 - 12 Percent commission At <strong><i>Bluewave ISO</i></strong> Finance. If you reach the level, you'll get commission.</p>
                    <div class="copy-link">
                        <input type="text" class="copyURL" value="https://bluewave-iso.net?reference=priest12" readonly>
                        <span class="copyBoard" id="copyBoard"><i class="fas fa-copy"></i> <strong class="copyText">Copy</strong></span>
                    </div>
                </div>
    </div>
--->

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

    <script src="assets/templates/invester//js/lib/apexcharts.min.js"></script>

<script>
    const popup = document.getElementById("myPopup");
    const closePopupButton = document.getElementById("closePopupButton");
    const closeButton = document.getElementById("closePopup");

    // Show popup on page load
    window.addEventListener('load', () => {
        popup.style.display = "block";
        document.body.classList.add('overflow-hidden');
    });

    closePopupButton.addEventListener("click", () => {
        popup.style.display = "none";
        document.body.classList.remove('overflow-hidden');
    });

    closeButton.addEventListener("click", () => {
        popup.style.display = "none";
        document.body.classList.remove('overflow-hidden');
    });

    window.addEventListener("click", (event) => {
        if (event.target === popup) {
            popup.style.display = "none";
            document.body.classList.remove('overflow-hidden');
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.querySelector('.balance-toggle');
        const widget = document.querySelector('.balance-widget');
        const amountElements = document.querySelectorAll('.balance-amount, .balance-value');
        
        // Check localStorage for saved preference
        const isHidden = localStorage.getItem('balanceHidden') === 'true';
        if (isHidden) {
            widget.classList.add('balance-hidden');
            toggleBalance();
        }
        
        // Toggle functionality
        toggleBtn.addEventListener('click', function() {
            widget.classList.toggle('balance-hidden');
            toggleBalance();
            localStorage.setItem('balanceHidden', widget.classList.contains('balance-hidden'));
        });
        
        function toggleBalance() {
            amountElements.forEach(el => {
                if (widget.classList.contains('balance-hidden')) {
                    el.setAttribute('data-original', el.textContent);
                    el.textContent = '****';
                } else {
                    const original = el.getAttribute('data-original');
                    if (original) el.textContent = original;
                }
            });
        }
    });
</script>

<script>

    // apex-line chart
    var options = {
        chart: {
            height: 350,
            type: "area",
            toolbar: {
                show: false
            },
            dropShadow: {
                enabled: true,
                enabledSeries: [0],
                top: -2,
                left: 0,
                blur: 10,
                opacity: 0.08,
            },
            animations: {
                enabled: true,
                easing: 'linear',
                dynamicAnimation: {
                    speed: 1000
                }
            },
        },
        dataLabels: {
            enabled: false
        },
        series: [
            {
                name: "Price",
                data: [
                    
                ]
            }
        ],
        fill: {
            type: "gradient",
            colors: ['#4c7de6', '#4c7de6', '#4c7de6'],
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.6,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        xaxis: {
            title: "Value",
            categories: [
                            ]
        },
        grid: {
            padding: {
                left: 5,
                right: 5
            },
            xaxis: {
                lines: {
                    show: false
                }
            },
            yaxis: {
                lines: {
                    show: false
                }
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();

    
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

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
    </script>
</body>

</html>
