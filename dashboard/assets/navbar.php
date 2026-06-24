<div class="dashboard-nav d-flex flex-wrap align-items-center justify-content-between">
    <div class="nav-left d-flex gap-4 align-items-center">
        <div class="dash-sidebar-toggler d-xl-none" id="dash-sidebar-toggler">
            <i class="fas fa-bars"></i>
        </div>
    </div>
    <div class="nav-right d-flex flex-wrap align-items-center gap-3">
                                        <!-- <select name="langSel" class="langSel form--control h-auto px-2 py-1 border-0">
                                    <option value="en"  selected >English</option>
                                    <option value="es" >spanish</option>
                            </select> -->
                <button id="invertToggle" class="invert-toggle" aria-label="Toggle color mode">
  <span class="toggle-slider">
    <span class="toggle-knob">
      <!-- Sun Icon -->
      <svg class="icon sun" viewBox="0 0 24 24" width="16" height="16">
        <circle cx="12" cy="12" r="5" fill="currentColor"/>
        <line x1="12" y1="1" x2="12" y2="3"/>
        <line x1="12" y1="21" x2="12" y2="23"/>
        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
        <line x1="1" y1="12" x2="3" y2="12"/>
        <line x1="21" y1="12" x2="23" y2="12"/>
        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
      </svg>
      <!-- Moon Icon -->
      <svg class="icon moon" viewBox="0 0 24 24" width="16" height="16">
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
      </svg>
    </span>
  </span>
</button>
        <ul class="nav-header-link d-flex flex-wrap gap-2">
            <li>

              <?php
                  function getInitials($fName, $lName) {
                      // Split the full name into words
                      $fullName = trim($fName . ' ' . $lName);
                      $words = explode(" ", $fullName);
                      $initials = "";

                      // Loop through each word and grab the first character
                      foreach ($words as $word) {
                          if (!empty($word)) {
                              $initials .= strtoupper($word[0]);
                          }
                      }

                      return $initials;
                  }

                  // Example
                  // $userFullName = "John Michael Doe";
                  // echo getInitials($userFullName); // Output: JMD
                ?>
            
            <a class="link" href="javascript:void(0)"><?= getInitials(fname, lname) ?></a>
                <div class="dropdown-wrapper">
                    <div class="dropdown-header">
                        <h6 class="name text--base"><?= fname .' '. lname ?></h6>
                        <p class="fs--14px"><?= acct_id ?></p>
                    </div>
                    <ul class="links">
                        <li><a href="profile-setting.php"><i class="fas fa-user"></i> Profile</a></li>
                        <li><a href="change-password.php"><i class="fas fa-key"></i> Change Password</a></li>
                        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>