<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Glowing Inputs Login Form UI</title>
      <link rel="stylesheet" href="{{ asset('css/loginstyle.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    </head>
   <body>

      <div class="login-form">
            <i style="color:white;margin-bottom:10px">Inventory Management System</i>
         <div class="text" style="margin-top: 10px;">
            LOGIN
         </div>
         <div class="bg-info">
            <x-jet-validation-errors class="mb-4" style="color: red;" />
         </div>

         @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
         <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="field">
               <div class="fas fa-envelope"></div>
               <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Enter Email" required>
            </div>
            <div class="field">
               <div class="fas fa-lock"></div>
               <input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Enter Password" required autocomplete="current-password">
            </div>
            <button> {{ __('Login') }}</button>
         </form>
      </div>
   </body>
</html><div class="open_grepper_editor" title="Edit & Save To Grepper"></div>
