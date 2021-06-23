@extends('includes.dash_layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">add commend</h4>
                    <p class="card-category">Complete your commend</p>
                </div>
                <div class="card-body">
                    <form action="{{ url('/commends/'.$commend->id) }}" enctype="multipart/form-data" method="post" >
                        @method('PUT')
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">date commend</label>
                                    <input type="date" value="{{$commend->date_cmd}}" name="date_cmd" class="form-control">
                                    @error('date_cmd')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select class="form-control" name="user_id" id="user">
                                        @foreach ($users as $item)
                                            <option @if ($item->id==$commend->user_id) selected   @endif
                                                value="{{$item->id}}">     {{$item->name}}
                                            </option>
                                        @endforeach
                                    </select>
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
