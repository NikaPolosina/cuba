@extends('...layouts.app')

@section('content')
    @include('layouts.header_menu')

    <?php


       if(file_exists(public_path().'/img/custom/companies/'. $company->company_logo) && !empty($company->company_logo)){
          $img = '/img/custom/companies/'. $company->company_logo;
       }else{
           $img = '/img/custom/files/thumbnail/plase.jpg';
       }

?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Logo</th><th>Название магазина</th><th>Краткое описание</th><th>Детальное описание</th><th>Адрес</th><th>Контактная информация</th><th>Дополнительная информация</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <img class="img-thumbnail" style="display: block; width: 100px;" src="<?=$img?>"> </td><td> {{ $company->company_name }} </td><td> {{ $company->company_description }} </td>
                    <td> {!! $company->company_content !!} </td> <td> {{ $company->company_address }} </td> <td> {{ $company->company_contact_info }} </td> <td> {!! $company->company_additional_info !!} </td>
                </tr>
            </tbody>
        </table>
    </div>


{{-- @if(count($company->getProducts))--}}
<div class="row">
        <div class="col-sm-12 ">

            <h1>Все продукты магазина</h1>

            @foreach ($company->getProducts as $item)
                <?php

                $directory = public_path().'/img/custom/companies/'. $company['id'].'/products/'.$item['id'];
                $directoryMy = '/img/custom/companies/'.$company['id'].'/products/'.$item['id'].'/';

                if(is_dir($directory)){
                    $files = scandir ($directory);
                    $img = $directoryMy . $files[2];// because [0] = "." [1] = ".."

                }else{


                    $img = '/img/custom/files/thumbnail/plase.jpg';

                }
                ?>

                <div class="col-md-3 img-thumbnail carentFindProduct" style="font-size: 20px; text-align: center; margin: 3px; min-height: 230px;">
                            <div class="img-thumbnail" style="margin: 3px; ">
                                <p class="show-product" style="margin: 20px;">{{$item->product_name}}</p>
                                <input class="input_id_product" value="{{$item->id}}" type="hidden"/>
                            </div>
                            <div class="col-sm-6" {{--style="width: 100px; height: 200px"--}}>
                                <?php if(isset($img)){?>
                                <img class="img-thumbnail show-product" style="display: block; width: 100%;" src="<?=$img?>">
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-size: 14px;">{{$item->content}}</p>
                            </div>


                </div>



            @endforeach

            </div>
        </div>




{!! HTML::script('/js/show.blade.js') !!}
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
    @endif
@endsection

