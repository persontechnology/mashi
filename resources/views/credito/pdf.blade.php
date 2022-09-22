<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ 'CREDITO-'.$credito->numero.'.pdf' }}</title>
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ public_path('ui/assets/css/style.css') }}">
</head>
<body>
    @include('credito.tabla-pdf',['credito'=>$credito])
    
</body>
</html>