<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ mix('favicon.png') }}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/menu.css') }}"> -->
     <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" lang="scss" scoped>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>CoffeeSign</title>
</head>
<body>
    
    <div id="app">
        <app></app>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ mix('js/main.js') }}"></script>
    
    <!-- <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/simcify.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/pdf.worker.js') }}"></script>
    <script src="{{ asset('js/jcanvas.min.js') }}"></script>
    <script src="{{ asset('js/editor.min.js') }}"></script>
    <script src="{{ asset('js/pdf.js') }}"></script>
    <script src="{{ asset('js/pdf.js') }}"></script>
    <script src="{{ asset('js/signer.js') }}"></script> -->
     <!-- <script src="{{ asset('js/render.js') }}"></script> -->
    <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="az2dp400kxf81n9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://js.live.net/v7.0/OneDrive.js" id="onedrive-js"></script>
    <script type="text/javascript" src="https://apis.google.com/js/api.js"></script>
    <script type="text/javascript" src="https://app.box.com/js/static/select.js"></script>
</body>
</html>