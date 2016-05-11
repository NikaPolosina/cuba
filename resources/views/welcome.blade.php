<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

@extends('layouts.app')

@section('content')
<div class="row">
        @if (Auth::guest())
                    <div class="col-md-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Войти</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                        {!! csrf_field() !!}
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="col-md-12 control-label register_right">E-Mail</label>
                                                <div class="col-md-12">
                                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label class="col-md-12 control-label register_right">Пароль</label>
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control" name="password">
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember"> Запомнить меня
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-btn fa-sign-in"></i>Вход
                                                    </button>
                                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Забыл пароль?</a>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                        </div>
                    </div>

                <div class="col-md-10">
            @endif
                    <div class="col-md-12">

                    <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <p style="display: inline-block"> Добро пожаловать!</p>

                                    <form method="POST" action="find" style="display: inline-block; float: right">
                                        {{ csrf_field() }}
                                        <input name="find" type="text" placeholder="Введите текст для поиска"/>
                                        <p style="display: inline-block"><input type="submit" value="Искать">
                                    </form>
                                </div>
                                <div class="panel-body">
                              {{--      <img style="width: 100%; height: 50%" src="/img/bg.jpg" alt="картинка">--}}


                                <?php
                                        if(isset($data)){
                                            //echo'Искомое слово - '.$search.'<br>';
                                            //echo 'Время выполнения - '.(time() - $time).'секунд. <br>';
                                            echo 'Найдено записей - '.count($data);
                                        ?>
                                        <div>
                                            <?php
                                                foreach ($data as $value) {?>
                                                <div class="col-md-2">
                                                    <div class="carentFindProduct" style="border: solid 1px grey; margin: 3px;">Искомая строка -{{$value->product_name}}</div>
                                                </div>

                                        </div>
                                            <?php }
                                            ?>
                                    <hr>
                                    <?php
                                    }else{
                                    ?>

                                    <div class="col-sm-10">

                                        <h3>Компании</h3>
                                        <?php foreach($companyAll as $valueCompanw){?>
                                        <div class="col-md-2 carentFindCompany">
                                            <div class="" style="border: solid 1px grey; margin: 3px;">
                                                <a class="">{{$valueCompanw->company_name}}</a>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>



                                    <div class="col-sm-10">
                                        <hr>
                                        <h3>Товары</h3>

                                                <?php foreach($productAll as $v){?>
                                                    <div class="col-md-2 carentFindProduct">
                                                        <div class="" style="border: solid 1px grey; margin: 3px;">
                                                            <a href="/single-product/{{$v->id}}">{{$v->product_name}}</a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                    </div>


                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
</div>

    <script>

    </script>
@endsection


        <style>

            .register_right{
                padding-top: 0px!important;
                text-align: left!important;
            }
            a:hover {
                text-decoration: none!important; /* Отменяем подчеркивание у ссылки */
            }
        </style>