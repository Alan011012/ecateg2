<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Alvarás')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>

    <script>
        $(document).ready(function(){
            // Aplica a máscara nas datas
            $('input[name="data_emissao"], input[name="data_validade"]').mask('00/00/0000');
        });
    </script>
</body>
</html>
