<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books - Laravel Library App</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .title{
            text-align: center;
            font-size: 6rem;
            font-weight: 500;
        }
        .nav-link{
            color: #636b6f;
            text-decoration: underline;
        }
        .nav-item .disabled {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
        <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Genres</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Authors</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Publishers</a>
                </li>
        </ul>
    <div class='container'>
        <h1 class='title mt-4'>Books</h1>
        <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Author</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Genres</th>
                  </tr>
                </thead>
                    @foreach ($books as $book)
                        <tr>
                            <th scope="row">{{$book->title}}</th>
                            <td>{{$book->description}}</td>
                            <td>{{$book->release_date}}</td>
                            <td>{{$book->author->name}}</td>
                            <td>{{$book->publisher->name}}</td>
                            <td>
                                @foreach ($book->genres as $genre)
                                    <span class="badge badge-primary">{{$genre->name}}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>

    </div>
</body>
</html>