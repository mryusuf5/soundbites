<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://bootswatch.com/5/{{$selectedTheme->name}}/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e0462e4fee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">Fakir</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('addCategory')}}">Nieuwe categorie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('addSound')}}">Voeg geluiden toe</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-2 text-white">
                    <label>Thema:</label>
                    <form action="{{route('changeTheme')}}" method="post">
                        @csrf
                        @method('POST')
                        <select name="theme" id="" class="form-control" onchange="this.form.submit()">
                            @foreach($themes as $theme)
                            <option value="{{$theme->id}}" @if($theme->selected) selected @endif>{{$theme->name}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @if($message = Session::get('success'))
        <div class="d-flex justify-content-center">
            <div class="my-2 border-success p-4 w-50" style="border: 1px solid">
                <h5>{{$message}}</h5>
            </div>
        </div>
    @endif
    {{$slot}}
</body>
</html>
