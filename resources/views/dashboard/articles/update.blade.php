@extends('includes.dash_layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">add article</h4>
                    <p class="card-category">Complete your article</p>
                </div>
                <div class="card-body">



                    <form action="{{ url('/articles/'.$article->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" name="name" value="{{ $article->name}}" class="form-control  @error('name')border-danger    @enderror">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">prix</label>
                                    <input type="number"  name="prix" class="form-control" value="{{ $article->prix}}"  @error('prix')border-danger    @enderror">
                                    @error('prix')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">quantite</label>
                                    <input type="text" value="{{ $article->quantite}}" name="quantite" class="form-control  @error('quantite')border-danger    @enderror">
                                    @error('quantite')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">categories</label>

                                     <select class="form-control" name="category" >
                                       @foreach ($categories as $item)
                                            <option @if ($item->id==$article->category_id)
                                                selected
                                            @endif value="{{$item->id}}">{{$item->name}}</option>
                                       @endforeach
                                     </select>
                                </div>

                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <input type="submit" value="submit" class="btn btn-primary pull-righ" name="submit">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
