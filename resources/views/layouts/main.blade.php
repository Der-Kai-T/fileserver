<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=yes">
    <title>Lärmkontrolle</title>

    <!-- Bootstrap -->
    <link href="{{ asset("storage/assets/vendor/bootstrap-5.3.3-dist/css/bootstrap.min.css") }}" rel="stylesheet">
    <script src="{{ asset("storage/assets/vendor/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js") }}"></script>

    <!-- jQuery -->
    <script src="{{ asset("storage/assets/vendor/jquery/js/jquery-3.7.1.min.js") }}"></script>

    <!-- FontAwesome -->
    <link href="{{ asset("storage/assets/vendor/fontawesome-free-6.5.2-web/css/all.css") }}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ asset("storage/assets/vendor/DataTables/datatables.min.css") }}" rel="stylesheet">
    <script src="{{ asset("storage/assets/vendor/DataTables/datatables.min.js") }}"></script>

    <!-- custom styles -->
    @vite("resources/css/custom.css")


</head>
<body>

<div class="container-fluid">
    <x-page.navbar/>
    <h1>@yield("title")</h1>

    <x-results />

    @yield("content")

</div>

<!-- custom js -->
@vite("resources/js/custom.js")

</body>
</html>
