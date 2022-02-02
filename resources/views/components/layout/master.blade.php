<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shaaj Plastic</title>

<!--------- Bootstrap link  ------------>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!--------- Bootstrap link  ------------>

<!------------ css link ------------>
<link rel="stylesheet" href="{{asset('frontend/css/index.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
<!------------ css link ------------>

<!-- ----ashley font------>
<link href="//db.onlinewebfonts.com/c/013e904f64d24e4b4e5f8db7bb96d9b9?family=Ashley+Inline" rel="stylesheet" type="text/css"/>
<!------ashley font---- -->

<!--------- google fonts --------->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<!--------- google fonts --------->




<!--------- font Awesome link  ------------>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<!--------- font Awesome link  ------------>
@livewireStyles


<!-- alpine js -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@stack('css')
</head>
<body>
{{$slot}}



<!---- Bootstrap4 jquery proper and link start-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<!--Bootstrap4 jquery proper and link start -->

<script src="{{asset('frontend/js/index.js')}}"></script>
@livewireScripts

<!-- sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
    livewire.on('alert', $event =>{


      Toast.fire({
        position: 'bottom-end',
        icon: $event.icon,
        title: $event.title,
        showConfirmButton: false,
        timer: 1500
    })
    })

</script>
@stack('scripts')
</body>
</html>
