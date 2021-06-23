@extends('includes.dash_layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit categorie</h4>
                    <p class="card-category">Complete your categorie</p>
                </div>
                <div class="card-body">
                    <form action="{{ url('/categories/'.$category->id) }}" enctype="multipart/form-data" method="post" >
                        @method('PUT')
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">name</label>
                                    <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name')border-danger    @enderror">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>




                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">Update categorie</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        @endsection
