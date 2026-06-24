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

                <div class="dashboard-inner">
        <div class="method-header mb-4">
            <p>Investment</p>
            <h3 class="method-title mb-2">My Investment Statistics</h3>
            <p class="method-subtitle">Here you can find your active and closed investment and their start date, next return date, total return and more.</p>
        </div>

        <div class="mt-4">
            <div class="plan-list d-flex flex-wrap flex-xxl-column gap-3 gap-xxl-0">

                <?php
                    if (getUserAllTrade(acct_id) != null) {
                        ?>
                            <table class="plan-list table col-md-12">
                                <thead>
                                    <tr>
                                        <th>Plan</th>
                                        <th>Start Date</th>
                                        <th>Next Return</th>
                                        <th>Total Return</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $investments = getUserAllTrade(acct_id);
                                    foreach ($investments as $investment) {
                                        // Status badge color
                                        // $status = $investment['status'];
                                        // $badgeClass = 'badge ';
                                        // if ($status === 1 ){ $badgeClass .= 'bg-success'; $status .= 'active'; }
                                        // elseif ($status === 0) { $badgeClass .= 'bg-warning text-dark'; $status .= 'pending'; }
                                        // elseif ($status === 2) { $badgeClass .= 'bg-secondary'; $status .= 'closed'; }
                                        // else { $badgeClass .= 'bg-light text-dark'; }

                                        $badgeClass = 'badge ';
                                        $statusText = 'unknown'; // default fallback

                                        if (is_array($investment) && isset($investment['status'])) {
                                            switch ($investment['status']) {
                                                case 1:
                                                    $badgeClass .= 'text-success';
                                                    $statusText = 'active';
                                                    break;
                                                case 0:
                                                    $badgeClass .= 'text-warning';
                                                    $statusText = 'pending';
                                                    break;
                                                case 2:
                                                    $badgeClass .= 'text-secondary';
                                                    $statusText = 'closed';
                                                    break;
                                                default:
                                                    $badgeClass .= 'text-dark';
                                                    $statusText = 'unknown';
                                                    break;
                                            }
                                        } else {
                                            $badgeClass .= 'bg-danger';
                                            $statusText = 'invalid data';
                                        }

                                        // Now you can use $badgeClass and $statusText safely

                                    ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="planPoint" style="font-size:1.2em;">●</span>
                                                <span class="fw-semibold"><?= htmlspecialchars($investment['pair']) ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted"><?= date('M d, Y @g:i', strtotime($investment['create_date'])) ?></span>
                                        </td>
                                        <td>
                                            <span class="text-muted"><?= date('M d, Y @g:i', strtotime($investment['end_date'])) ?></span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-primary">$<?= number_format($investment['profit'], 2) ?></span>
                                        </td>
                                        <td>
                                            <span class="<?= $badgeClass ?> p-1" style="font-size:0.95em;"><?= ucfirst($statusText) ?></span>
                                        </td>
                                        
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <style>
                                .investments-table th {
                                    background: #f8fafc;
                                    color: #64748b;
                                    font-weight: 600;
                                    font-size: 0.95em;
                                    border-bottom: 1px solid #f1f5f9;
                                    letter-spacing: 0.03em;
                                }
                                .investments-table td {
                                    background: #fff;
                                    border-bottom: 1px solid #f1f5f9;
                                    vertical-align: middle;
                                    font-size: 1em;
                                }
                                .investments-table .planPoint {
                                    color: #3b82f6;
                                    vertical-align: middle;
                                }
                                .investments-table .fw-semibold {
                                    color: #1e293b;
                                }
                                .investments-table .text-primary {
                                    color: #2563eb !important;
                                }
                                .investments-table .badge {
                                    padding: 0.45em 0.8em;
                                    border-radius: 0.5em;
                                    font-size: 0.95em;
                                    letter-spacing: 0.01em;
                                }
                                .investments-table .btn-outline-primary {
                                    border-radius: 0.4em;
                                    padding: 0.35em 0.7em;
                                    font-size: 1em;
                                    transition: background 0.2s, color 0.2s;
                                }
                                .investments-table .btn-outline-primary:hover {
                                    background: #2563eb;
                                    color: #fff;
                                }
                                @media (max-width: 768px) {
                                    .investments-table th, .investments-table td {
                                        font-size: 0.92em;
                                        padding: 0.6em 0.5em;
                                    }
                                    .investments-table .fw-semibold {
                                        font-size: 1em;
                                    }
                                }
                            </style>
                        <?php
                    } else {
                        ?>
                        <div class="accordion-body text-center bg-white p-4">
                            <h4 class="text--muted"><i class="far fa-frown"></i> Data not found</h4>
                        </div>
                        <?php
                    }
                ?>
            </div>

            <div class="modal fade" id="capitalModal">
                <div class="modal-dialog modal-dialog-centered modal-content-bg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Manage Invest Capital</h5>
                            <button type="button" class="close" data-bs-dismiss="modal">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="user/invest/capital/manage" method="post">
                            <input type="hidden" name="_token" value="Rl6nikVoa3o45jTzwrKb4seoP72kc3Hi1l3rVgq9">                <input type="hidden" name="invest_id">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Investment Capital</label>
                                    <select name="capital" class="form-control form--control form-select">
                                        <option value="reinvest">Reinvest</option>
                                        <option value="capital_back">Capital Back</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn--base w-100">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="mt-3">
                
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
        (function($) {
            "use strict";

            let animationCircle = $('.animation-circle');
            animationCircle.css('animation-duration', function() {
                let duration = ($(this).data('duration'));
                return duration;
            });

            $('.manageCapital').on('click', function() {
                let modal = $('#capitalModal');
                modal.find('[name=invest_id]').val($(this).data('id'));
                modal.modal('show');
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
    </script>
</body>

</html>
