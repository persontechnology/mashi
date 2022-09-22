<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ public_path('ui/assets/css/style.css') }}">
</head>
<body>
    <div class="d-flex align-items-center mb-2 py-2">
        <div class="avatar me-2">
          <img class="avatar-img" src="{{ public_path('img/logo/icono.png') }}" alt="">
        </div>
        <div>
            <h3 class="card-title mb-0"> {{ config('app.name','') }}</h3>
            <h6 class="mb-0 small">{{ config('app.alias') }}</h6>
        </div>
    </div>
</body>
</html>