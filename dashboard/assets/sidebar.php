<div class="dashboard-sidebar" id="dashboard-sidebar">
    <button class="btn-close dash-sidebar-close d-xl-none"></button>
    <a href="../" class="logo"><img src="../uploads/<?= LOGO; ?>" alt="images"></a>
    <div class="bg--lights">
    <div class="balance-card p-3 rounded-3 bg-transparent">
    <!-- Header -->
    <p class="balance-label mb-2 text-uppercase fs--12px fw-bold text-muted">ACCOUNT BALANCE</p>

    <!-- Wallets -->
    <div class="wallets mb-3">
    <!-- Deposit Wallet -->
    <div class="wallet-glass-card mb-3 p-3 d-flex align-items-center" style="border-radius:13px">
        <div class="wallet-icon me-2 rounded-circle bg-primary-10 p-2">
            <i class="fas fa-wallet fs--16px text-primary"></i>
        </div>
        <div class="flex-grow-1">
            <h4 class="wallet-amount mb-0 fs--24px fw-bold text-dark">
                <?= number_format(bal, 2) ?>
                <small class="fs--12px text-muted d-block">USD • Deposit</small>
            </h4>
        </div>
    </div>
    
    <!-- Interest Wallet -->
    <div class="wallet-glass-card p-3 d-flex align-items-center" style="border-radius:13px">
        <div class="wallet-icon me-2 rounded-circle bg-success-10 p-2">
            <i class="fas fa-percent fs--16px text-success"></i>
        </div>
        <div class="flex-grow-1">
            <p class="wallet-amount mb-0 fs--20px fw-bold text-dark">
                <?= number_format(profit, 2) ?>
                <small class="fs--12px text-muted d-block">USD • Interest</small>
            </p>
        </div>
    </div>
</div>
    
    <!-- Actions -->
    <div class="actions d-flex gap-3">
    <a href="deposit.php" class="btn-deposit">
        <i class="fas fa-plus-circle"></i>
        <span>Deposit</span>
    </a>
    <a href="withdraw.php" class="btn-withdraw">
        <i class="fas fa-minus-circle"></i>
        <span>Withdraw</span>
    </a>
</div>
</div>
    </div>
    <ul class="sidebar-menu">
    <li>
        <a href="./" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9 22V12H15V22" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="invest-statistics.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 20V10M18 20V4M6 20V16" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Projects</span>
        </a>
    </li>
        <!-- <li>
        <a href="schedule-invests.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 10H3M16 2V6M8 2V6M7.8 22H16.2C17.8802 22 18.7202 22 19.362 21.673C19.9265 21.3854 20.3854 20.9265 20.673 20.362C21 19.7202 21 18.8802 21 17.2V8.8C21 7.11984 21 6.27976 20.673 5.63803C20.3854 5.07354 19.9265 4.6146 19.362 4.32698C18.7202 4 17.8802 4 16.2 4H7.8C6.11984 4 5.27976 4 4.63803 4.32698C4.07354 4.6146 3.6146 5.07354 3.32698 5.63803C3 6.27976 3 7.11984 3 8.8V17.2C3 18.8802 3 19.7202 3.32698 20.362C3.6146 20.9265 4.07354 21.3854 4.63803 21.673C5.27976 22 6.11984 22 7.8 22Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Schedule Investment</span>
        </a>
    </li> -->
                <li>
        <a href="deposit.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M19.4 15C19.2669 15.3016 19.227 15.6363 19.2863 15.9606C19.3455 16.2849 19.5007 16.5816 19.7276 16.8084C19.9544 17.0353 20.2416 17.1805 20.5664 17.2237C20.8912 17.2669 21.2354 17.2053 21.537 17.05L21.65 17C22.4406 16.5368 22.7516 15.5474 22.2884 14.7569C21.8252 13.9663 20.8358 13.6553 20.0453 14.1185L19.35 14.55C19.1244 14.683 18.9616 14.8986 18.8983 15.1488C18.835 15.399 18.8768 15.663 19.013 15.883L19.4 15Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4.6 15C4.73314 15.3016 4.77296 15.6363 4.71372 15.9606C4.65448 16.2849 4.49926 16.5816 4.27243 16.8084C4.04559 17.0353 3.74893 17.1805 3.42464 17.2237C3.10035 17.2669 2.75616 17.2053 2.45455 17.05L2.35 17C1.55945 16.5368 1.24844 15.5474 1.71165 14.7569C2.17487 13.9663 3.16428 13.6553 3.95483 14.1185L4.65 14.55C4.87557 14.683 5.03843 14.8986 5.1017 15.1488C5.16497 15.399 5.12318 15.663 4.987 15.883L4.6 15Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 15V19" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 5V9" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4.6 9C4.73314 8.69839 4.77296 8.36368 4.71372 8.03941C4.65448 7.71514 4.49926 7.41843 4.27243 7.19159C4.04559 6.96475 3.74893 6.81953 3.42464 6.77628C3.10035 6.73303 2.75616 6.79466 2.45455 6.95L2.35 7C1.55945 7.46321 1.24844 8.45262 1.71165 9.24317C2.17487 10.0337 3.16428 10.3447 3.95483 9.88152L4.65 9.45C4.87557 9.317 5.03843 9.10144 5.1017 8.85122C5.16497 8.601 5.12318 8.33704 4.987 8.117L4.6 9Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M19.4 9C19.2669 8.69839 19.227 8.36368 19.2863 8.03941C19.3455 7.71514 19.5007 7.41843 19.7276 7.19159C19.9544 6.96475 20.2416 6.81953 20.5664 6.77628C20.8912 6.73303 21.2354 6.79466 21.537 6.95L21.65 7C22.4406 7.46321 22.7516 8.45262 22.2884 9.24317C21.8252 10.0337 20.8358 10.3447 20.0453 9.88152L19.35 9.45C19.1244 9.317 18.9616 9.10144 18.8983 8.85122C18.835 8.601 18.8768 8.33704 19.013 8.117L19.4 9Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Deposit</span>
        </a>
    </li>
    <li>
        <a href="withdraw.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M19.4 15C19.2669 15.3016 19.227 15.6363 19.2863 15.9606C19.3455 16.2849 19.5007 16.5816 19.7276 16.8084C19.9544 17.0353 20.2416 17.1805 20.5664 17.2237C20.8912 17.2669 21.2354 17.2053 21.537 17.05L21.65 17C22.4406 16.5368 22.7516 15.5474 22.2884 14.7569C21.8252 13.9663 20.8358 13.6553 20.0453 14.1185L19.35 14.55C19.1244 14.683 18.9616 14.8986 18.8983 15.1488C18.835 15.399 18.8768 15.663 19.013 15.883L19.4 15Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4.6 15C4.73314 15.3016 4.77296 15.6363 4.71372 15.9606C4.65448 16.2849 4.49926 16.5816 4.27243 16.8084C4.04559 17.0353 3.74893 17.1805 3.42464 17.2237C3.10035 17.2669 2.75616 17.2053 2.45455 17.05L2.35 17C1.55945 16.5368 1.24844 15.5474 1.71165 14.7569C2.17487 13.9663 3.16428 13.6553 3.95483 14.1185L4.65 14.55C4.87557 14.683 5.03843 14.8986 5.1017 15.1488C5.16497 15.399 5.12318 15.663 4.987 15.883L4.6 15Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 15V19" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 5V9" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4.6 9C4.73314 8.69839 4.77296 8.36368 4.71372 8.03941C4.65448 7.71514 4.49926 7.41843 4.27243 7.19159C4.04559 6.96475 3.74893 6.81953 3.42464 6.77628C3.10035 6.73303 2.75616 6.79466 2.45455 6.95L2.35 7C1.55945 7.46321 1.24844 8.45262 1.71165 9.24317C2.17487 10.0337 3.16428 10.3447 3.95483 9.88152L4.65 9.45C4.87557 9.317 5.03843 9.10144 5.1017 8.85122C5.16497 8.601 5.12318 8.33704 4.987 8.117L4.6 9Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M19.4 9C19.2669 8.69839 19.227 8.36368 19.2863 8.03941C19.3455 7.71514 19.5007 7.41843 19.7276 7.19159C19.9544 6.96475 20.2416 6.81953 20.5664 6.77628C20.8912 6.73303 21.2354 6.79466 21.537 6.95L21.65 7C22.4406 7.46321 22.7516 8.45262 22.2884 9.24317C21.8252 10.0337 20.8358 10.3447 20.0453 9.88152L19.35 9.45C19.1244 9.317 18.9616 9.10144 18.8983 8.85122C18.835 8.601 18.8768 8.33704 19.013 8.117L19.4 9Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Withdraw</span>
        </a>
    </li>
        <!-- <li>
        <a href="balance-transfer.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 16H17M7 16L11 12M7 16L11 20M17 8H7M17 8L13 4M17 8L13 12" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Transfer Balance</span>
        </a>
    </li> -->
        <!-- <li class="sidebar-menu-item">
        <a href="crypto/portfolio.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L13.09 8.26L19 9L13.09 9.74L12 16L10.91 9.74L5 9L10.91 8.26L12 2Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M17 12L18.5 16.5L22 17L18.5 17.5L17 22L15.5 17.5L12 17L15.5 16.5L17 12Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Crypto Portfolio</span>
            <i class="fas fa-angle-down submenu-toggle"></i>
        </a>
        <ul class="sidebar-submenu">
            <li><a href="crypto/portfolio.php" class="">Portfolio Overview</a></li>
            <li><a href="crypto/buy-xyptocurrency.php" class="">Buy Crypto</a></li>
            <li><a href="crypto/crypto-swap.php" class="">Swap Coins</a></li>
            <li><a href="crypto/crypto-swap.php" class="">Transfer to Wallet</a></li>
            <li><a href="crypto/crypto-transactions.php" class="">Transaction History</a></li>
        </ul>
    </li> -->
    <li>
        <a href="transactions.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 7L20 7M20 7L16 3M20 7L16 11M16 17L4 17M4 17L8 21M4 17L8 13" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Transactions</span>
        </a>
    </li>
        <!-- <li>
        <a href="invest-logs.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 11L18 13L22 9M12 8H12.01M12 12H12.01M12 16H12.01M5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Ranking</span>
        </a>
    </li> -->
        <li>
        <a href="referrals.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 21V19C16 17.9391 15.5786 16.9217 14.8284 16.1716C14.0783 15.4214 13.0609 15 12 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21M12.5 7C12.5 9.20914 10.7091 11 8.5 11C6.29086 11 4.5 9.20914 4.5 7C4.5 4.79086 6.29086 3 8.5 3C10.7091 3 12.5 4.79086 12.5 7ZM23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13M16 3.13C16.8604 3.3503 17.623 3.8507 18.1676 4.55231C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89317 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Referrals</span>
        </a>
    </li>
        <!-- <li>
        <a href="tickets.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5L5 5Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Support Ticket</span>
        </a>
    </li> -->
    <!-- <li>
        <a href="2FA-settings.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 15V15.01M12 12C12.8284 12 13.5 11.3284 13.5 10.5C13.5 9.67157 12.8284 9 12 9C11.1716 9 10.5 9.67157 10.5 10.5C10.5 11.3284 11.1716 12 12 12ZM7 10H5V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V10H17M7 10V6C7 3.79086 8.79086 2 11 2H13C15.2091 2 17 3.79086 17 6V10M7 10H17" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>2FA</span>
        </a>
    </li> -->
    <li>
        <a href="profile-setting.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12ZM12 12C15.3137 12 18 14.6863 18 18V19C18 19.5523 17.5523 20 17 20H7C6.44772 20 6 19.5523 6 19V18C6 14.6863 8.68629 12 12 12Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Profile</span>
        </a>
    </li>
    <li>
        <a href="change-password.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 15V17M6 21H18C19.1046 21 20 20.1046 20 19V13C20 11.8954 19.1046 11 18 11H6C4.89543 11 4 11.8954 4 13V19C4 20.1046 4.89543 21 6 21ZM16 11V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V11H16Z" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Change Password</span>
        </a>
    </li>
    <li>
        <a style="color: #ef4444;" href="logout.php" class="">
            <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 17L21 12M21 12L16 7M21 12H9M9 3H7C5.89543 3 5 3.89543 5 5V19C5 20.1046 5.89543 21 7 21H9" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Logout</span>
        </a>
    </li>
</ul>


</div>