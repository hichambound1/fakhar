@extends('includes.dash_layout')
@section('content')




    <div class="">

        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-3 my-auto">
                        <div class="card m-auto">
                            <p class="text-center my-auto font-weight-bold p-2 text-capitalize">
                                Number du  commendes
                                <span class="d-block mt-1">{{ $cmd->count()}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 my-auto">
                        <div class="card m-auto">
                            <p class="text-center my-auto font-weight-bold p-2 text-capitalize">
                                number du articles
                                <span class="d-block mt-1">{{ $articles->count()}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 my-auto">
                        <div class="card m-auto">
                            <p class="text-center my-auto font-weight-bold p-2 text-capitalize">
                                users
                                <span class="d-block mt-1">{{ $users->count()}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 my-auto">
                        <div class="card m-auto">
                            <p class="text-center my-auto font-weight-bold p-2 text-capitalize">
                                number du categories
                                <span class="d-block mt-1">{{ $categories->count()}}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-4">
                            <p class="text-capitalize font-weight-bold">montant total : <span class="font-weight-light float-right">
                            {{$total_cmd}}
                            </span></p>
                            <p class="text-capitalize font-weight-bold">montant 25% : <span class="font-weight-light float-right">
                            {{$total_cmd * 0.25}}
                            </span></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-4">
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th>name</th>
                                       <th>action</th>
                                       <th>montant</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   {{$users->SUM('action')}}
                                   @foreach ($users as $item)

                                   <tr>
                                       <td scope="row">{{$item->name}}</td>
                                       <td> {{$item->action}}  </td>
                                       <td>{{(($total_cmd * 0.25)/$users->SUM('action'))*$item->action}}</td>
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
