@extends('layouts.head')

@section('content')
<div class="container">
    <div class="row">
        <div id="grid">
            @foreach( $companies as $company)
                <div>
                    <span>-{{$company->discount}} %</span>
                    <a href="{{ url('/details/' .$company->id) }}" class="b-main_page__link" title="Смотрите любимое кино дома! Скидка до 40% на 3, 6 или 12 месяцев подписки в онлайн-кинотеатре ivi!">
                        <div>
                            <img width="310" height="240"  src="https://www.tibs.org.tw/images/default.jpg" class="e-deal__img">
                        </div>

                        <div>
                            @if($company->certificats)
                                <span class="e-deal__link">Купили:
                                    <span class="e-deal__count" data-id="51007"> {{$company->certificats[0]->bought}} </span>
                                    <p class="deals_bold">от {{$company->certificats[0]->price*(1-($company->certificats[0]->discount/100))}}тг.&nbsp;</p>
                                </span>
                            @endif


                        </div>
                        <div class="e-deal__text-wrapper">
                            <div class="e-deal__text-inner">
                                <div class="e-deal__title e-deal__title-no-margin">{{$company->name}}</div>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

{{--<li class="b-deal " data-categories="[ 1 , 2 , 6 , 24 , 6 , 99 , 5 , 110 , 173 , 179 , 239 , 240 , 241 ]" data-coordinates="[]" data-id="51007">--}}

{{--</li>--}}
