<?php 
    include 'assets/header2.php';
?>

<body>
        <div class="preloader">
        <div class="animated-preloader"></div>
    </div>
    <div class="overlay"></div>
    <?php include 'assets/navbar2.php'; ?>

        <section class="pt-120 pb-120 bg--light full-height">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title mb-2">Cookie Policy</h3>
                    <hr class="mb-4">
                    <div class="mb-5">
    <h3 class="mb-3">
        What information do we collect?</h3>
    <p class="font-18">We gather data from you
        when you register on our site, submit a request, buy any services, react to an overview, or round out a
        structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be
        approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site
        anonymously.</p>
</div>
<div class="mb-5">
    <h3 class="mb-3">
        How do we protect your information?</h3>
    <p class="font-18">All provided
        delicate/credit data is sent through Stripe.<br>After an exchange, your private data (credit cards, social
        security numbers, financials, and so on) won't be put away on our workers.</p>
</div>
<div class="mb-5">
    <h3 class="mb-3">
        Do we disclose any information to outside parties?</h3>
    <p class="font-18">We don't sell, exchange,
        or in any case move to outside gatherings by and by recognizable data. This does exclude confided in outsiders
        who help us in working our site, leading our business, or adjusting you, since those gatherings consent to keep
        this data private. We may likewise deliver your data when we accept discharge is suitable to follow the law,
        implement our site strategies, or ensure our own or others' rights, property, or wellbeing.</p>
</div>
<div class="mb-5">
    <h3 class="mb-3">
        Children's Online Privacy Protection Act Compliance</h3>
    <p class="font-18">We are consistent with
        the prerequisites of COPPA (Children's Online Privacy Protection Act), we don't gather any data from anybody
        under 13 years old. Our site, items, and administrations are completely coordinated to individuals who are in
        any event 13 years of age or more established.</p>
</div>
<div class="mb-5">
    <h3 class="mb-3">
        Changes to our Privacy Policy</h3>
    <p class="font-18">If we decide to change
        our privacy policy, we will post those changes on this page.</p>
</div>
<div class="mb-5">
    <h3 class="mb-3">
        How long we retain your information?</h3>
    <p class="font-18">At the point when you
        register for our site, we cycle and keep your information we have about you however long you don't erase the
        record or withdraw yourself (subject to laws and guidelines).</p>
</div>
<div class="mb-5">
    <h3 class="mb-3">
        What we don’t do with your data</h3>
    <p class="font-18">We don't and will never
        share, unveil, sell, or in any case give your information to different organizations for the promoting of their
        items or administrations.</p>
</div>                </div>
            </div>
        </div>
    </section>

   

                <!-- cookies dark version start -->
        <!-- <div class="cookies-card text-center hide">
            <div class="cookies-card__icon bg--base">
                <i class="las la-cookie-bite"></i>
            </div>
            <p class="mt-4 cookies-card__content">We may use cookies or any other tracking technologies when you visit our website, including any other media form, mobile website, or mobile application related or connected to help customize the Site and improve your experience. <a href="cookie-policy.html" class="text-primary" target="_blank">learn more</a></p>
            <div class="cookies-card__btn mt-4">
                <a href="javascript:void(0)" class="btn btn--base text-white w-100 policy">Allow</a>
            </div>
        </div> -->
        <!-- cookies dark version end -->
    
    <script src="assets/global/js/jquery-3.6.0.min.js"></script>
    <script src="assets/global/js/bootstrap.bundle.min.js"></script>

    <!-- Pluglin Link -->
    <script src="assets/templates/invester/js/lib/slick.min.js"></script>
    <script src="assets/templates/invester/js/lib/magnific-popup.min.js"></script>
    <script src="assets/templates/invester/js/lib/apexcharts.min.js"></script>

    
    <!-- Main js -->
    <script src="assets/templates/invester/js/main.js"></script>

    
    
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
            window.location.href = "https://<?= DOMAIN ?>/change/" + $(this).val();
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
            $.get('cookie-policy.html', function(response) {
                $('.cookies-card').addClass('d-none');
            });
        });


        setTimeout(function() {
            $('.cookies-card').removeClass('hide')
        }, 2000);
    </script>
</body>
</html>
