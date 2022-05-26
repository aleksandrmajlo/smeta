@extends('layouts.app')

@section('content')
    <div class="container">
        @include('result')
        <h1 class="mt-5">Калькулятор навесов</h1>
        <div class="row">
            <div class="col-md-8">
                <form id="fornZakaz">

                    <div class="mb-3">
                        <label class="form-label">Длина(м)</label>
                        <input type="number" class="form-control" step=".1" id="length" name="length" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ширина(м)</label>
                        <input type="number" class="form-control" step=".1" id="width" name="width" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Высота(м)</label>
                        <input type="number" class="form-control" step=".1" id="heigth"  name="heigth" required>
                    </div>

                    <hr class="mb-4"/>
                    <h4>Столбы</h4>
                    <div>
                        <select class="form-control" name="tube_1" id="tube_1" required>
                            @foreach($tube1 as $tube)
                                <option value="{{$tube->id}}">{{$tube->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="mb-4"/>
                    <h4>Ригель</h4>
                    <div class="mb-2">
                        <select class="form-control" id="rigel_types">
                            @foreach($rigel_types as $key=>$rigel_type)
                                <option value="{{$key}}">{{$rigel_type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <rigel-type ></rigel-type>


                    <hr class="mb-4"/>
                    <h4>Стропильная система</h4>
                    @foreach($type_trus as $key=>$type)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio"
                                   data-type="{{$key}}"
                                   name="type_trus" id="type_trus{{$key}}" value="{{$key}}" @if($key=='1') checked @endif>
                            <label class="form-check-label" for="type_trus{{$key}}">
                                {{$type}}
                            </label>
                        </div>
                    @endforeach
                    <trus :trus1="{{$trus1}}" :trus2="{{$trus2}}"  ></trus>

                    <hr class="mb-4"/>
                    <h4>Обрешетка</h4>
                    <div class="">
                        <select class="form-control" name="obreshetka" id="obreshetka" required>
                            @foreach($obreshetka as $tube)
                                <option value="{{$tube->id}}">{{$tube->title}}</option>
                            @endforeach
                        </select>
                    </div>


                    <hr class="mb-4"/>
                    <h4>Покрытие кровли</h4>
                    <roof :roofs="{{$roofs}}" :roofelements="{{$roofelements}}"></roof>

                    <hr class="mb-4"/>
                    <h4>Форма кровли</h4>
                    @foreach($formroofs as $formroof)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="formroof"
                                   value="{{$formroof->id}}" id="formroof{{$loop->index}}" @if($loop->index==0) checked @endif>
                            <label class="form-check-label" for="formroof{{$loop->index}}">
                                {{$formroof->title}}
                            </label>
                        </div>
                    @endforeach

                    <hr class="mb-4"/>
                    <h4>Краска</h4>
                    <div >
                        <select class="form-control" name="paints" id="paints" required>
                            @foreach($paints as $tube)
                                <option value="{{$tube->id}}">{{$tube->title}}</option>
                            @endforeach
                        </select>
                        <label class="form-label mt-2">Кол-во краски(шт.)</label>
                        <input class="form-control"  type="number" max="7" min="1" required id="count_paints" value="1" name="count_paints">
                    </div>

                    <hr class="mb-4"/>
                    <h4>Тип монтажа</h4>
                    <div >
                        <select class="form-control" name="montach" id="montachs" required>
                            @foreach($montach as $tube)
                                <option value="{{$tube->id}}">{{$tube->title}}</option>
                            @endforeach
                        </select>
                    </div>


                    <hr class="mb-4"/>
                    <h4>Дополнительные материалы</h4>
                    @foreach($dopmaterials as $formroof)
                        <div class="d-flex align-items-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input dopmaterial_check" type="checkbox"
                                       name="dopmaterials[]" value="{{$formroof->id}}"
                                       id="dopmaterial_{{$loop->index}}">
                                <label class="form-check-label" for="dopmaterial_{{$loop->index}}">
                                    {{$formroof->title}}
                                </label>
                            </div>
                            <div>
                                <label class="form-label">Количество в {{$formroof->price_type}}</label>
                                <input class="form-control dopmaterial_input "
                                       id="dopmaterial_input_{{$loop->index}}"
                                       min="0"
                                       type="number"
                                       placeholder="{{$formroof->price_type}} "
                                       name="dop_count_{{$formroof->id}}">
                            </div>
                        </div>
                    @endforeach

                    <hr class="mb-4"/>
                    <h4>Услуги</h4>
                     @foreach($service_config as $key=>$v)
                         <h6 class="pr-3 ms-3 font-weight-bold">{{$v}}</h6>
                         @php
                             $services=App\Models\Service::where('type',$key)->get();
                         @endphp
                         @foreach($services as $service)
                            <div class="form-check ms-3">
                                <input class="form-check-input" type="checkbox" name="service[]" value="{{$service->id}}" id="service{{$service->id}}">
                                <label class="form-check-label" for="service{{$service->id}}">
                                    {{$service->title}} -<span style="font-weight: bolder"> @if($service->default!='1') {{$service->price}}  {{$service->price_type}} @else по умолчанию @endif</span>
                                </label>
                            </div>
                         @endforeach
                        <hr class="mb-2 col-8" />
                     @endforeach

                    <hr class="mb-4"/>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
            <div class="col-md-4">
                <photos></photos>
            </div>
        </div>
        <hr class="mb-4"/>
{{--        @include('result')--}}

    </div>
@endsection

