@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('inc.messages')
                    <button 
                    class="bt btn-primary btn-lg" 
                    data-toggle="modal" 
                    data-target="#addModal" 
                    type="button">Add Bookmark</button>
                    <hr>
                    <h3>My bookmarks</h3>
              <ul class="list-group">
                  @foreach($bookmarks as $bookmark)
                      <li class="list-group-item clear-fix">
                            <a href="{{$bookmark->url}}" target="_blank" style="position:absolute;top:30%">{{$bookmark->name}} <span class="label label-default">{{$bookmark->description}}</span> </a>
                                <span class="float-right button-group">
                                <button data-id="{{$bookmark->id}}" type="button" name="button" class="delete-bookmark btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Delete</button>
                                </span>
                        </li>
                  @endforeach
              </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Bookmark</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
             
              
            </div>
            <div class="modal-body">
                <form action="{{ route('bookmarks.store') }}" method="post">
                {{csrf_field()}}
                    <div class="form-group">
                        <label>Bookmark name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Bookmark URL</label>
                        <input type="text" class="form-control" name="url">
                    </div>
                    <div class="form-group">
                        <label>Website description</label>
                        <textarea name="description"class="form-control"></textarea>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                        
                </form>
            </div>
          </div>
        </div>
      </div>
@endsection
