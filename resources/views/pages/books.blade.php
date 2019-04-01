@extends('layouts.app')

@section('content')

@include('includes.nav')

<div class='container'>
<h1 class='title mt-4'>Books</h1>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Update Book Details</h5>
    <form id='deleteBookForm' method="POST" action="/book/">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <div class="form-group">
          <input type="submit" class="btn btn-danger delete-book mx-3" value="Delete Book">
      </div>
    </form>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form class='' id='updateBookForm' method='POST' action='/books'>
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class='row'>
        <div class="form-group col-md-6 col-sm-12">
          <label for="bookTitle">Title</label>
          <input type="text" class="form-control" id='updateTitle' name='updateTitle' id="bookTitle" placeholder="Enter Book Title">
        </div>
        <div class="form-group col-md-6 col-sm-12">
          <label for="bookReleaseDate">Release Date</label>
          <input type="date" class="form-control" id='updateReleaseDate' name='updateReleaseDate' id="bookReleaseDate" placeholder="Pick a release date">
        </div>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" class="form-control" id='updateDescription' name='updateDescription' placeholder="Enter Book Description"></textarea>
      </div>
      <div class='row'>
        <div class="form-group col-md-6 col-sm-12">
            <label for="bookAuthor">Author</label>
            <select class="form-control" name='updateAuthor' id='updateAuthor'>
                @foreach ($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6 col-sm-12">
          <label for="bookPublisher">Publisher</label>
          <select class="form-control" name='updatePublisher' id="updatePublisher">
              @foreach ($publishers as $publisher)
                  <option value="{{$publisher->id}}">{{$publisher->name}}</option>
              @endforeach
          </select>
        </div>
      </div>   
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save changes</button>
    </form>             
  </div>
</div>
</div>
</div>

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
        <tr data-id='{{$book->id}}' class='book'>
            <th scope="row" class='btn btn-outline-secondary bookTitle' title='{{$book->title}}' data-toggle="modal" data-target="#updateModal">{{$book->title}}</th>
            <td class='bookDescription'>{{$book->description}}</td>
            <td class='bookReleaseDate'>{{$book->release_date}}</td>
            <td class='bookAuthor'>{{$book->author->name}}</td>
            <td class='bookPublisher'>{{$book->publisher->name}}</td>
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
@endsection
    
