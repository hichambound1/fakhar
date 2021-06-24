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
                            {{$total_cmd_with_passager}}
                            </span></p>

                            <p class="text-capitalize font-weight-bold">total Net (sans les charges) : <span class="font-weight-light float-right">
                            {{ $total_cmd_with_passager-$total_charges}}
                            </span></p>
                            <p class="text-capitalize font-weight-bold">total charges : <span class="font-weight-light float-right">
                                {{$total_charges}}
                            </span></p>
                            <p class="text-capitalize font-weight-bold">montant 25% : <span class="font-weight-light float-right">
                            {{($total_cmd_with_passager-$total_charges) * 0.25}}
                            </span></p>
                            <p class="text-capitalize font-weight-bold">montant 75% : <span class="font-weight-light float-right">
                                @php

                                $montant75= ($total_cmd_with_passager-$total_charges)-(($total_cmd_with_passager-$total_charges) * 0.25)

                                @endphp
                                {{$montant75}}
                            </span></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-4">
                            <h3 class="font-weight-bold text-capitalize"> les montant des mombers avent le calcul de action</h3>
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th>name</th>
                                       <th>action</th>
                                       <th>montant</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   {{$user_passager->SUM('action')}}
                                   @foreach ($users as $item)
                                   @if ($item->role !== 'passager')
                                   <tr>
                                       <td scope="row">{{$item->name}}</td>
                                       <td> {{$item->action}}  </td>
                                       <td>{{ ((($total_cmd_with_passager-$total_charges) * 0.25) /$user_passager->SUM('action') )*$item->action}}</td>
                                    </tr>
                                    @endif
                                   @endforeach

                               </tbody>
                           </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-4">
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th>name</th>
                                       <th>prix</th>

                                   </tr>
                               </thead>
                               <tbody>

                                   @foreach ($charges as $item)

                                   <tr>
                                       <td scope="row">{{$item->name}}</td>
                                       <td> {{$item->prix}}  </td>

                                   @endforeach

                               </tbody>
                           </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-4">
                            <h3 class="font-weight-bold text-capitalize"> </h3>
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th>name</th>

                                       <th>montant</th>
                                       <th>%</th>
                                       <th>montant final</th>
                                   </tr>
                               </thead>
                               <tbody>

                                @foreach ($users as $user)
                                        @php
                                            $total_cmd_of_user= 0;
                                        @endphp
                                @if ($user->role !== 'passager')
                                <tr>
                                    <td scope="row">{{$user->name}}</td>

                                    @foreach ($user->commends as $commend )
                                        @foreach ($commend->commend_elements as $element)
                                            @if ($element->commend->user_id===$user->id )
                                            @php

                                            $total_cmd_of_user += (int)$element->prix
                                            @endphp

                                            @endif

                                        @endforeach
                                    @endforeach
                                    <td> {{$total_cmd_of_user}}  </td>


                                    <td>{{ round(($total_cmd_of_user*100)/$total_cmd_with_passager,2)}} %</td>
                                    <td>{{  $total_cmd_of_user+(($montant75*(($total_cmd_of_user*100)/$total_cmd_with_passager))/100) }}</td>
                                 </tr>
                                 @endif
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
