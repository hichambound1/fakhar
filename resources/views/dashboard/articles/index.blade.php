@extends('includes.dash_layout')
@section('content')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (session('added'))
                        <div class="alert alert-success">
                            {{ session('added') }}
                            <span class="close" data-dismiss="alert">&times;</span>
                        </div>
                    @endif
                    @if (session('updated'))
                        <div class="alert alert-warning">
                            {{ session('updated') }}
                            <span class="close" data-dismiss="alert">&times;</span>
                        </div>
                    @endif
                    @if (session('deleted'))
                        <div class="alert alert-danger">
                            {{ session('deleted') }}
                            <span class="close" data-dismiss="alert">&times;</span>
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">articles</h4>
                            <p class="card-category"> cree ici votre articles</p>
                        </div>
                        <div class="my-3 card-body">
                            <a href="articles/create" class="btn btn-priary">ajouter articles</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                Name
                                            </th>

                                            <th>
                                                Categorie
                                            </th>
                                            <th>
                                                Prix
                                            </th>

                                            <th>
                                                quantite
                                            </th>

                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->name}}</td>

                                                    <td>  {{$item->category->name}}</td>
                                                    <td> {{$item->prix}}</td>


                                                    <td>{{$item->quantite}}</td>

                                                    <td>
                                                         <a href="{{ route('articles.edit',$item)}}">
                                                            <span class="material-icons text-warning">
                                                            border_color
                                                            </span>
                                                        </a>
                                                        <form action="{{ url('/articles/'.$item->id) }}"  method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button onclick="confirm('are u sure ?')" class="border-0 bg-transparent">
                                                                <span class="material-icons text-danger">
                                                                delete
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




@endsection
