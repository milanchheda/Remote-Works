<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>{{ env('SITE_TITLE') }}</title>
    <meta name="description" content="{{ env('SITE_DESC') }}" />

    <meta property="og:title" content="{{ env('SITE_TITLE') }}">
    <meta property="og:description" content="{{ env('SITE_DESC') }}">
    <meta property="og:url" content="https://remoteworks.app/">

    <link rel="shortcut icon" href="{{ asset('images/transparent_rw_logo.png') }}">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
</head>
