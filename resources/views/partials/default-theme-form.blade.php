<form method="PATCH" action="{{ route('update-theme') }}" class="" id="update_theme_form" role="form" "enctype"="multipart/form-data" >
    {{ csrf_field() }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="POST">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <div class="form-group has-feedback row {{ $errors->has('currentTheme') ? ' has-error ' : '' }}">

        <lable for="currentTheme" class="col-12 control-label">
            {{ trans('themes.default.label') }}
        </lable>

        <div class="col-12">
            <select name="currentTheme" id="currentTheme" class="form-control">
                @foreach ($themes as $theme)
                    <option @if ($theme == $currentTheme) selected @endif value="{{ $theme->id }}">
                        {{ $theme->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @if ($errors->has('currentTheme'))
            <div class="row">
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('currentTheme') }}</strong>
                    </span>
                </div>
            </div>
        @endif
    </div>
</form>

@push('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.min.js"></script>
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
@endpush
