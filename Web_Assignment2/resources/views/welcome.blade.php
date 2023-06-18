
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    @extends('header')
    
    <title>Form laravel</title>
    
</head>
<body>
    
    <section>
    <form id="form" method="post" action="{{ route('persons.store') }}" enctype="multipart/form-data" >
        @csrf
        <div class="container1">
            <h1>{{ __('msg.Registration Form') }} <i class='fas fa-user-alt'></i><br></h1>
            <div class="left">
               
                <br>
                <label for="fullName"> {{ __('msg.Full Name') }} </label>
                <span id="nameerror"></span><br>
                <input id="fullName" type="text" name="fullName" placeholder="Firstname Lastname" maxlength="45"><br><br>

                <label for="username"> {{ __('msg.User Name') }}</label>
                <span id="unameerror"></span><br>
                <input id="username" type="text" name="username" placeholder="user name"><br><br>

                <div class="form-group">
                <label for="birthDate"> {{ __('msg.Birth date') }}</label>
                <span id="dateerror"></span><br>
                <input id="birthDate" type="date" name="birthDate" min="1930-01-01" max="2015-01-01"><br><br>

                <button type="button" id="get-actors-button">{{ __('msg.Get Actors') }}</button>
                </div>
                <div id="container"> </div>

                <label for="phone"> {{ __('msg.Phone number') }}</label>
                <span id="phoneerror"></span><br>
                <input id="phone" type="tel" name="phone" maxlength="11" placeholder="Phone Number"><br><br>

                <label for="address">  {{ __('msg.Address') }}</label>
                <span id="adderror"></span><br>
                <input id="address" type="text" name="address" placeholder="*******"><br><br>

            </div>
            <div class="right">

                <label for="password"> {{ __('msg.Password') }}</label>
                <span id="passerror"></span><br>
                <input id="password" type="password" name="password" placeholder="*******">
                <i class="far fa-eye" id="togglePassword" 
                 style="margin-left: -30px; cursor: pointer;"></i><br><br>

                <label for="confirmPassword">  {{ __('msg.Confirm Password') }}</label>
                <span id="cpasserror"></span><br>
                <input id="confirmPassword" type="password" name="confirmPassword" placeholder="*******"><br><br>

                <label for="image"> {{ __('msg.User image') }}</label>
                <span id="imgerror"></span><br>
                <input type="file" id="image" name="image" accept="image/*" id="img"><br><br>
                
                <label for="email"> {{ __('msg.Email') }}</label>
                <span id="emailerror"></span><br>
                <input id="email" type="email" name="email" placeholder="####@gmail.com"><br><br>

                <input class="Register" type="submit" value={{ __('msg.Register') }} name="Register">
                <input class="reset" type="reset" value={{ __('msg.Reset') }} name="reset" onclick="clearerrors()">
               
            </div>
            </div>
        </form>
    </section>

    @if(session('success'))
    <script>
    @if (session('success'))
        alert("{{ session('success') }}"); 
        //alert("{{ __('validationmsg.' . session('success')) }}");
        //alert("@lang('validationmsg.' . session('success'))");

    @endif
    </script>
    @endif

   <script>
        const validationMessages = @json(__('validationmsg'));
  </script>


    @extends('footer')
    <script src="{{ asset('js/actor_request.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>