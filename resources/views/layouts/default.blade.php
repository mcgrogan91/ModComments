<!doctype html>
<html>
    <head>
        @include('shared.head')
        @yield('css')
        <style>
            body {
                padding-top:50px;
            }
        </style>
    </head>
<body>

    @include('shared.header')

    <div class="container">

        @yield('content')

    </div>


    <footer>
        <div class="text-right">2015 Kyle McGrogan</div>
    </footer>
<script type="application/javascript" src ="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="application/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@yield('javascript')
</body>
</html>