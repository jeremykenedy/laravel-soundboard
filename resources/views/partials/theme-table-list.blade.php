<div class="table-responsive">
    <table class="table align-items-center table-flush table-sm">
        <thead class="thead-light">
            <tr>
                <th>{!! trans('themes.themesStatus') !!}</th>
                <th>{!! trans('themes.themesName') !!}</th>
                <th class="hidden-xs hidden-sm hidden-md">{!! trans('themes.themesLink') !!}</th>
            </tr>
        </thead>

        <tbody>
            @foreach($themes as $key => $value)
                @php
                    $themeStatus = [
                        'name'  => trans('themes.statusDisabled'),
                        'class' => 'danger'
                    ];
                    if($value->status == 1) {
                        $themeStatus = [
                            'name'  => trans('themes.statusEnabled'),
                            'class' => 'success'
                        ];
                    }
                @endphp
                <tr>
                    <td>
                        <span class="badge badge-pill badge-{{ $themeStatus['class'] }}">
                            {!! $themeStatus['name'] !!}
                        </span>
                    </td>
                    <td style="font-size: .6em;">
                        {!! $value->name !!}
                    </td>
                    <td class="hidden-xs hidden-sm hidden-md">
                        <a href="{!! $value->link !!}" target="_blank" data-toggle="tooltip" title="Go to Link">
                            {!! $value->link !!}
                        </a>
                    </td>
            @endforeach
        </tbody>
    </table>
</div>
