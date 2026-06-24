<?php
  include 'assets/header1.php';
?>
  <body
    x-data="
      {
        scrolledFromTop: false
      }
    "
    x-init="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false"
    @scroll.window="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false"
    class="bg-white dark:bg-black"
  >
    <!-- ===== Header start ===== -->
    <?php include 'assets/navbar1.php'; ?>
    <!-- ===== Header end ===== -->

    <!-- ===== Hero Section start ===== -->
    <section id="home" class="relative z-10 pt-48 pb-28">
      <div class="container">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4">
            <div class="mx-auto max-w-[720px] text-center">
              <h1
                class="mb-4 text-3xl font-bold leading-tight text-black dark:text-white md:text-[45px]"
              >
                Empowering the Future of Finance with ISO 20022
              </h1>
              <p
                class="mx-auto mb-4 max-w-[620px] text-lg font-medium text-body-color-2 dark:text-white"
              >
                <?= NAME ?> 20022 is a revolutionary standard for digital
                asset representation, enabling seamless interaction between
                traditional finance and decentralized markets. This innovation
                unlocks immense potential
              </p>

              <div
                class="flex flex-wrap items-center justify-center mb-10 -mx-1 sm:-mx-2"
              >
                <div class="relative px-1 mt-4 group sm:px-2">
                  <span
                    class="flex items-center justify-center w-10 h-10 mt-2 bg-white rounded-full"
                  >
                    <svg
                      width="28"
                      height="29"
                      viewBox="0 0 28 29"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M27.5815 17.3879C25.7115 24.8885 18.1146 29.4533 10.6131 27.5829C3.11474 25.7129 -1.44998 18.1155 0.420775 10.6155C2.28989 3.11409 9.8868 -1.45098 17.386 0.418958C24.8869 2.28889 29.4514 9.8871 27.5813 17.3881L27.5814 17.3879H27.5815Z"
                        fill="#F7931A"
                      />
                      <path
                        d="M18.9713 12.0301C19.2001 10.454 18.0353 9.60675 16.4424 9.04155L16.9591 6.90652L15.6975 6.58268L15.1945 8.6615C14.8628 8.57628 14.5222 8.49599 14.1837 8.41639L14.6904 6.32384L13.4295 6L12.9125 8.13434C12.6381 8.06996 12.3685 8.00634 12.107 7.9393L12.1084 7.93259L10.3686 7.48503L10.033 8.87315C10.033 8.87315 10.969 9.09418 10.9493 9.10778C11.4602 9.23914 11.5526 9.58753 11.5372 9.86367L10.9486 12.296C10.9838 12.3052 11.0294 12.3185 11.0798 12.3393C11.0377 12.3286 10.9929 12.3168 10.9464 12.3054L10.1214 15.7127C10.059 15.8726 9.90051 16.1125 9.54333 16.0214C9.55597 16.0403 8.62637 15.7857 8.62637 15.7857L8 17.2734L9.64178 17.695C9.94721 17.7739 10.2465 17.8564 10.5413 17.9341L10.0192 20.0936L11.2794 20.4174L11.7964 18.2808C12.1406 18.3771 12.4747 18.4659 12.8018 18.5496L12.2865 20.6762L13.5482 21L14.0702 18.8445C16.2215 19.264 17.8391 19.0949 18.52 17.0903C19.0687 15.4764 18.4927 14.5455 17.3609 13.9385C18.1852 13.7426 18.8062 13.1841 18.9717 12.0303L18.9713 12.03L18.9713 12.0301ZM16.0888 16.194C15.6989 17.8079 13.0611 16.9355 12.2059 16.7167L12.8987 13.8557C13.7539 14.0757 16.4963 14.5109 16.0888 16.194H16.0888ZM16.4789 12.0068C16.1233 13.4748 13.9278 12.7289 13.2157 12.5461L13.8438 9.95132C14.556 10.1342 16.8494 10.4755 16.4791 12.0068H16.4789Z"
                        fill="white"
                      />
                    </svg>
                  </span>
                  <div
                    class="absolute -top-full left-1/2 z-50 -translate-x-1/2 whitespace-nowrap rounded-full bg-[#2D2C4A] px-5 py-2 text-white opacity-0 group-hover:opacity-100"
                  >
                    <span
                      class="absolute -bottom-1 left-1/2 h-3 w-3 -translate-x-1/2 rotate-45 bg-[#2D2C4A]"
                    ></span>
                    <span>Bitcoin (BTC)</span>
                  </div>
                </div>
                <div class="relative px-1 mt-4 group sm:px-2">
                  <span
                    class="flex items-center justify-center w-10 h-10 mt-2 bg-white rounded-full"
                  >
                    <svg
                      width="29"
                      height="29"
                      viewBox="0 0 29 29"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle cx="14.28" cy="14.28" r="14.28" fill="#295ADA" />
                      <g clip-path="url(#clip0_73_10326)">
                        <path
                          d="M14.4692 7L13.1848 7.73853L9.68479 9.76147L8.40039 10.5V17.5L9.68479 18.2385L13.2169 20.2615L14.5013 21L15.7857 20.2615L19.2536 18.2385L20.538 17.5V10.5L19.2536 9.76147L15.7536 7.73853L14.4692 7ZM10.9692 16.0229V11.9771L14.4692 9.95413L17.9692 11.9771V16.0229L14.4692 18.0459L10.9692 16.0229Z"
                          fill="white"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_73_10326">
                          <rect
                            width="12.1376"
                            height="14"
                            fill="white"
                            transform="translate(8.40039 7)"
                          />
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                  <div
                    class="absolute -top-full left-1/2 z-50 -translate-x-1/2 whitespace-nowrap rounded-full bg-[#2D2C4A] px-5 py-2 text-white opacity-0 group-hover:opacity-100"
                  >
                    <span
                      class="absolute -bottom-1 left-1/2 h-3 w-3 -translate-x-1/2 rotate-45 bg-[#2D2C4A]"
                    ></span>
                    <span>Chainlink (CHL)</span>
                  </div>
                </div>
                <div class="relative px-1 mt-4 group sm:px-2">
                  <span
                    class="flex items-center justify-center w-10 h-10 mt-2 bg-white rounded-full"
                  >
                    <svg
                      width="28"
                      height="28"
                      viewBox="0 0 28 28"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle cx="14" cy="14" r="14" fill="#24292F" />
                      <g clip-path="url(#clip0_73_10306)">
                        <path
                          d="M17.0343 8.79657L14.7432 12.2005C14.5847 12.4323 14.8894 12.7129 15.1088 12.5177L17.3633 10.5534C17.4243 10.5046 17.5096 10.5412 17.5096 10.6266V16.7635C17.5096 16.8489 17.3999 16.8855 17.3511 16.8245L10.5265 8.65017C10.3071 8.38176 9.99026 8.23535 9.63684 8.23535H9.39311C8.75939 8.23535 8.23535 8.75997 8.23535 9.40659V18.0445C8.23535 18.6911 8.75939 19.2157 9.40529 19.2157C9.80746 19.2157 10.1853 19.0083 10.4046 18.6545L12.6958 15.2506C12.8542 15.0188 12.5495 14.7382 12.3301 14.9334L10.0756 16.8855C10.0146 16.9343 9.92933 16.8977 9.92933 16.8123V10.6876C9.92933 10.6022 10.039 10.5656 10.0878 10.6266L16.9124 18.8009C17.1318 19.0693 17.4608 19.2157 17.8021 19.2157H18.0458C18.6917 19.2157 19.2157 18.6911 19.2157 18.0445V9.40659C19.2157 8.75997 18.6917 8.23535 18.0458 8.23535C17.6314 8.23535 17.2537 8.44276 17.0343 8.79657Z"
                          fill="white"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_73_10306">
                          <rect
                            width="10.9804"
                            height="10.9804"
                            fill="white"
                            transform="translate(8.23535 8.23535)"
                          />
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                  <div
                    class="absolute -top-full left-1/2 z-50 -translate-x-1/2 whitespace-nowrap rounded-full bg-[#2D2C4A] px-5 py-2 text-white opacity-0 group-hover:opacity-100"
                  >
                    <span
                      class="absolute -bottom-1 left-1/2 h-3 w-3 -translate-x-1/2 rotate-45 bg-[#2D2C4A]"
                    ></span>
                    <span>Near (N)</span>
                  </div>
                </div>
                <div class="relative px-1 mt-4 group sm:px-2">
                  <span
                    class="flex items-center justify-center w-10 h-10 mt-2 bg-white rounded-full"
                  >
                    <svg
                      width="28"
                      height="28"
                      viewBox="0 0 28 28"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M27.578 17.3867C25.7082 24.8867 18.1118 29.4511 10.6109 27.5809C3.11305 25.7111 -1.45134 18.1142 0.419279 10.6148C2.28826 3.11387 9.88462 -1.45087 17.3833 0.418928C24.8837 2.28873 29.4478 9.88639 27.5778 17.3868L27.5779 17.3867H27.578Z"
                        fill="#1181E7"
                      />
                      <g clip-path="url(#clip0_73_10312)">
                        <path
                          d="M13.9982 6.12451L13.8926 6.48343V16.8976L13.9982 17.003L18.8323 14.1456L13.9982 6.12451Z"
                          fill="#D6D6D6"
                        />
                        <path
                          d="M13.9982 6.12451L9.16406 14.1456L13.9982 17.003V11.9483V6.12451Z"
                          fill="white"
                        />
                        <path
                          d="M13.998 17.9175L13.9385 17.9901V21.6998L13.998 21.8736L18.835 15.0615L13.998 17.9175Z"
                          fill="#D6D6D6"
                        />
                        <path
                          d="M13.9982 21.8736V17.9175L9.16406 15.0615L13.9982 21.8736Z"
                          fill="white"
                        />
                        <path
                          d="M13.998 17.0025L18.8321 14.1451L13.998 11.9478V17.0025Z"
                          fill="#F3F3F3"
                        />
                        <path
                          d="M9.16406 14.1451L13.9982 17.0025V11.9478L9.16406 14.1451Z"
                          fill="#E2E2E2"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_73_10312">
                          <rect
                            width="15.749"
                            height="15.749"
                            fill="white"
                            transform="translate(6.125 6.12451)"
                          />
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                  <div
                    class="absolute -top-full left-1/2 z-50 -translate-x-1/2 whitespace-nowrap rounded-full bg-[#2D2C4A] px-5 py-2 text-white opacity-0 group-hover:opacity-100"
                  >
                    <span
                      class="absolute -bottom-1 left-1/2 h-3 w-3 -translate-x-1/2 rotate-45 bg-[#2D2C4A]"
                    ></span>
                    <span>Ethereum (ETH)</span>
                  </div>
                </div>
                <div class="relative px-1 mt-4 group sm:px-2">
                  <span
                    class="flex items-center justify-center w-10 h-10 mt-2 bg-white rounded-full"
                  >
                    <svg
                      width="28"
                      height="28"
                      viewBox="0 0 28 28"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle cx="14" cy="13.9995" r="14" fill="#8247E5" />
                      <g clip-path="url(#clip0_73_10294)">
                        <path
                          d="M17.5729 10.8364C17.3177 10.686 16.9896 10.686 16.6979 10.8364L14.6562 12.0776L13.2708 12.8675L11.2656 14.1087C11.0104 14.2591 10.6823 14.2591 10.3906 14.1087L8.82292 13.1308C8.56771 12.9803 8.38542 12.6794 8.38542 12.3409V10.4603C8.38542 10.1594 8.53125 9.85852 8.82292 9.67046L10.3906 8.73016C10.6458 8.57972 10.974 8.57972 11.2656 8.73016L12.8333 9.70807C13.0885 9.85852 13.2708 10.1594 13.2708 10.4979V11.7391L14.6562 10.9117V9.63285C14.6562 9.33195 14.5104 9.03106 14.2187 8.843L11.3021 7.07524C11.0469 6.92479 10.7187 6.92479 10.4271 7.07524L7.4375 8.88061C7.14583 9.03106 7 9.33195 7 9.63285V13.1684C7 13.4693 7.14583 13.7702 7.4375 13.9582L10.3906 15.726C10.6458 15.8764 10.974 15.8764 11.2656 15.726L13.2708 14.5224L14.6562 13.6949L16.6615 12.4914C16.9167 12.3409 17.2448 12.3409 17.5365 12.4914L19.1042 13.4317C19.3594 13.5821 19.5417 13.883 19.5417 14.2215V16.1021C19.5417 16.403 19.3958 16.7039 19.1042 16.892L17.5729 17.8323C17.3177 17.9827 16.9896 17.9827 16.6979 17.8323L15.1302 16.892C14.875 16.7415 14.6927 16.4406 14.6927 16.1021V14.8985L13.3073 15.726V16.9672C13.3073 17.2681 13.4531 17.569 13.7448 17.757L16.6979 19.5248C16.9531 19.6752 17.2812 19.6752 17.5729 19.5248L20.526 17.757C20.7812 17.6066 20.9635 17.3057 20.9635 16.9672V13.394C20.9635 13.0931 20.8177 12.7923 20.526 12.6042L17.5729 10.8364Z"
                          fill="white"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_73_10294">
                          <rect
                            width="14"
                            height="12.6"
                            fill="white"
                            transform="translate(7 7)"
                          />
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                  <div
                    class="absolute -top-full left-1/2 z-50 -translate-x-1/2 whitespace-nowrap rounded-full bg-[#2D2C4A] px-5 py-2 text-white opacity-0 group-hover:opacity-100"
                  >
                    <span
                      class="absolute -bottom-1 left-1/2 h-3 w-3 -translate-x-1/2 rotate-45 bg-[#2D2C4A]"
                    ></span>
                    <span>Polygon (POL)</span>
                  </div>
                </div>
                <div class="relative px-1 mt-4 group sm:px-2">
                  <span
                    class="flex items-center justify-center w-10 h-10 mt-2 bg-white rounded-full"
                  >
                    <svg
                      width="28"
                      height="28"
                      viewBox="0 0 28 28"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle cx="14" cy="14" r="14" fill="#F14E51" />
                      <path
                        d="M20.8096 11.2176C20.1191 10.6117 19.1639 9.6864 18.386 9.03016L18.34 8.99953C18.2634 8.94108 18.177 8.89524 18.0845 8.86391C16.2087 8.53142 7.47873 6.9805 7.30841 7.00019C7.26069 7.00654 7.21507 7.02298 7.17492 7.04831L7.13119 7.08112C7.07734 7.1331 7.03645 7.19589 7.01151 7.26487L7 7.29331V7.44862V7.47268C7.98278 10.0736 11.8633 18.5938 12.6274 20.5931C12.6734 20.7288 12.7609 20.9869 12.9243 21H12.9611C13.0486 21 13.4215 20.5319 13.4215 20.5319C13.4215 20.5319 20.0869 12.8495 20.7612 12.0314C20.8485 11.9306 20.9256 11.8222 20.9914 11.7076C21.0082 11.618 21.0003 11.5257 20.9684 11.4399C20.9366 11.354 20.8818 11.2774 20.8096 11.2176ZM15.1315 12.1123L17.9763 9.87015L19.645 11.3314L15.1315 12.1123ZM14.0268 11.9657L9.12898 8.1508L17.0534 9.53984L14.0268 11.9657ZM14.4687 12.9654L19.4816 12.1976L13.7506 18.76L14.4687 12.9654ZM8.46382 8.53142L13.6171 12.6876L12.8714 18.7644L8.46382 8.53142Z"
                        fill="white"
                      />
                    </svg>
                  </span>
                  <div
                    class="absolute -top-full left-1/2 z-50 -translate-x-1/2 whitespace-nowrap rounded-full bg-[#2D2C4A] px-5 py-2 text-white opacity-0 group-hover:opacity-100"
                  >
                    <span
                      class="absolute -bottom-1 left-1/2 h-3 w-3 -translate-x-1/2 rotate-45 bg-[#2D2C4A]"
                    ></span>
                    <span>Tron (TRX)</span>
                  </div>
                </div>
              </div>

                            <a
                href="user/login.php"
                class="px-8 py-3 text-base font-semibold text-white rounded-full bg-primary hover:bg-primary/90 dark:hover:bg-primary/90"
              >
                Login/Register
              </a>
                          </div>
          </div>
        </div>
      </div>

      <div
        class="absolute top-0 left-0 w-full h-full -z-10 opacity-20"
        style="
          background-image: linear-gradient(
            180deg,
            #3e7dff 0%,
            rgba(62, 125, 255, 0) 100%
          );
        "
      ></div>
      <img
        src="src/images/shapes/hero-shape-1.svg"
        alt=""
        class="absolute top-0 left-0 -z-10"
      />
      <img
        src="src/images/shapes/hero-shape-2.svg"
        alt=""
        class="absolute top-0 right-0 -z-10"
      />
    </section>
    <!-- ===== Hero Section end ===== -->

    <!-- ===== Brands Section start ===== -->
    <section>
      <div class="container">
        <div
          class="wow fadeInUp border-y border-[#F3F4F4] pt-10 dark:border-[#2D2C4A]"
          data-wow-delay="0s"
        >
          <h2
            class="mb-10 text-lg font-bold text-center text-black dark:text-white sm:text-2xl"
          >
            Join the 20,000+ companies using the our platform
          </h2>

          <div class="flex flex-wrap items-center justify-center -mx-4">
            
            <div class="px-4">
              <a
                href="https://tailgrids.com/"
                target="_blank"
                rel="nofollow noopenner"
                class="mb-10 flex max-w-[170px] justify-center opacity-70 grayscale hover:opacity-100 hover:grayscale-0 dark:hover:opacity-100"
              >
                <img
                  src="src/images/brands/TailGrids-white.svg"
                  alt="tailgrids"
                  class="hidden h-10 mx-auto text-center dark:block"
                />
                <img
                  src="src/images/brands/tailgrids.svg"
                  alt="tailgrids"
                  class="h-10 mx-auto text-center dark:hidden"
                />
              </a>
            </div>
            <div class="px-4">
              <a
                href="https://lineicons.com/"
                target="_blank"
                rel="nofollow noopenner"
                class="mb-10 flex max-w-[170px] justify-center opacity-70 grayscale hover:opacity-100 hover:grayscale-0 dark:hover:opacity-100"
              >
                <img
                  src="src/images/brands/LineIcons-white.svg"
                  alt="lineicons"
                  class="hidden h-10 mx-auto text-center dark:block"
                />
                <img
                  src="src/images/brands/lineicons.svg"
                  alt="lineicons"
                  class="h-10 mx-auto text-center dark:hidden"
                />
              </a>
            </div>
            <div class="px-4">
              <a
                href="https://ayroui.com/"
                target="_blank"
                rel="nofollow noopenner"
                class="mb-10 flex max-w-[170px] justify-center opacity-70 grayscale hover:opacity-100 hover:grayscale-0 dark:hover:opacity-100"
              >
                <img
                  src="src/images/brands/AyroUI-white.svg"
                  alt="ayroui"
                  class="hidden h-10 mx-auto text-center dark:block"
                />
                <img
                  src="src/images/brands/ayroui.svg"
                  alt="ayroui"
                  class="h-10 mx-auto text-center dark:hidden"
                />
              </a>
            </div>
            <div class="px-4">
              <a
                href="https://plainadmin.com/"
                target="_blank"
                rel="nofollow noopenner"
                class="mb-10 flex max-w-[170px] justify-center opacity-70 grayscale hover:opacity-100 hover:grayscale-0 dark:hover:opacity-100"
              >
                <img
                  src="src/images/brands/PlainAdmin-white.svg"
                  alt="plainadmin"
                  class="hidden h-10 mx-auto text-center dark:block"
                />
                <img
                  src="src/images/brands/plainadmin.svg"
                  alt="plainadmin"
                  class="h-10 mx-auto text-center dark:hidden"
                />
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ===== Brands Section end ===== -->

    <!-- ===== Features Section start ===== -->
    <section id="features" class="pt-[80px] pb-12">
      <div class="container">
        <div
          class="wow fadeInUp mx-auto mb-12 max-w-[500px] text-center md:mb-16"
          data-wow-delay="0s"
        >
          <span
            class="mb-2 text-base font-bold uppercase text-primary sm:text-lg"
          >
            CRYPTO FEATURE
          </span>
          <h2
            class="mb-2 text-2xl font-bold leading-tight text-black dark:text-white md:text-[38px]"
          >
            Best Features
          </h2>
          <p class="text-base font-medium text-body-color-2 dark:text-body-color">
            <?= NAME ?> is at your service with its user-friendly features,
            secure infrastructure and applications that make a difference.
          </p>
        </div>

        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4 md:w-1/2 lg:w-1/3">
            <div
              class="wow fadeInUp mx-auto mb-10 max-w-[320px] text-center"
              data-wow-delay="0s"
            >
              <div
                class="flex items-center justify-center w-16 h-16 mx-auto text-white rounded-full mb-5 bg-primary"
              >
                <svg
                  width="32"
                  height="32"
                  viewBox="0 0 40 40"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M20 1.66675L5 8.33341V18.3334C5 27.5834 11.4 36.2334 20 38.3334C28.6 36.2334 35 27.5834 35 18.3334V8.33341L20 1.66675ZM20 19.9834H31.6667C30.7833 26.8501 26.2 32.9667 20 34.8834V20.0001H8.33333V10.5001L20 5.31675V19.9834Z"
                    fill="white"
                  />
                </svg>
              </div>

              <div>
                <h3
                  class="mb-2 text-lg font-bold text-black dark:text-white sm:text-2xl lg:text-lg xl:text-2xl"
                >
                  Safe & Secure
                </h3>

                <p
                  class="text-sm font-medium text-body-color-2 dark:text-body-color sm:text-base lg:text-sm xl:text-base"
                >
                  Hot & cold wallet management, tracking software, restricted
                  access & key management methods serve your security.
                </p>
              </div>
            </div>
          </div>
          <div class="w-full px-4 md:w-1/2 lg:w-1/3">
            <div
              class="wow fadeInUp mx-auto mb-10 max-w-[320px] text-center"
              data-wow-delay="0s"
            >
              <div
                class="flex items-center justify-center w-16 h-16 mx-auto text-white rounded-full mb-5 bg-primary"
              >
                <svg
                  width="32"
                  height="32"
                  viewBox="0 0 40 40"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M33.3333 9.99992H29.6999C29.8833 9.48325 29.9999 8.91658 29.9999 8.33325C29.9999 5.56659 27.7666 3.33325 24.9999 3.33325C23.2499 3.33325 21.7333 4.23325 20.8333 5.58325L19.9999 6.69992L19.1666 5.56659C18.2666 4.23325 16.7499 3.33325 14.9999 3.33325C12.2333 3.33325 9.99992 5.56659 9.99992 8.33325C9.99992 8.91658 10.1166 9.48325 10.2999 9.99992H6.66659C4.81659 9.99992 3.34992 11.4833 3.34992 13.3333L3.33325 31.6666C3.33325 33.5166 4.81659 34.9999 6.66659 34.9999H33.3333C35.1833 34.9999 36.6666 33.5166 36.6666 31.6666V13.3333C36.6666 11.4833 35.1833 9.99992 33.3333 9.99992ZM24.9999 6.66659C25.9166 6.66659 26.6666 7.41658 26.6666 8.33325C26.6666 9.24992 25.9166 9.99992 24.9999 9.99992C24.0833 9.99992 23.3333 9.24992 23.3333 8.33325C23.3333 7.41658 24.0833 6.66659 24.9999 6.66659ZM14.9999 6.66659C15.9166 6.66659 16.6666 7.41658 16.6666 8.33325C16.6666 9.24992 15.9166 9.99992 14.9999 9.99992C14.0833 9.99992 13.3333 9.24992 13.3333 8.33325C13.3333 7.41658 14.0833 6.66659 14.9999 6.66659ZM33.3333 31.6666H6.66659V28.3333H33.3333V31.6666ZM33.3333 23.3333H6.66659V13.3333H15.1333L11.6666 18.0499L14.3666 19.9999L18.3333 14.5999L19.9999 12.3333L21.6666 14.5999L25.6333 19.9999L28.3333 18.0499L24.8666 13.3333H33.3333V23.3333Z"
                    fill="white"
                  />
                </svg>
              </div>

              <div>
                <h3
                  class="mb-2 text-lg font-bold text-black dark:text-white sm:text-2xl lg:text-lg xl:text-2xl"
                >
                  Early Bonus
                </h3>

                <p
                  class="text-sm font-medium text-body-color-2 dark:text-body-color sm:text-base lg:text-sm xl:text-base"
                >
                  Enjoy high daily interest rates with well-diversified
                  intelligent portfolios that generates secure revenue
                </p>
              </div>
            </div>
          </div>
          <div class="w-full px-4 md:w-1/2 lg:w-1/3">
            <div
              class="wow fadeInUp mx-auto mb-10 max-w-[320px] text-center"
              data-wow-delay="0s"
            >
              <div
                class="flex items-center justify-center w-16 h-16 mx-auto text-white rounded-full mb-5 bg-primary"
              >
                <svg
                  width="32"
                  height="32"
                  viewBox="0 0 40 40"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M20 3.33325L10.8334 18.3333H29.1667L20 3.33325Z"
                    fill="white"
                  />
                  <path
                    d="M29.1666 36.6667C33.3088 36.6667 36.6666 33.3089 36.6666 29.1667C36.6666 25.0246 33.3088 21.6667 29.1666 21.6667C25.0245 21.6667 21.6666 25.0246 21.6666 29.1667C21.6666 33.3089 25.0245 36.6667 29.1666 36.6667Z"
                    fill="white"
                  />
                  <path d="M5 22.5H18.3333V35.8333H5V22.5Z" fill="white" />
                </svg>
              </div>

              <div>
                <h3
                  class="mb-2 text-lg font-bold text-black dark:text-white sm:text-2xl lg:text-lg xl:text-2xl"
                >
                  Universal Access
                </h3>

                <p
                  class="text-sm font-medium text-body-color-2 dark:text-body-color sm:text-base lg:text-sm xl:text-base"
                >
                  Access your funds anytime, anywhere with our mobile and web
                  applications. Trade, invest, and manage your portfolio on the
                  go.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ===== Features Section end ===== -->

    <!-- ===== Token Section start ===== -->
    <section class="relative z-10">
      <div class="container">
        <div
          class="rounded-lg bg-light-bg py-12 px-8 dark:bg-[#14102C] sm:py-16 sm:px-14 lg:px-8 xl:px-14"
        >
          <div class="flex flex-wrap items-center -mx-4">
            <div class="w-full px-4 lg:w-1/2">
              <div
                class="flex items-center justify-center mb-12 wow fadeInUp lg:mb-0"
                data-wow-delay="0s"
              >
                <div id="chart"></div>
              </div>
            </div>
            <div class="w-full px-4 lg:w-1/2">
              <div class="wow fadeInUp mb-9" data-wow-delay="0s">
                <span
                  class="mb-3 text-lg font-bold uppercase text-primary sm:text-xl"
                >
                  TOKEN
                </span>
                <h2
                  class="mb-3 text-3xl font-bold leading-tight text-black dark:text-white md:text-[45px]"
                >
                  Flare token airdrop
                </h2>
                <p
                  class="text-lg font-medium text-body-color-2 dark:text-body-color"
                >
                  Flare Network is distributing free $FLR tokens to eligible
                  wallets in its latest airdrop! Qualified users—including past
                  XRP holders and active DeFi participants—can claim their
                  tokens by connecting supported wallets before the snapshot
                  date.
                </p>
              </div>
              <div class="space-y-4 wow fadeInUp" data-wow-delay="0s">
                <p class="flex">
                  <span class="w-6 h-6 mr-4 rounded-full bg-primary"></span>
                  <span
                    class="text-lg font-medium text-body-color-2 dark:text-body-color"
                  >
                    73% Financial Overhead
                  </span>
                </p>
                <p class="flex">
                  <span class="mr-4 h-6 w-6 rounded-full bg-[#2347B9]"></span>
                  <span
                    class="text-lg font-medium text-body-color-2 dark:text-body-color"
                  >
                    55% Bonus & found
                  </span>
                </p>
                <p class="flex">
                  <span class="mr-4 h-6 w-6 rounded-full bg-[#8BA6FF]"></span>
                  <span
                    class="text-lg font-medium text-body-color-2 dark:text-body-color"
                  >
                    38% it infastrueture
                  </span>
                </p>
                <p class="flex">
                  <span class="mr-4 h-6 w-6 rounded-full bg-[#8696CA]"></span>
                  <span
                    class="text-lg font-medium text-body-color-2 dark:text-body-color"
                  >
                    20.93% Gift Code Inventory
                  </span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="absolute right-0 -top-32 -z-10">
        <img src="src/images/shapes/token-sale-shape.svg" alt="shape" />
      </div>
    </section>
    <!-- ===== Token Section end ===== -->

    <!-- ===== about us Section start ===== -->
    <section id="about" class="py-24 bg-gray-50 dark:bg-dark">
  <div class="container">
    <div class="flex flex-wrap items-center -mx-4">
      <div class="w-full px-4 lg:w-2/3">
        <div class="wow fadeInUp mb-12 lg:mb-0" data-wow-delay="0s">
          <span class="mb-3 text-lg font-bold uppercase text-primary sm:text-xl">
            About Our Company
          </span>
          <h2 class="mb-6 text-3xl font-bold leading-tight text-black dark:text-white md:text-[45px]">
            Crafting digital experiences that matter
          </h2>
          <div class="mb-8 text-lg font-medium text-body-color-2 dark:text-body-color space-y-4">
            <p>
              <?= DOMAIN ?> is the first registered digital asset investment company that provides services with a secure and fast transaction infrastructure developed by world standards, in governence of the expert team and experienced advisory board.
            </p>
            <p>
              The investment team has a unique mixture of technology and operating expertise in the distributed ledger systems as well as financial and capital markets experience – 
            </p>
            <p>
              this unique skill set allows for sophisticated technical and valuation analysis within the portfolio construction process. With team located all around the world, <?= DOMAIN ?> has 24-hour coverage of the constantly trading digital
            </p>
          </div>

          <div class="flex flex-wrap -mx-2">
            <div class="w-full px-2 sm:w-1/2 lg:w-1/3">
              <div class="mb-6 p-6 bg-white dark:bg-dark-2 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <h3 class="mb-3 text-xl font-bold text-black dark:text-white">Our Vision</h3>
                <p class="text-body-color-2 dark:text-body-color">
                  To create a world where technology enhances human connection without compromising our humanity.
                </p>
              </div>
            </div>
            <div class="w-full px-2 sm:w-1/2 lg:w-1/3">
              <div class="mb-6 p-6 bg-white dark:bg-dark-2 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <h3 class="mb-3 text-xl font-bold text-black dark:text-white">Our Mission</h3>
                <p class="text-body-color-2 dark:text-body-color">
                  Deliver exceptional digital experiences that solve real problems for real people.
                </p>
              </div>
            </div>
            <div class="w-full px-2 sm:w-1/2 lg:w-1/3">
              <div class="mb-6 p-6 bg-white dark:bg-dark-2 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <h3 class="mb-3 text-xl font-bold text-black dark:text-white">Our Values</h3>
                <p class="text-body-color-2 dark:text-body-color">
                  Integrity, innovation, sustainability, and above all, putting people first.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      </div>
    </div>
  </div>
</section>
    <!-- ===== Roadmap Section end ===== -->

    <!-- ===== Team Section start ===== -->

    <!-- ===== Team Section end ===== -->

    <!-- ===== Testimonial Section start ===== -->
    <section
      id="testimonial"
      class="bg-light-bg pt-[120px] pb-20 dark:bg-[#14102C]"
    >
      <div class="container">
        <div
          class="wow fadeInUp mx-auto mb-16 max-w-[590px] text-center md:mb-20"
          data-wow-delay="0s"
        >
          <span
            class="mb-3 text-lg font-bold uppercase text-primary sm:text-xl"
          >
            MARKET
          </span>
          <h2
            class="mb-3 text-3xl font-bold leading-tight text-black dark:text-white md:text-[45px]"
          >
            Crypto Market Price
          </h2>
          <p class="text-lg font-medium text-body-color-2 dark:text-body-color">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed
          </p>
        </div>

        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <div class="tradingview-widget-copyright">
            <a
              href="https://www.tradingview.com/"
              rel="noopener nofollow"
              target="_blank"
              ><span class="blue-text"
                >Track all markets on TradingView</span
              ></a
            >
          </div>
          <script
            type="text/javascript"
            src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js"
            async
          >
              {
              "defaultColumn": "overview",
              "screener_type": "crypto_mkt",
              "displayCurrency": "USD",
              "colorTheme": "light",
              "isTransparent": true,
              "locale": "en",
              "width": "100%",
              "height": 550
            }
          </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
    </section>
    <!-- ===== Testimonial Section end ===== -->

    <!-- ===== Download Section start ===== -->
    <section id="download" class="py-24">
      <div class="container">
        <div class="flex flex-wrap items-center -mx-4">
          <div class="w-full px-4 lg:w-1/2">
            <div
              class="wow fadeInUp mb-12 max-w-[500px] lg:mb-0"
              data-wow-delay="0s"
            >
              <span
                class="mb-3 text-lg font-bold uppercase text-primary sm:text-xl"
              >
                Download Our App
              </span>
              <h2
                class="mb-3 text-3xl font-bold leading-tight text-black dark:text-white md:text-[45px]"
              >
                The choice is yours, we've got you covered
              </h2>
              <p
                class="mb-10 text-lg font-medium text-body-color-2 dark:text-body-color"
              >
                Download our app to get the latest updates, manage your
                portfolio, and trade on the go. Available on both iOS and
                Android platforms.
              </p>

              <div class="flex items-center -mx-3">
                <div class="px-3">
                  <a
                    href="javascript:void(0)"
                    class="flex items-center justify-center rounded-full border border-[#2D2947] bg-[#2D2947] p-[10px] pr-5 text-base font-semibold text-white hover:bg-[#2D2947]/90 dark:hover:bg-[#2D2947]/90"
                  >
                    <span
                      class="flex items-center justify-center w-10 h-10 mr-3 text-white rounded-full bg-primary"
                    >
                      <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M18.7101 19.5C17.8801 20.74 17.0001 21.95 15.6601 21.97C14.3201 22 13.8901 21.18 12.3701 21.18C10.8401 21.18 10.3701 21.95 9.10009 22C7.79009 22.05 6.80009 20.68 5.96009 19.47C4.25009 17 2.94009 12.45 4.70009 9.39C5.57009 7.87 7.13009 6.91 8.82009 6.88C10.1001 6.86 11.3201 7.75 12.1101 7.75C12.8901 7.75 14.3701 6.68 15.9201 6.84C16.5701 6.87 18.3901 7.1 19.5601 8.82C19.4701 8.88 17.3901 10.1 17.4101 12.63C17.4401 15.65 20.0601 16.66 20.0901 16.67C20.0601 16.74 19.6701 18.11 18.7101 19.5ZM13.0001 3.5C13.7301 2.67 14.9401 2.04 15.9401 2C16.0701 3.17 15.6001 4.35 14.9001 5.19C14.2101 6.04 13.0701 6.7 11.9501 6.61C11.8001 5.46 12.3601 4.26 13.0001 3.5Z"
                          fill="white"
                        />
                      </svg>
                    </span>
                    App Store
                  </a>
                </div>
                <div class="px-3">
                  <a
                    href="javascript:void(0)"
                    class="flex items-center justify-center rounded-full border border-[#2D2947] bg-transparent p-[10px] pr-5 text-base font-semibold text-body-color-2 hover:bg-[#2D294710] dark:text-white dark:hover:bg-[#2D2947]"
                  >
                    <span
                      class="flex items-center justify-center w-10 h-10 mr-3 text-white rounded-full bg-dark dark:bg-white dark:text-dark"
                    >
                      <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        class="fill-current"
                      >
                        <path
                          d="M3 20.5V3.50002C3 2.91002 3.34 2.39002 3.84 2.15002L13.69 12L3.84 21.85C3.34 21.6 3 21.09 3 20.5ZM16.81 15.12L6.05 21.34L14.54 12.85L16.81 15.12ZM20.16 10.81C20.5 11.08 20.75 11.5 20.75 12C20.75 12.5 20.53 12.9 20.18 13.18L17.89 14.5L15.39 12L17.89 9.50002L20.16 10.81ZM6.05 2.66002L16.81 8.88002L14.54 11.15L6.05 2.66002Z"
                        />
                      </svg>
                    </span>
                    Play Store
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="w-full px-4 lg:w-1/2">
            <div
              class="relative text-center wow fadeInUp -z-10"
              data-wow-delay="0s"
            >
              <img
                src="src/images/download/app-image.png"
                alt="app image"
                class="hidden mx-auto text-center dark:block"
              />
              <img
                src="src/images/download/app-image-2.png"
                alt="app image"
                class="mx-auto dark:hidden"
              />

              <span
                class="absolute right-0 bottom-0 w-[320px] h-[320px] rounded-full -z-10"
                style="
                  background: linear-gradient(
                    180deg,
                    rgba(55, 109, 249, 0) 0%,
                    rgba(255, 96, 166, 0.32) 100%
                  );
                  filter: blur(100px);
                "
              >
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ===== Download Section end ===== -->

    <!-- ===== Faq Section start ===== -->
    <section
      id="faq"
      x-data="
        {
          openFaq1: false,
          openFaq2: false,
          openFaq3: false,
          openFaq4: false,
          openFaq5: false,
        }
      "
      class="relative z-10 bg-light-bg py-24 dark:bg-[#14102C]"
    >
      <div class="container">
        <div
          class="wow fadeInUp mx-auto mb-16 max-w-[630px] text-center md:mb-20"
          data-wow-delay="0s"
        >
          <span
            class="mb-3 text-lg font-bold uppercase text-primary sm:text-xl"
          >
            FAQ
          </span>
          <h2
            class="mb-3 text-3xl font-bold leading-tight text-black dark:text-white md:text-[45px]"
          >
            Frequently Asked Questions
          </h2>
          <p
            class="mx-auto max-w-[590px] text-lg font-medium text-body-color-2 dark:text-body-color"
          >
            Here are some of the most common questions we receive from our
            users. If you have a question that isn't answered here, feel free to
            reach out to our support team.
          </p>
        </div>

        <div class="flex flex-wrap justify-center -mx-4">
          <div class="w-full px-4 lg:w-9/12 xl:w-8/12">
            <div
              class="py-6 mb-10 bg-white rounded-lg single-faq wow fadeInUp px-7 dark:bg-dark md:py-8 md:px-10"
              data-wow-delay="0s"
            >
              <button
                @click="openFaq1 = !openFaq1"
                class="flex items-center justify-between w-full text-left faq-btn"
              >
                <h3
                  class="mr-2 text-base font-bold text-dark dark:text-white sm:text-lg md:text-xl"
                >
                  What is <?= NAME ?> ?
                </h3>
                <span
                  class="icon inline-flex h-5 w-full max-w-[20px] items-center justify-center rounded-sm bg-body-color-2 text-white dark:text-black dark:bg-body-color text-lg font-semibold"
                  :class="openFaq1 && 'rotate-180' "
                >
                  <svg
                    width="10"
                    height="10"
                    viewBox="0 0 10 10"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0_50_132)">
                      <path
                        d="M8.82033 1.91065L4.99951 5.73146L1.17869 1.91064L-0.000488487 3.08978L4.99951 8.08978L9.99951 3.08979L8.82033 1.91065Z"
                        fill="currentColor"
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_50_132">
                        <rect
                          width="10"
                          height="10"
                          fill="white"
                          transform="translate(-0.000488281 0.000488281)"
                        />
                      </clipPath>
                    </defs>
                  </svg>
                </span>
              </button>
              <div x-show="openFaq1" class="faq-content">
                <p
                  class="pt-6 text-base text-relaxed text-body-color-2 dark:text-body-color"
                >
                  <?= NAME ?> is a comprehensive online trading platform
                  offering access to multiple markets, including stocks,
                  cryptocurrencies, assets, commodities, and ETFs. It provides
                  tools and resources for investors of all levels, from
                  beginners to professionals.
                </p>
              </div>
            </div>
            <div
              class="py-6 mb-10 bg-white rounded-lg single-faq wow fadeInUp px-7 dark:bg-dark md:py-8 md:px-10"
              data-wow-delay="0s"
            >
              <button
                @click="openFaq2 = !openFaq2"
                class="flex items-center justify-between w-full text-left faq-btn"
              >
                <h3
                  class="mr-2 text-base font-bold text-dark dark:text-white sm:text-lg md:text-xl"
                >
                  Is <?= NAME ?> secure?
                </h3>
                <span
                  class="icon inline-flex h-5 w-full max-w-[20px] items-center justify-center rounded-sm bg-body-color-2 text-white dark:text-black dark:bg-body-color text-lg font-semibold"
                  :class="openFaq2 && 'rotate-180' "
                >
                  <svg
                    width="10"
                    height="10"
                    viewBox="0 0 10 10"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0_50_132)">
                      <path
                        d="M8.82033 1.91065L4.99951 5.73146L1.17869 1.91064L-0.000488487 3.08978L4.99951 8.08978L9.99951 3.08979L8.82033 1.91065Z"
                        fill="currentColor"
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_50_132">
                        <rect
                          width="10"
                          height="10"
                          fill="white"
                          transform="translate(-0.000488281 0.000488281)"
                        />
                      </clipPath>
                    </defs>
                  </svg>
                </span>
              </button>
              <div x-show="openFaq2" class="faq-content">
                <p
                  class="pt-6 text-base text-relaxed text-body-color-2 dark:text-body-color"
                >
                  Yes, <?= NAME ?> employs robust security measures, including
                  data encryption, two-factor authentication (2FA), and
                  compliance with global financial regulations. Additionally,
                  user funds are held in segregated accounts for added
                  protection.
                </p>
              </div>
            </div>
            <div
              class="py-6 mb-10 bg-white rounded-lg single-faq wow fadeInUp px-7 dark:bg-dark md:py-8 md:px-10"
              data-wow-delay="0s"
            >
              <button
                @click="openFaq3 = !openFaq3"
                class="flex items-center justify-between w-full text-left faq-btn"
              >
                <h3
                  class="mr-2 text-base font-bold text-dark dark:text-white sm:text-lg md:text-xl"
                >
                  How do I open an account with <?= NAME ?>?
                </h3>
                <span
                  class="icon inline-flex h-5 w-full max-w-[20px] items-center justify-center rounded-sm bg-body-color-2 text-white dark:text-black dark:bg-body-color text-lg font-semibold"
                  :class="openFaq3 && 'rotate-180' "
                >
                  <svg
                    width="10"
                    height="10"
                    viewBox="0 0 10 10"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0_50_132)">
                      <path
                        d="M8.82033 1.91065L4.99951 5.73146L1.17869 1.91064L-0.000488487 3.08978L4.99951 8.08978L9.99951 3.08979L8.82033 1.91065Z"
                        fill="currentColor"
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_50_132">
                        <rect
                          width="10"
                          height="10"
                          fill="white"
                          transform="translate(-0.000488281 0.000488281)"
                        />
                      </clipPath>
                    </defs>
                  </svg>
                </span>
              </button>
              <div x-show="openFaq3" class="faq-content">
                <p
                  class="pt-6 text-base text-relaxed text-body-color-2 dark:text-body-color"
                >
                  To open an account, visit the <?= NAME ?> website and click
                  “Sign Up.“ Complete the registration process by providing your
                  personal details, verifying your identity, and choosing the
                  account type that suits your trading needs.
                </p>
              </div>
            </div>
            <div
              class="py-6 mb-10 bg-white rounded-lg single-faq wow fadeInUp px-7 dark:bg-dark md:py-8 md:px-10"
              data-wow-delay="0s"
            >
              <button
                @click="openFaq4 = !openFaq4"
                class="flex items-center justify-between w-full text-left faq-btn"
              >
                <h3
                  class="mr-2 text-base font-bold text-dark dark:text-white sm:text-lg md:text-xl"
                >
                  Does <?= NAME ?> offer leverage?
                </h3>
                <span
                  class="icon inline-flex h-5 w-full max-w-[20px] items-center justify-center rounded-sm bg-body-color-2 text-white dark:text-black dark:bg-body-color text-lg font-semibold"
                  :class="openFaq4 && 'rotate-180' "
                >
                  <svg
                    width="10"
                    height="10"
                    viewBox="0 0 10 10"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0_50_132)">
                      <path
                        d="M8.82033 1.91065L4.99951 5.73146L1.17869 1.91064L-0.000488487 3.08978L4.99951 8.08978L9.99951 3.08979L8.82033 1.91065Z"
                        fill="currentColor"
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_50_132">
                        <rect
                          width="10"
                          height="10"
                          fill="white"
                          transform="translate(-0.000488281 0.000488281)"
                        />
                      </clipPath>
                    </defs>
                  </svg>
                </span>
              </button>
              <div x-show="openFaq4" class="faq-content">
                <p
                  class="pt-6 text-base text-relaxed text-body-color-2 dark:text-body-color"
                >
                  Yes, <?= NAME ?> provides flexible leverage options depending
                  on the asset class and account type. Leverage ratios vary, so
                  traders should use it responsibly and understand the
                  associated risks.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="absolute left-0 -bottom-36 -z-10">
        <img src="src/images/shapes/faq-shape-1.svg" alt="shape" />
      </div>
      <div class="absolute right-0 -top-36 -z-10">
        <img src="src/images/shapes/faq-shape-2.svg" alt="shape" />
      </div>
    </section>
    <!-- ===== Faq Section end ===== -->

    <!-- ===== Contact Section start ===== -->
    <section id="contact" class="bg-light-bg py-[120px] dark:bg-[#14102C]">
      <div class="container">
        <div class="flex flex-wrap items-center -mx-4">
          <div class="w-full px-4 lg:w-7/12">
            <div class="wow fadeInUp mb-16 max-w-[350px]" data-wow-delay="0s">
              <span
                class="mb-3 text-lg font-bold uppercase text-primary sm:text-xl"
              >
                Contact Us
              </span>
              <h2
                class="mb-3 text-3xl font-bold leading-tight text-black dark:text-white md:text-[45px]"
              >
                Let's talk about your problem.
              </h2>
            </div>

            <div class="flex flex-wrap -mx-4">
              <div class="w-full px-4 sm:w-1/2">
                <div
                  class="wow fadeInUp mb-11 max-w-[250px]"
                  data-wow-delay="0s"
                >
                  <h3
                    class="mb-4 text-lg font-semibold text-dark dark:text-white"
                  >
                    Our Location
                  </h3>
                  <p
                    class="text-base font-medium leading-loose text-body-color-2 dark:text-body-color"
                  >
                    <?= ADDRESS ?>
                  </p>
                </div>
              </div>
              <div class="w-full px-4 sm:w-1/2">
                <div
                  class="wow fadeInUp mb-11 max-w-[250px]"
                  data-wow-delay="0s"
                >
                  <h3
                    class="mb-4 text-lg font-semibold text-dark dark:text-white"
                  >
                    Email Address
                  </h3>
                  <p
                    class="text-base font-medium leading-loose text-body-color-2 dark:text-body-color"
                  >
                    <a
                      href="cdn-cgi/l/email-protection.html"
                      class="__cf_email__"
                      ><?= EMAIL ?></a
                    >
                  </p>
                 
                </div>
              </div>
              <div class="w-full px-4 sm:w-1/2">
                <div
                  class="wow fadeInUp mb-11 max-w-[250px]"
                  data-wow-delay="0s"
                >
                  <h3
                    class="mb-4 text-lg font-semibold text-dark dark:text-white"
                  >
                    Phone Number
                  </h3>
                  <p
                    class="text-base font-medium leading-loose text-body-color-2 dark:text-body-color"
                  >
                    <?= PHONE ?>
                  </p>
                </div>
              </div>
              <div class="w-full px-4 sm:w-1/2">
                <div
                  class="wow fadeInUp mb-11 max-w-[250px]"
                  data-wow-delay="0s"
                >
                  <h3
                    class="mb-4 text-lg font-semibold text-dark dark:text-white"
                  >
                    How Can We Help?
                  </h3>
                  <p
                    class="text-base font-medium leading-loose text-body-color-2 dark:text-body-color"
                  >
                    Tell us your problem we will get back to you ASAP.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="w-full px-4 lg:w-5/12">
            <div
              class="px-8 py-12 bg-white rounded-md sm:14 wow fadeInUp dark:bg-dark"
              data-wow-delay="0s"
            >
              <h3
                class="mb-8 text-2xl font-bold text-dark dark:text-white sm:text-[34px] lg:text-2xl xl:text-[34px]"
              >
                Send us a Message
              </h3>
              <!-- NOT ASSIGNED -->
              <form>
                <div class="mb-5">
                  <label
                    for="name"
                    class="block mb-2 text-sm font-medium text-dark dark:text-white"
                  >
                    Full Name*
                  </label>

                  <input
                    type="text"
                    id="name"
                    placeholder="Enter your full name"
                    class="w-full rounded-md border border-[#E9E9E9]/50 py-3 px-5 text-base font-medium text-body-color outline-hidden focus:border-primary dark:border-[#E9E9E9]/20 dark:bg-white/5"
                  />
                </div>
                <div class="mb-5">
                  <label
                    for="email"
                    class="block mb-2 text-sm font-medium text-dark dark:text-white"
                  >
                    Email Address*
                  </label>

                  <input
                    type="email"
                    id="email"
                    placeholder="Enter your email address"
                    class="w-full rounded-md border border-[#E9E9E9]/50 py-3 px-5 text-base font-medium text-body-color outline-hidden focus:border-primary dark:border-[#E9E9E9]/20 dark:bg-white/5"
                  />
                </div>
                <div class="mb-5">
                  <label
                    for="message"
                    class="block mb-2 text-sm font-medium text-dark dark:text-white"
                  >
                    Message*
                  </label>

                  <textarea
                    rows="6"
                    id="message"
                    placeholder="Type your message"
                    class="w-full rounded-md border border-[#E9E9E9]/50 py-3 px-5 text-base font-medium text-body-color outline-hidden focus:border-primary dark:border-[#E9E9E9]/20 dark:bg-white/5"
                  ></textarea>
                </div>
                <div>
                  <button
                    class="w-full p-3 text-base font-semibold text-center text-white rounded-full bg-primary hover:bg-primary/90 dark:bg-white dark:text-black dark:hover:bg-primary/90"
                  >
                    Send Message
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ===== Contact Section end ===== -->

    <!-- ===== Newsletter Section start ===== -->
    <section id="newsletter" class="relative z-10">
      <div
        class="absolute top-0 left-0 -z-10 h-[120px] w-full bg-light-bg dark:bg-[#14102C]"
      ></div>
      <div class="container">
        <div
          class="relative z-10 p-8 overflow-hidden rounded-sm wow fadeInUp bg-dark sm:p-12"
          data-wow-delay="0s"
        >
          <div class="flex flex-wrap items-center -mx-4">
            <div class="w-full px-4 lg:w-1/2">
              <div class="mb-10 lg:mb-0">
                <div class="max-w-[500px]">
                  <h2
                    class="mb-2 text-3xl font-bold leading-tight text-white md:text-[45px]"
                  >
                    Newsletter
                  </h2>
                  <p class="text-lg font-medium text-white">
                    Subscribe to our newsletter to get the latest updates,
                    news, and exclusive offers directly in your inbox.
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full px-3 lg:w-1/2">
              <div>
                <!-- NEWSLETTER NOT ASSIGNED -->
                <form class="relative">
                  <input
                    type="email"
                    placeholder="Enter email address"
                    class="w-full px-10 py-5 text-base font-medium bg-white border border-transparent rounded-full text-body-color-2 outline-hidden dark:text-body-color sm:pr-24"
                  />
                  <button
                    class="right-[10px] top-1/2 mt-5 inline-flex h-12 items-center rounded-full bg-primary px-7 text-base font-medium text-white hover:bg-primary/90 sm:absolute sm:mt-0 sm:-translate-y-1/2"
                  >
                    Submit
                    <span class="pl-1">
                      <svg
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M1.67496 17.5L19.1666 10L1.67496 2.5L1.66663 8.33333L14.1666 10L1.66663 11.6667L1.67496 17.5Z"
                          fill="white"
                        />
                      </svg>
                    </span>
                  </button>
                </form>
              </div>
            </div>
          </div>

          <div class="absolute top-0 right-0 -z-10">
            <img src="src/images/shapes/newsletter-shape.svg" alt="shape" />
          </div>
        </div>
      </div>
    </section>
    <!-- ===== Newsletter Section end ===== -->

    <!-- ===== Footer start ===== -->
    <?php include 'assets/footer.php'; ?>