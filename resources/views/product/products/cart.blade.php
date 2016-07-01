@extends('layouts.app')
    @section('content')
    @include('layouts.header_menu')
    <div class="row">

        @if(!$product == '' )

        @forelse($product as $val)
            <div class="col-sm-9 col-sm-offset-1 product_item_cart">

                <div class="col-sm-3">
                    <div style="max-width: 100%;">
                        <img class="img_product img-thumbnail" src="{{$val['firstFile']}}" alt=""/>
                    </div>
                </div>

                <div class="col-sm-9">
                    <table class="table_product" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td width="35%"><span class="option_table">Товар:</span></td>
                            <td width="65%" valign="top"><p class="name" style=" font-size: 20px;">{{$val['product_name']}}</p></td>
                        </tr>
                        <tr>
                            <td width="35%"><span class="option_table">Краткое описание:</span></td>
                            <td width="65%" valign="top"><p style="font-size: 20px;" class="product_description"> {{$val['product_description']}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%"><span class="option_table">Количество:</span></td>
                            <td width="65%" valign="top">

                                {{-------------------------------Количество товара----------------------------------}}
                                    <div class="my_b">
                                        <div class="input-group number-spinner">
                                            <span class="input-group-btn data-dwn">
                                                <button class="btn btn-default btn-info left_b" data-dir="dwn">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>

                                            <input type="text" class="form-control text-center my_b" value="1" min="1" max="40" readonly>

                                            <span class="input-group-btn data-up">
                                                <button class="btn btn-default btn-info right_b" data-dir="up">
                                                    <span style="width: 2px;" class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="">
                                        <p>В наличии: 40 шт.</p>
                                    </div>
                                {{-----------------------------------------------------------------------------------}}

                            </td>
                        </tr>
                        <tr>
                            <td width="35%" valign="top"><span class="option_table">Цена:</span></td>
                            <td width="65%" valign="top"><div class="product_price yelloy"><span class="product_price_one" style=""> {{$val['product_price']}}</span> <span>руб.</span></div></td>
                        </tr>
                        <tr>
                            <td width="35%" valign="top"><span class="option_table">Общяя стомость:</span></td>
                            <td width="65%" valign="top"><div class="product_price yelloy_big"><span class="all_product_price" style=""> {{$val['product_price']}} </span><span>руб.</span></div></td>
                        </tr>
                    </table>
                    <hr/>
                    <div class="buttom_menu">
                        <input style="display: none" value="{{$val['id']}}" type="text"/>
                        <button type="button" class="btn btn-default button_delete">Удалить</button>
                        <button type="button" class="btn btn-warning">Оплатить товар</button>
                    </div>
                </div>

            </div>

            @endforeach
            @else
                <div class="col-sm-9 col-sm-offset-1 product_item_cart">
                    <h1>Ваша корзина пуста. Вернитесь к сайту что бы добавить товары в корзину.</h1>
                </div>
            @endif
    </div>


    <script>

        $('.button_delete').on('click', function(){
            var id = $(this).siblings('input').val();
            var currentBlock = $(this).parents('.product_item_cart').eq(0);


            $.ajax({
                type: "POST",
                url: "/cart/destroy-product",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id
                },
                success: function(msg){
                    $('.cart_count').text(msg.product_cnt);
                    currentBlock.remove();
                }
            });
            
            
        });

            



        $(function () {
            var action;
            $(".number-spinner button").mousedown(function () {
                btn = $(this);
                input = btn.closest('.number-spinner').find('input');
                btn.closest('.number-spinner').find('button').prop("disabled", false);
                var price = $(this).parents('.product_item_cart').find('span.product_price_one').text();
                var price_all = $(this).parents('.product_item_cart').find('span.all_product_price');

                if (btn.attr('data-dir') == 'up') {

                    action = setInterval(function () {
                        if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
                            input.val(parseInt(input.val()) + 1);
                            price_all.text(parseInt(parseInt(input.val()) * price));
                        } else {
                            btn.prop("disabled", true);
                            clearInterval(action);
                        }
                    }, 60);



                    
                } else {
                    action = setInterval(function () {
                        if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
                            input.val(parseInt(input.val()) - 1);
                            price_all.text(parseInt(parseInt(input.val()) * price));
                        } else {
                            btn.prop("disabled", true);
                            clearInterval(action);
                        }
                    }, 50);
                }
            }).mouseup(function () {
                clearInterval(action);
            });
        });
    </script>

    <style>
        /*----------------Стили блока с выбром количества товара-----------------*/
        .buttom_menu{
            float: right;
        }

        .left_b {
            padding: 0 10px 0 0px;
            width: 20px;
            height: 20px;
        }
        .right_b{
            padding: 0 10px 0 0px;
            width: 20px;
            height: 20px;
        }
        .my_b{
            width: 120px;
            height: 20px;
        }
        @media ( max-width: 585px ) {
            .input-group span.input-group-btn, .input-group input, .input-group button {
                display: block;
                width: 100%;
                border-radius: 0;
                margin: 0;
            }

            .input-group {
                position: relative;
            }

            .input-group span.data-up {
                position: absolute;
                top: 0;
            }

            .input-group span.data-dwn {
                position: absolute;
                bottom: 0;
            }

            .form-control.text-center {
                margin: 34px 0;
            }

            .input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group {
                margin-left: 0;
            }

        }

        /*---------------------------------*/
        body {
            background: white;
        }

        .product_item_cart {
            margin-bottom: 20px;
            padding: 15px 20px 30px;
            border: 3px solid #eee;;
        }

        .product_price {

            border-radius: 4px;
            display: inline-block;
            padding: 7px 7px 5px;
            vertical-align: middle;
            margin-bottom: 5px;
            white-space: nowrap;
            border: 1px solid transparent;
            font-size: 20px;

        }
        .yelloy{
            background: #fff3b5;
        }
        .yelloy_big{
            background: #ffb144;
        }

        .option_table {
            font-size: 20px;
            font-weight: bolder;
        }

    </style>

@endsection