<!-- Isabel Piedrahita -->
@extends('layouts.app')

@section("title", $data["title"])

@section('content')
{{ Breadcrumbs::render('show') }}
<br/><br/>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header">{{ $data["seed"]->getName() }}</div>
                <div class="card-body">
                    <b>@lang('seed.productName')</b> {{ $data["seed"]->getName() }}<br /><br />
                    <b>@lang('seed.productSeller')</b> {{ $data["seed"]->getSeller() }}<br /><br />
                    <b>@lang('seed.productPrice')</b> {{ $data["seed"]->getPrice() }}<br /><br />
                    <b>@lang('seed.productCategories')</b> {{ $data["seed"]->getCategories() }}<br /><br />
                    <b>@lang('seed.productKeywords')</b> {{ $data["seed"]->getKeywords() }}<br /><br />
                    <b>@lang('seed.productImage')</b><br /><br />
                    <img src="{{ URL::asset('storage/'.$data['seed']->getImage()) }}" width="400"
     height="500"/>
                </div>
            </div>
            <br /><br />
            <form method="POST" action="{{ route('cart.add',['id' => $data['seed']->getId()])}}">
                @csrf
                <input  placeholder="Quantity" required type="number" name="quantity" value="{{ old('quantity') }}" min="1" max="{{ $data["seed"]->getStock() }}" step="1" onkeydown="return false"/>
                <input type="submit" value ="@lang('seed.add')" >
            </form>
            <div class="divider-custom divider-dark">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            @guest
                @lang('seed.singIn')
            @endguest
            @auth
            <form method="POST" action="{{ route('review.save') }}" enctype="multipart/form-data">
                @csrf
                <input required type="number" placeholder="rating" name="rating" value="{{ old('rating') }}" min="1" max="5" step="1"/>
                <input type="text" placeholder="Enter comment" name="comment" value="{{ old('comment') }}" />
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="seed_id" value="{{  $data['seed']->getId() }}">
                <input type="file" placeholder="Select image" name="image" value="{{ old('image') }}" />
                <br/><br/>
                <input type="submit" value="Send" />
            </form>
            @endauth
            @foreach($data["seed"]->reviews as $review)
            <br /><br />
            <div class="card">
                <div class="card-header">{{ $review->user->name }}</div>
                <div class="card-body">
                    {{ $review->getComment() }}
                    <br/><br/>
                    <img src="{{ URL::asset('storage/'.$review->getImage()) }}" width="400"
     height="500"/>
                </div>
            </div>
            @endforeach
            <br/><br/>
        </div>
    </div>
</div>
@endsection
