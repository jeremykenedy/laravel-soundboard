<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        document.getElementById('currentTheme').onchange = function(){
            var elem = (typeof this.selectedIndex === "undefined" ? window.event.srcElement : this);
            var value = elem.value || elem.options[elem.selectedIndex].value;
            processThemeChange(value);
        };
        function processThemeChange(themeId) {
            var notificaton = $.notify({
                icon: "nc-icon nc-refresh-69 spin",
                message: "{!! trans('themes.theme_updating') !!}"
            }, {
                allow_dismiss: false,
                type: 'primary',
                timer: 4000,
                placement: {
                    from: 'top',
                    align: 'center'
                },
                showProgressbar: true
            });
            notificaton.update('progress', 50);
            $.ajax({
                type:'POST',
                url: "{{ route('update-theme') }}",
                data: $('#update_theme_form').serialize(),
                success: function (response) {
                    notificaton.update({
                        'icon': "nc-icon nc-check-2",
                        'type': 'success',
                        'message': response.message,
                        'progress': 100,
                    });
                },
                error: function (response, status, error) {
                    notificaton.update({
                        'icon': "nc-icon nc-simple-remove",
                        'type': 'danger',
                        'message': error,
                        'progress': 100,
                    });
                },
            });
        }
    });
</script>