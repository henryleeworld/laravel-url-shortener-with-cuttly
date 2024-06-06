<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ __('URL Shortener') }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">
            <h4 class="font-weight-bold mb-3 mt-3 text-success text-center">{{ __('URL Shortener: Do not insert illegal or dangerous links.') }}</h4>
            <div class="card">
                <div class="card-header">
                    <form method="POST" action="{{ route('short-url.generate.post') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="url" class="form-control" placeholder="{{ __('Target URL') }}" aria-label="{{ __('Target URL') }}" aria-describedby="button-addon"/>
                            <button class="btn btn-success" type="submit" id="button-addon">{{ __('Generate') }}</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif

                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Shorten URL') }}</th>
                                <th>{{ __('Target URL') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shortUrls as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td><a href="{{ config('cuttly.domain') . $row->code }}" target="_blank">{{ config('cuttly.domain') . $row->code }}</a></td>
                                <td>{{ $row->url }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
