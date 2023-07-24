<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
 
<script src="{{ asset('/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>


<script src="{{asset('assets/js/argon.min23cd.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                console.log($('#card_number').val(),$('#cvc').val(),$('#exp_month').val(),$('#exp_year').val());
                Stripe.createToken({
                    number: $('#card_number').val(),
                    cvc: $('#cvc').val(),
                    exp_month: $('#exp_month').val(),
                    exp_year: $('#exp_year').val()
                }, stripeResponseHandler);
            }

        }); 
 
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                // token contains id, last4, and card type
                var token = response['id'];
                // insert the token into the form so it gets submitted to the server
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>

