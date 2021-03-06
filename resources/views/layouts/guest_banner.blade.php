<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="See details of tournament : {{trans_choice('core.tournament',1). ": ".$tournament->name  }} with Kendozone">
    <title>{{ app()->environment()=='local' ? getenv('APP_NAME') : config('app.name') }}</title>

    <meta property="og:title" content="{{trans_choice('core.tournament',1). ": ".$tournament->name  }}"/>


    <meta name="description" content="{{trans_choice('core.tournament',1). ": ".$tournament->name  }}"/>
    <meta property="og:description" content="{{trans_choice('core.tournament',1). ": ".$tournament->name  }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="http://my.kendozone.com/images/banners/KZ-04.jpg"/>
    <meta property="og:image:secure_url" content="https://my.kendozone.com/images/banners/KZ-04.jpg"/>
    <meta property="fb:app_id" content="780774498699579"/>

    <meta name=" twitter:title" content="{{trans_choice('core.tournament',1). ": ".$tournament->name  }}"/>
    <meta name="twitter:image" content="https://my.kendozone.com/images/banners/KZ-04.jpg"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:description" content="{{trans_choice('core.tournament',1). ": ".$tournament->name  }}"/>

    <link rel="shortcut icon" href="{!! asset('/favicon_kz-01.png') !!}" />
    <link rel="apple-touch-icon" href="{!! asset('/favicon_kz-01.png') !!}" />

    <!-- Global stylesheets -->
    {!! Html::style('css/app.css')!!}
    {!! Html::style('css/pages/trees.css')!!}
    {!! Html::script('js/guest_app.js') !!}


</head>

<body>

<div align="right" {{ Route::currentRouteName() ==  'tournaments.show' ? "class=banner-switcher" : "" }}>
        @include('layouts.guest_headmenu')

</div>
<div class="header">
    {{ HTML::image('images/banners/KZ-04.jpg', "Kendozone Banner", ['class' => 'banner']) }}
</div>

@include('layouts.flash')

@yield('content')



{!! Html::script('js/analytics.js') !!}

@yield('scripts_footer')

</body>
</html>