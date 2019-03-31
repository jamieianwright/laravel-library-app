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

      <button class="btn btn-primary" id='addbtn' type="button" data-toggle="collapse" data-target="#addBookForm" aria-expanded="false" aria-controls="collapse">Add New Book</button>

      <div class='my-4'>
        <form class='collapse' id='addBookForm' method='POST' action='/books'>
          {{ csrf_field() }}
          <div class='row'>
              <div class="form-group col-md-6 col-sm-12">
                  <label for="bookTitle">Title</label>
                  <input type="text" class="form-control" name='bookTitle' id="bookTitle" placeholder="Enter Book Title">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                  <label for="bookReleaseDate">Release Date</label>
                  <input type="date" class="form-control" name='bookReleaseDate' id="bookReleaseDate" placeholder="Pick a release date">
                </div>
          </div>
          
          <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" name='bookDescription' id="bookDescription" placeholder="Enter Book Description"></textarea>
          </div>
          <div class='row'>
              <div class="form-group col-md-6 col-sm-12">
                  <label for="bookAuthor">Author</label>
                  <select class="form-control" name='bookAuthor' id="bookAuthor">
                    <option value="" disabled selected hidden>Pick an Author</option>
                      @foreach ($authors as $author)
                          <option value="{{$author->id}}">{{$author->name}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group col-md-6 col-sm-12">
                <label for="bookPublisher">Publisher</label>
                <select class="form-control" name='bookPublisher' id="bookPublisher">
                  <option value="" disabled selected hidden>Pick an Publisher</option>
                    @foreach ($publishers as $publisher)
                        <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                    @endforeach
                </select>
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      
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
        <tbody>
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
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#addbtn").click(function(){
          $(this).text(function(i, text){
              return text === "Add New Book" ? "Close" : "Add New Book";
          })
        });
    });
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>