<html hreflang="en-in">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="qAWgs0nt0IxG_EA9nJdB3rpLixL_WKUAlVzTbYtJ3c0" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">

    <title>Dealers &amp; Distributors Opportunity in India - All Establish Destributors</title>
    <meta name="author" content="Mohit Kumar">
    <meta name="description"
        content="All Establish Destributors is an unique platform to appoint distributors, apply for distributorship and become a wholesale distributor. Dealership  opportunities in India.">
    <meta name="keywords"
        content="distributorship opportunities, appoint distributors, apply for distributorship, become a wholesale distributor, take distributorship, take franchise, companies who need distributors, All Establish Destributors, distributorship, get distributorship">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/megamenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/toastr/toastr.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('frontend/css/common.css') }}">
    <style>
        .login_popup_modal .modal-content {
            background-color: #fff !important;
            background: url({{ asset('frontend/image/bgg.jpg') }});
            /* background-size: 100% 100%; */
            /* width: 75%; */
        }
    </style>
</head>

<body>

    @include('frontend.layouts.header')

    @section('content')

    @show

    @include('frontend.layouts.footer')


    <button id="BtnOpenEnquiriesModal" data-toggle="modal" data-target="#SendEnquiresModel"
        style="visibility: hidden;"></button>
    <div class="modal fade" id="SendEnquiresModel" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenteredLabel_fst" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered login_popup" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenteredLabel_fst">Post Your Requerment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        id="BtnCloseEnquiriesModal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row" method="post" id="SendEnquiryForm" action="{{ route('sendRequirement') }}">
                        @csrf
                        <div class="form-group col-12">
                            <input type="text" class="form-control" placeholder="Enter name" name="name" required>
                        </div>
                        <div class="form-group col-12">
                            <input type="text" class="form-control" placeholder="Enter mobile" name="mobile"
                                required>
                        </div>
                        <div class="form-group col-12">
                            <input type="text" class="form-control" placeholder="Enter email" name="email"
                                required>
                        </div>
                        <div class="form-group col-12">
                            <input type="text" class="form-control" placeholder="Enter location" name="location"
                                required>
                        </div>

                        <div class="form-group col-12">
                            <textarea class="form-control" name="description" rows="4" placeholder="Write your requirement" required></textarea>
                            <input type="hidden" class="form-control" name="product_id"
                                id="enquiry_model_product_id" value="0">
                            <input type="hidden" class="form-control" name="manufacturer_id"
                                id="enquiry_model_user_id" value="0">
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-theme">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button id="BtnOpenLoginModal" data-toggle="modal" data-target="#UserLoginModel"
        style="visibility: hidden;"></button>


    <script src="{{ asset('frontend/js/jquery3.2.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
        integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"
        integrity="sha512-FwqNPb8ENFXApJKNgRgYq5ok7VoOf5ImaOdzyF/xe/T5jdd/S0xq0CXBLDhpzaemxpQ61X3nLVln6KaczwhKgA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend/vendor/toastr/toastr.js') }}"></script>

    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>

    {{-- <script>
        var url = 'https://wati-integration-prod-service.clare.ai/v2/watiWidget.js?89216';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#0f3b73",
                "ctaText": "Chat with us",
                "borderRadius": "25",
                "marginLeft": "0",
                "marginRight": "20",
                "marginBottom": "20",
                "ctaIconWATI": false,
                "position": "right"
            },
            "brandSetting": {
                "brandName": "Wati",
                "brandSubTitle": "undefined",
                "brandImg": "https://www.wati.io/wp-content/uploads/2023/04/Wati-logo.svg",
                "welcomeText": "Hi there!\nHow can I help you?",
                "messageText": "",
                "backgroundColor": "#0f3b73",
                "ctaText": "Chat with us",
                "borderRadius": "25",
                "autoShow": false,
                "phoneNumber": "919643937925"
            }
        };
        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script> --}}

    <script>
        $(document).ready(() => {
            $("img.lazyload").lazyload();
            const inputElement = document.getElementById('deskViewSearchInput');
            if (inputElement) {
                inputElement.focus();
            } else {
                console.error("Input element not found.");
            }

            $('#deskViewSearchInput').click(function() {
                $('#deskViewSearchInput').focus();
            });

        });

        function SetDistributorshipAttr(element) {
            var product_id = $(element).attr('data-product-id');
            var manufacturer_id = $(element).attr('data-manufacturer-id');
            $('#enquiry_model_product_id').val(product_id);
            $('#enquiry_model_user_id').val(manufacturer_id);
        }
    </script>

    <script>
        $(document).ready(() => {
            $('.OpenMobileMenuBtn').click(() => {

                $('#MobileMenuContainer').show();
                $('#MobileMenuContainer').css('width', '300px');
            });
            $('.CloseMobileMenuBtn').click(() => {
                $('#MobileMenuContainer').hide();
                $('#MobileMenuContainer').css('width', '0px');
            });
        });
        $('.testimonial-slider').owlCarousel({
            margin: 0,
            responsiveClass: true,
            nav: false,
            dots: true,
            loop: true,
            autoplay: true,
            navText: ["Prev", "Next"],
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                700: {
                    items: 2,
                },
                1000: {
                    items: 2,

                }
            },
        });
        $('.home-banner-slider').owlCarousel({
            autoplaySpeed: 1000,
            autoplayHoverPause: true,
            margin: 0,
            responsiveClass: true,
            nav: false,
            dots: true,
            loop: true,
            autoplay: true,
            navText: ["Prev", "Next"],
            smartSpeed: 500,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                700: {
                    items: 1,
                },
                1000: {
                    items: 1,

                }
            },
        });

        $('.slider-items').owlCarousel({
            margin: 0,
            responsiveClass: true,
            nav: false,
            dots: true,
            loop: false,
            autoplay: true,
            navText: ["Prev", "Next"],
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 2,
                },
                600: {
                    items: 4,
                },
                700: {
                    items: 4,
                },
                1000: {
                    items: 4,
                }
            },
        });
    </script>
</body>

</html>
