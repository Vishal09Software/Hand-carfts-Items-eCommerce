 <!-- footer start-->
 <div class="container-fluid">
    <footer class="footer">
        <div class="row">
            <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
            </div>
        </div>
    </footer>
</div>
<!-- footer End-->
</div>
<!-- index body end -->

</div>
<!-- Page Body End -->
</div>
<!-- page-wrapper End-->

<!-- Modal Start -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog  modal-dialog-centered">
<div class="modal-content">
<div class="modal-body">
    <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
    <p>Are you sure you want to log out?</p>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    <div class="button-box">
        <button type="button" class="btn btn--no" data-bs-dismiss="modal">No</button>
        <a href="{{ '/admin/logout' }}"><button type="button" class="btn  btn--yes btn-primary"> Yes </button></a>
    </div>
</div>
</div>
</div>
</div>
<!-- Modal End -->

<!-- latest js -->
<script src="{{ url('backend/assets/js/jquery-3.6.0.min.js') }}"></script>

<!-- Bootstrap js -->
<script src="{{ url('backend/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- feather icon js -->
<script src="{{ url('backend/assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ url('backend/assets/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- scrollbar simplebar js -->
<script src="{{ url('backend/assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ url('backend/assets/js/scrollbar/custom.js') }}"></script>

<!-- Sidebar jquery -->
<script src="{{ url('backend/assets/js/config.js') }}"></script>

<!-- tooltip init js -->
<script src="{{ url('backend/assets/js/tooltip-init.js') }}"></script>

<!-- Plugins JS -->
<script src="{{ url('backend/assets/js/sidebar-menu.js') }}"></script>
<script src="{{ url('backend/assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ url('backend/assets/js/notify/index.js') }}"></script>

<!-- Apexchar js -->
<script src="{{ url('backend/assets/js/chart/apex-chart/apex-chart1.js') }}"></script>
<script src="{{ url('backend/assets/js/chart/apex-chart/moment.min.js') }}"></script>
<script src="{{ url('backend/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ url('backend/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ url('backend/assets/js/chart/apex-chart/chart-custom1.js') }}"></script>


<!-- slick slider js -->
<script src="{{ url('backend/assets/js/slick.min.js') }}"></script>
<script src="{{ url('backend/assets/js/custom-slick.js') }}"></script>

<!-- customizer js -->
<script src="{{ url('backend/assets/js/customizer.js') }}"></script>

<!-- ratio js -->
<script src="{{ url('backend/assets/js/ratio.js') }}"></script>

<!-- sidebar effect -->
<script src="{{ url('backend/assets/js/sidebareffect.js') }}"></script>

<!-- Theme js -->
<script src="{{ url('backend/assets/js/script.js') }}"></script>

<script src="{{url('backend/ckeditor/ckeditor.js')}}"></script>

@yield('scripts')
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2023 09:08:47 GMT -->
</html>
