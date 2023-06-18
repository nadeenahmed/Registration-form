<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <title>Header</title>

</head>
<body>
    <header>
        <p class="name"></i></p>
        <nav class="navigation_bar">
        <i class="fa fa-home" id="home">{{ __('msg.Home') }}</i>
        <i class="fa fa-search" id="search"></i>
            <a href="#"> {{ __('msg.Sign in') }} </a>
            <a href="#"> {{ __('msg.Sign up') }} </a>
            <select id = "myList" onchange = "change()" >  
            <option> {{ __('msg.Language') }} </option>  
            <option> {{ __('msg.English') }} </option>  
            <option> {{ __('msg.Arabic') }} </option>
            </select>  
        </nav>
    </header>
    <script src="{{ asset('js/lang.js') }}"></script>
</body>
</html>