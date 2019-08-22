<form method="PATCH" action="{{ route('update-theme') }}" id="update_theme_form" role="form" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="POST">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <div class="form-group has-feedback row {{ $errors->has('currentTheme') ? ' has-error ' : '' }}">
        <div class="col-12">
            <label class="control-label" for="currentTheme" >
                {{ trans('themes.default.label') }}
            </label>
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
    @include('scripts.change-theme-script')
@endpush
