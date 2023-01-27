<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gogetit eNaira Data Agents Portal is a platrofm to promote Nigeria's enaira intiative of the Central Bank of Nigeria">
    <meta name="keywords" content="GEDA, Data Agents, CBN, e-naira, enaira, eNaira, Nigeria, currency, naira, e-cash, cash, central bank, Central Bank of Nigeria, Digital economy, commerce, bitcoin, crypto">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
     <title>Gogetit eNaira Data Agents Portal - @yield('title')</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    
    @include('layouts.authentication.css')
    @yield('style') 
  </head>
  <body>
    <!-- login page start-->
    @yield('content')  
    <!-- latest jquery-->
    @include('layouts.authentication.script') 
  </body>
</html>