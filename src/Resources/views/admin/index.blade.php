@extends('admin::layouts.content')

@section('page_title')
    Import currencies
@stop

@section('content')

    <div class="content full-page dashboard">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('currencies::app.import_title') }}</h1>
            </div>

            <div class="page-action">
                <button id="startImport" class="btn btn-md btn-primary">
                    {{ __('currencies::app.import_btn') }}
                </button>
            </div>
        </div>

        <div class="page-content">
            <div class="table">
                <table>
                    <thead>
                        <tr style="height: 65px;">
                        <th>
                            <span class="checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="checkbox" class="checkbox-view"></label>
                                
                            </span>
                        </th>
                        <th>{{ __('admin::app.settings.currencies.code') }}</th>
                        <th>{{ __('admin::app.settings.currencies.name') }}</th>
                        <th>{{ __('admin::app.settings.currencies.symbol') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($currencies as $currency)
                        <tr>
                            <td>
                                <span class="checkbox">
                                    <input type="checkbox" name="code[]" value="{{ $currency["code"] }}">
                                    <label for="checkbox" class="checkbox-view"></label>
                                </span>
                            </td>
                            <td>{{ $currency["code"] }}</td>
                            <td>{{ $currency["name"] }}</td>
                            <td>{{ $currency["symbol"] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection