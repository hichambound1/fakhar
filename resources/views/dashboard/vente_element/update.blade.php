@extends('includes.dash_layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">add vente_element</h4>
                    <p class="card-category">Complete your vente_element</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('ventes_elements.update',$element_v->id) }}"  method="post" >
                        @method('PUT')
                        @csrf
                        <div class="row">



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">articles</label>

                                     <select required class="form-control" name="article_id" >
                                       @foreach ($articles as $item)
                                            <option @if ($item->id==$element_v->article_id)
                                                selected
                                            @endif value="{{$item->id}}">{{$item->name}}</option>
                                       @endforeach
                                     </select>
                                     @error('article_id')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">ventes</label>

                                     <select required class="form-control" name="vente_id" >
                                       @foreach ($ventes as $item)
                                            <option  @if ($item->id==$element_v->vente_id)
                                                selected
                                            @endif value="{{$item->id}}">{{$item->id}}</option>
                                       @endforeach
                                     </select>
                                     @error('vente_id')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prix">prix</label>
                                    <input type="text" name="prix" value="{{ $element_v->prix}}" class="form-control">
                                    @error('prix')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="quantitie">quantitie</label>
                                    <input type="text" name="quantitie" value="{{ $element_v->quantitie}}" class="form-control">
                                    @error('quantitie')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">add vente_element</button>
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
