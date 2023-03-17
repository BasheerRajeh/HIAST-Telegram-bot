@extends('backend.layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('status'))
            <div class="alere alert-info">
                <span>{{ Session::get('status') }}</span>
            </div>
        @endif
        <form action="{{ route('admin.setting.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Url callback server TelegramBot</label>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Choose<span class="caret"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#"
                                onclick="document.getElementById('url_callback_bot').value='{{ url('') }}'">last webhook</a>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('setwebhook').submit();">set webhook</a>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('getwebhookinfo').submit();">Get information</a>
                        </div>
                    </div>
                    <input type="url" class="form-control" id="url_callback_bot" name="url_callback_bot"
                        value="{{ $url_callback_bot ?? '' }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>

        <form action="{{route('admin.setting.setwebhook')}}" id="setwebhook" method="POST" style="display: none;">
            {{ csrf_field() }}
            <input type="hidden" name="url" value="{{$url_callback_bot?? ''}}">
        </form>

        <form action="{{route('admin.setting.getwebhookinfo')}}" id="getwebhookinfo" method="POST" style="display: none;">
            {{ csrf_field() }}
            <input type="hidden" name="url" value="{{$url_callback_bot?? ''}}">
        </form>
    </div>
@endsection
