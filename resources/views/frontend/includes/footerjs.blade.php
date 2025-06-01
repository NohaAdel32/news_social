<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/frontend/lib/slick/slick.min.js')}}"></script>
    {{-- file input --}}
    <script src="{{ asset('assets/vendors/file_input/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/file_input/themes/fa5/theme.min.js') }}"></script>

    {{-- sumernote --}}
    <script src="{{ asset('assets/vendors/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{asset('assets/frontend/js/main.js')}}"></script>
    @stack('js')