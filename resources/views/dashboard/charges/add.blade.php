@extends('includes.dash_layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">add charge</h4>
                    <p class="card-category">Complete your charge</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('charges.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">name</label>
                                    <input type="text" name="name" value="{{ old('name')}}" class="form-control @error('name')border-danger    @enderror">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">description</label>
                                    <input type="text" name="description" value="{{ old('description')}}" class="form-control @error('description')border-danger    @enderror">
                                    @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">prix</label>
                                    <input type="number" name="prix" value="{{ old('prix')}}" class="form-control @error('prix')border-danger    @enderror">
                                    @error('prix')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">add charge</button>
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
