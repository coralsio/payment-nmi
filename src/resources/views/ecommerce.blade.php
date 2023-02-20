<div class="row">
    <div class="col-md-12">
        @php \Actions::do_action('pre_nmi_checkout_form',$gateway) @endphp
        <form action="{{ url($action) }}" method="post" id="payment-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <div class="card panel panel-default">
                <div class="card-header panel-heading">
                    @lang('Nmi::labels.card.credit_or_debit')
                </div>
                <div class="card-body panel-body">
                    <div class="row">

                        <!-- custom fields can be added here -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="card_number">@lang('Nmi::attributes.card_number')</label>
                                <div id="card_number" class="form-control-input">

                                </div>
                                <div id="ccnumber-error" class="error" style="display: none;">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 p-r-0">
                            <div class="form-group">
                                <label for="expiry_month">@lang('Nmi::attributes.expiry')</label>
                                <div id="cc_expiry" class="form-control-input">

                                </div>
                                <div id="ccexp-error" class="error" style="display: none;">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ccv">@lang('Nmi::attributes.ccv')</label>
                                <div id="ccv" class="form-control-input">

                                </div>
                                <div id="cvv-error" class="error" style="display: none;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <span id="payment-form-span"></span>
                        <div id="card-errors" role="alert"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    div#card-errors {
        color: red;
        font-weight: 600;
        padding: 10px;
    }

    .error {
        color: red;
    }

    .form-control-input input {
        padding: 18px 3px;
        border: 1px solid #dbe2e8;
        border-radius: 8px;
        background-color: #ffffff;
        color: #606975;
        font-size: 14px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        height: 44px;
    }
</style>
<script type="text/javascript">

    var isAjax = '{{ request()->ajax() }}';

    window.onload = function () {
        initNmi();
    };

    if (isAjax == '1') {
        initNmi();
    }

    function initNmi() {

        $('#payment-form').on('submit', function (event) {
            event.preventDefault();
            $("#payment-form-span").click();
        })

        let fieldsStatus = {
            ccnumber: {
                valid: false,
            },
            ccexp: {
                valid: false,
            },
            cvv: {
                valid: false,
            },
        };

        CollectJS.configure({
            "paymentSelector": "#payment-form-span",
            "variant": "inline",
            "styleSniffer": "true",
            'theme': 'bootstrap',
            "customCss": {
                "color": "black",
            },
            "invalidCss": {
                "color": "red",
            },
            "validCss": {
                "color": "black",
            },
            "placeholderCss": {
                "color": "gray",
            },
            "fields": {
                "ccnumber": {
                    "selector": "#card_number",
                    "title": "Card Number",
                    "placeholder": "0000 0000 0000 0000"
                },
                "ccexp": {
                    "selector": "#cc_expiry",
                    "title": "Card Expiration",
                    "placeholder": "00 / 00"
                },
                "cvv": {
                    "display": "show",
                    "selector": "#ccv",
                    "title": "CVV Code",
                    "placeholder": "***"
                },
            },
            'validationCallback': function (field, status, message) {
                if (status) {
                    $(`#${field}-error`).html('').hide();
                    fieldsStatus[field].valid = true;
                } else {
                    $(`#${field}-error`).html(message).show();
                    fieldsStatus[field].valid = false;
                }

                let disabled = false;

                for (let fieldStatus in fieldsStatus) {
                    if (fieldsStatus.hasOwnProperty(fieldStatus)) {
                        if (!fieldsStatus[fieldStatus].valid) {
                            disabled = true;
                            break;
                        }
                    }
                }
            },
            "fieldsAvailableCallback": function () {
            },
            'callback': function (response) {
                $form = $('#payment-form');
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='checkoutToken' value='" + response.token + "'/>");
                $form.append("<input type='hidden' name='gateway' value='Nmi'/>");
                ajax_form($form);
            }
        });


    }
</script>
