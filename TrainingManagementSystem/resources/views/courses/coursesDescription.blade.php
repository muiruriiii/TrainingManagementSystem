{{--@include('templates.header')--}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Course Description</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="{{asset("css/style.css")}}">
</head>

<body>

<h3 id="heading"> Course Description</h3>
    <div style="width: 500px;" class="descContainer text-center">
        {{$courses->courseDescription}}
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aut blanditiis distinctio dolorem doloremque ea eius, eligendi harum inventore itaque magnam minus molestias non odio officiis rem velit veritatis voluptatem?
        <p>For further details...</p>
        <button><a href="{{url ('/paypalPayment/'.$courses->id)}}"> Make Payment</a></button>

    </div>



</body>
</html>
