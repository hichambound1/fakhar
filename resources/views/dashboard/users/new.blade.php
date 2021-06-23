@extends('includes.dash_layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">add realisation</h4>
                    <p class="card-category">Complete your realisation</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('commend_user_create')}}" >
                        @csrf
                        <div class="row">
                            <input type="hidden" name="user_id" value="{{$id}}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">date commend</label>
                                    <input type="date" name="date_cmd" class="form-control">
                                    @error('date_cmd')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>






                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <input type="submit" value="submit" class="btn btn-primary pull-righ" name="submit">
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
