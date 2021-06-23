@extends('includes.dash_layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">edit user</h4>
                    <p class="card-category">Complete your user</p>
                </div>
                <div class="card-body">
                    <form action="{{ url('/users/'.$user->id) }}" method="post" >
                        @method('PUT')
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name')border-danger    @enderror">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">prenom</label>
                                    <input type="text" name="prenom" value="{{ $user->prenom}}" class="form-control @error('prenom')border-danger    @enderror">
                                    @error('prenom')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">cin</label>
                                    <input type="text" name="cin" value="{{ $user->cin}}" class="form-control @error('cin')border-danger    @enderror">
                                    @error('cin')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">tel</label>
                                    <input type="text" name="tel" value="{{ $user->tel}}" class="form-control @error('tel')border-danger    @enderror">
                                    @error('tel')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating" for="role">role</label>
                                    <select name="role" class="form-control" id="role">
                                        <option value="admin">admin</option>
                                        <option value="user">user</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">action</label>
                                    <input type="number" name="action" value="{{ $user->action}}" class="form-control @error('action')border-danger    @enderror">
                                    @error('action')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" name="email" value="{{ $user->email}}" class="form-control @error('email')border-danger    @enderror">
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary my-3">
                                   update
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
