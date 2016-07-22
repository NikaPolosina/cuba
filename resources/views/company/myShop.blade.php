@extends('...layouts.app')

@section('content')

    @include('layouts.header_menu')
    <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />

    <div class="row">
        <div class="col-md-10 col-sm-offset-1">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Список Моих Магазинов</span>
                    </div>

                </div>
                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Имя </th>
                                <th> Описание </th>
                                <th> Арес </th>
                                <th> Заказ </th>
                            </tr>
                        </thead>
                        <tbody>
                        {{-- */$x=0;/* --}}
                        @foreach($companys as $item)
                            {{-- */$x++;/* --}}
                            <tr class="odd gradeX">
                                <td> {{ $x }} </td>
                                <td><a href="/show-company/{{$item->id}}"> {{$item->company_name}}</a></td>
                                <td> {{$item->company_description}} </td>
                                <td> {{$item->street}} {{$item->address}}</td>
                                <td>
                                     <span class="badge">4</span>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <style>
        .badge{
            background-color: red
        }

    </style>

@endsection
