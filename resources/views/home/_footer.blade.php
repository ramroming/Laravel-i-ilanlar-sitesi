@php
    $setting= \App\Http\Controllers\HomeController::getSetting()
@endphp
<style>
   .my-info{
        /*color: rgba(255, 255, 255, 0.5);*/
       color: #89ba16;
    }
</style>
<footer class="site-footer">

    <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
    </a>

    <div class="container">
        <div class="row mb-5">

            <div class="col-6 col-md-3 mb-4 mb-md-0">
                <h3>Company</h3>
                <ul class="list-unstyled my-info ">
                    <li>{{$setting->company}}</li>
                    <li>{{$setting->address}}</li>
                    <li><strong>Phone:</strong> {{$setting->phone}}</li>
                    <li><strong>Email:</strong> {{$setting->email}}</li>
                    <li><strong>Fax:</strong> {{$setting->fax}}</li>
                    <li><a href="{{route('about')}}">About Us</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-3 mb-4 mb-md-0">
                <h3>Acount</h3>
                <ul class="list-unstyled">
                    <li><a href="{{route('adminLogin')}}">Login</a></li>
                    <li><a href="#">Graphic Design</a></li>
                    <li><a href="#">Web Developers</a></li>
                    <li><a href="#">Python</a></li>
                    <li><a href="#">HTML5</a></li>
                    <li><a href="#">CSS3</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-3 mb-4 mb-md-0">
                <h3>Support</h3>
                <ul class="list-unstyled">
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 mb-4 mb-md-0">
                <h3>Contact Us</h3>
                <div class="footer-social">
                    @if ($setting -> facebook != null) <a href="{{$setting -> facebook}}" target="_blank">
                        <span class="icon-facebook "></span></a> @endif
                    @if ($setting -> twitter != null) <a href="{{$setting -> twitter}}"  target="_blank">
                        <span class="icon-twitter"></span></a> @endif
                    @if ($setting -> instagram != null) <a href="{{$setting -> instagram}}" target="_blank" >
                        <span class="icon-instagram"></span></a> @endif
                    @if ($setting -> youtube != null) <a href="{{$setting -> youtube}}" target="_blank">
                        <span class="icon-youtube"></span></a> @endif


                        {{--                    <a href="#"><span class="icon-twitter"></span></a>--}}
{{--                    <a href="#"><span class="icon-instagram"></span></a>--}}
{{--                    <a href="#"><span class="icon-linkedin"></span></a>--}}
                </div>
            </div>
        </div>

        {{--        company name --}}

        <div class="row text-center">
            <div class="col-12">
                <p class="copyright"><small>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved |
                        {{$setting->company}}</small></p>
            </div>
        </div>


    </div>
</footer>


<!-- SCRIPTS -->
<script src="{{asset('assets')}}/js/jquery.min.js"></script>
<script src="{{asset('assets')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets')}}/js/isotope.pkgd.min.js"></script>
<script src="{{asset('assets')}}/js/stickyfill.min.js"></script>
<script src="{{asset('assets')}}/js/jquery.fancybox.min.js"></script>
<script src="{{asset('assets')}}/js/jquery.easing.1.3.js"></script>

<script src="{{asset('assets')}}/js/jquery.waypoints.min.js"></script>
<script src="{{asset('assets')}}/js/jquery.animateNumber.min.js"></script>
<script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>

<script src="{{asset('assets')}}/js/bootstrap-select.min.js"></script>

<script src="{{asset('assets')}}/js/custom.js"></script>
<script src="{{asset('assets')}}/js/quill.min.js"></script>

{{--form the new template--}}
<!-- Vendor JS Files -->
<script src="{{asset('assets')}}/assets/vendor/aos/aos.js"></script>
<script src="{{asset('assets')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{asset('assets')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{asset('assets')}}/assets/vendor/php-email-form/validate.js"></script>
<script src="{{asset('assets')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{asset('assets')}}/assets/vendor/waypoints/noframework.waypoints.js"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets')}}/assets/js/main.js"></script>

{{--livewire scripts--}}
@livewireScripts

{{--for job_single pagintation--}}
@yield('footerjs')
