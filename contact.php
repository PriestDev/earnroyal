<?php 
    include 'assets/header2.php';
?>

<body>
        <div class="preloader">
        <div class="animated-preloader"></div>
    </div>
    <div class="overlay"></div>
    <?php include 'assets/navbar2.php'; ?>

    <div class="contact-section py-5 bg--light">
    <div class="container">
        <h3 class="text-center mb-4">Contact Us</h3>
        <div class="card custom--card">
            <div class="card-body">
                <h3 class="title mb-2"></h3>
                <p class="mb-3"></p>
                <div class="mb-3">
                                    </div>
                <form action="https://bluewave-iso.net/contact" class="contact-form verify-gcaptcha" method="post">
                    <input type="hidden" name="_token" value="jfT6QkE1k5q7AGKBYqnhvWCs7H9HNv7O7Wo1REE8">                    <div class="row gy-4">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control form--control h-45" value=""  required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control form--control h-45" value=""  required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="subject" class="form-control form--control h-45" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control form--control" name="message" placeholder="Write down your message..." required></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                                                    </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn--base">Send Message</button>
                        </div>
                    </div>
                </form>
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
            window.location.href = "https://bluewave-iso.net/change/" + $(this).val();
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


<!-- Mirrored from bluewave-iso.net/contact by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Jul 2025 08:52:05 GMT -->
</html>
