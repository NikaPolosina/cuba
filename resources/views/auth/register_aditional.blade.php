@extends('layouts.app')

@section('content')
    @include('layouts.header_menu')

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Регистрация №2</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register-aditiona-info') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Имя</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Фамилия</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="surname" value="{{ old('surname') }}">

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>








                        <div class="form-group{{ $errors->has('date_birth') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Дата рождения</label>

                            <div class="col-md-6">

                                <input type="text" id="datepicker" class="form-control" name="date_birth" value="{{ old('date_birth') }}">

                                @if ($errors->has('date_birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Пол</label>

                            <div class="col-md-6">


                                <label class="checkbox-inline"><input name="gender" type="radio" value="1" {{ old('gender')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>Мужчина</label>
                                <label class="checkbox-inline"><input name="gender" type="radio" value="0" {{ old('gender')=="0" ? 'checked='.'"'.'checked'.'"' : '' }}>Женщина</label>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        {{----------------------------------------------------------------------------------------------------------------------------}}
                        <div  class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Регион</label>
                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0px">
                                    <select class="chosen-select" name="region" id="sel1">
                                        <option value="">Выбирите регион</option>
                                        @foreach($region as $value)
                                            <option value="{{$value->id}}">{{$value->title}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('region'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('region') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <script>
                            var city_id = '';
                        </script>

                        @if(old('city'))
                                <script>
                                    city_id = '{{old('city')}}';
                                </script>
                        @endif


                        <script>
                            $(document).ready(function(){
                                $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"});


                                $('#sel1').on('change', function(){
                                    console.log($(this).val());
                                    if($(this).val().length){
                                        $.ajax({
                                            type: "GET",
                                                url: "/get-city-by-region/"+$(this).val(),
                                            data: '',
                                            success: function(data){
                                                $('#sel2_holder').show();
                                                var selector = $('#sel2')

                                                selector.html('');

                                                $.each(data, function(index, value) {

                                                    selector.append('<option value="'+value.id+'">'+value.title_cities+'</option>');
                                                });

                                                $('.chosen').chosen({no_results_text: "Oops, nothing found!"}).trigger("chosen:updated")

                                                if(city_id.length > 0){
                                                    $('.chosen').val(city_id);
                                                     $('.chosen').trigger("chosen:updated");
                                                    city_id = false;
                                                }
                                            }
                                        });
                                    }


                                });
                            });


                        </script>
                        {{----------------------------------------------------------------------------------------------------------------------------}}
                        <div style="display: none" id="sel2_holder" class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Город</label>
                            <div class="col-md-6">
                                <div {{--class="form-group"--}}>
                                    <select class="chosen"  name="city" id="sel2">
                                       {{-- @foreach($city as $value)
                                            <option>{{$value->title_cities}}</option>
                                        @endforeach--}}
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{----------------------------------------------------------------------------------------------------------------------------}}


                        <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Улица</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="street" value="{{ old('street') }}">
                                @if ($errors->has('street'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Дом</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i><span style="margin-left: 5px">Продолжить</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    {!! HTML::script('/js/registerList.js') !!}

    @if(old('date_birth'))
        <script>
            $('document').ready(function () {
                $('#datepicker').datepicker('setDate', '{{old("date_birth")}}');
            });
        </script>
    @endif

    @if(old('region'))
        <script>
            $('document').ready(function () {
                $('.chosen-select').val({{old("region")}});
                $('.chosen-select').trigger("chosen:updated");
                $('#sel1').change();
            });
        </script>
    @endif



@endsection
