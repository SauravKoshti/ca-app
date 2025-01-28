<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/user/css/custom.css') }}"> -->
</head>

<body>
    @include('users.layouts.header')
    <!-- @include('users.layouts.navbar') -->

    <main class="py-4">
        @yield('content')
    </main>

    @include('users.layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/user/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/user/js/custom.js') }}"></script> -->

    <script>
    $(document).ready(function() {
        $('.navbar a.dropdown-toggle').on('click', function(e) {
            var $el = $(this);
            var $parent = $(this).offsetParent(".dropdown-menu");
            $(this).parent("li").toggleClass('open');

            if (!$parent.parent().hasClass('nav')) {
                $el.next().css({
                    "top": $el[0].offsetTop,
                    "left": $parent.outerWidth() - 4
                });
            }

            $('.nav li.open').not($(this).parents("li")).removeClass("open");

            return false;
        });
    });
    </script>
    <script language="javascript">
    $(function() {
        $('#myNavbar li a[href^="' + location.pathname.split("")[1] + '"]').addClass('active');
    });
    </script>
    <script>
    function toggleGstNumberField() {
        const userType = document.getElementById('userType').value; // Get the selected value
        const gstField = document.getElementById('gstNumberField'); // GST Number field container

        // Show GST field if "business" is selected, otherwise hide it
        if (userType === 'business') {
            gstField.classList.remove('hidden'); // Show field
        } else {
            gstField.classList.add('hidden'); // Hide field
        }
    }
    </script>
</body>

</html>