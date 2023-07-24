
    <!--Javascript
        ========================================================-->
        <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/venobox.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/timepicker.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/jquery.datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

        <script src="{{ asset('assets/authentication/moment.min.js') }}"></script>
        <script src="{{ asset('assets/authentication/moment-timezone-with-data.js') }}"></script>

        <script>
            'use strict';

            $( document ).ready(function() {
                $('#exampleCheck1').change(function() {
                    if(this.checked) {
                        $('#submit').removeClass("disabled");
                    }else{
                        $('#submit').addClass("disabled");
                    }
                });


                var timezone = moment.tz.guess();
                $('#timezone').val(timezone);
            });
        </script>
    </body>
    
    </html>