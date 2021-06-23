@extends('includes.dash_layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">add commend_element</h4>
                    <p class="card-category">Complete your commend_element</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('commends_elements.update',$element_v->id) }}"  method="post" >
                        @method('PUT')
                        @csrf
                        <div class="row">



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">articles</label>
<input type="hidden" name="commend_id" value="{{ $element_v->commend->id}}">
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
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">commends</label>

                                     <select required class="form-control" name="commend_id" >
                                       @foreach ($commends as $item)
                                            <option  @if ($item->id==$element_v->commend_id)
                                                selected
                                            @endif value="{{$item->id}}">{{$item->id}}</option>
                                       @endforeach
                                     </select>
                                     @error('commend_id')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>

                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prix">prix</label>
                                    <input type="number" name="prix" value="{{ $element_v->prix}}" class="form-control">
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
                                    <button type="submit" class="btn btn-primary pull-right">add commend_element</button>
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
