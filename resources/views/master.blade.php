<!doctype html>
<html>
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		
		{!! Html::style('lib/bootstrap_3.3.5/css/bootstrap.min.css') !!}
		{!! Html::style('lib/bootstrap_3.3.5/css/bootstrap-theme.min.css') !!}
		{!! Html::script('lib/jquery_2.1.4/jquery.min.js') !!}
		{!! Html::script('lib/bootstrap_3.3.5/js/bootstrap.min.js') !!}
		
		{!! Html::style('lib/custom/master.css') !!}
		{!! Html::script('lib/bootstrap_maxlength/bootstrap-maxlength.js') !!}
		{!! Html::script('lib/custom/maxlength_custom.js') !!}

        @yield('lib_nav')

        @yield('lib')

        <title>@yield('title')</title>

    </head>
    <body>

        @yield('body')

        <div id="alert_box">

            @if ($errors->has())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            @if(Session::has('status'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{Session::get('status')}}
                </div>
            @endif

        </div>

    </body>

</html>