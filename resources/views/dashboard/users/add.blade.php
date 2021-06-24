@extends('includes.dash_layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">add user</h4>
                    <p class="card-category">Complete your user</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store')}}">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" name="name" value="{{ old('name')}}" class="form-control @error('name')border-danger    @enderror">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">prenom</label>
                                    <input type="text" name="prenom" value="{{ old('prenom')}}" class="form-control @error('prenom')border-danger    @enderror">
                                    @error('prenom')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">cin</label>
                                    <input type="text" name="cin" value="{{ old('cin')}}" class="form-control @error('cin')border-danger    @enderror">
                                    @error('cin')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">tel</label>
                                    <input type="text" name="tel" value="{{ old('tel')}}" class="form-control @error('tel')border-danger    @enderror">
                                    @error('tel')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">action</label>
                                    <input type="number" name="action" value="{{ old('action')}}" class="form-control @error('action')border-danger    @enderror">
                                    @error('action')
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
                                        <option value="passager">passager</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" name="email" value="{{ old('email')}}" class="form-control @error('email')border-danger    @enderror">
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="password" class="bmd-label-floating">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password-confirm" class="bmd-label-floating">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary my-3">
                                    {{ __('Register') }}
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
