<script>
    var currencyIndex = "{{ route('admin.currencies.index') }}";
    var currencyStore = "{{ route('admin.currencies.import.save') }}";

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('th input:checkbox').click(function () {
            if ($(this).is(':checked')) {
                $('td input:checkbox').prop('checked', true);
            }
            else {
                $('td input:checkbox').prop('checked', false);
            }
        });

        $("#startImport").click(function() {
            if ($("td input:checkbox:checked").length > 0)
            {
                addCurrencies()
            }
            else
            {
                alert('Please select at least one currency to import.')
            }

        });

        function addCurrencies(){

            var data = {'currency_id[]' : []};

            $(":checked").each(function() {
                data['currency_id[]'].push($(this).val());
            });

            $.post({
                url: currencyStore,
                data: data,
                success: function (data) {
                    if($.isEmptyObject(data.error)){
                        window.location.replace(currencyIndex);
                    } else {
                        alert(data.error);
                    }
                }
            });
        }

    });
</script>