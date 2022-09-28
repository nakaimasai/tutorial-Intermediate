@extends('layout')

@section('content')
<h1 class="text-center text-9xl">お店一覧</h1>

@foreach($folders as $folder)
<div class="container px-6 py-10 mx-auto">
        <h1 class="text-4xl font-semibold">{{ $folder->title }}</h1>

        <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
            <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="{{ asset('img/'. $folder->path) }}"alt="">

            <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
            <h1 class="text-3xl font-semibold">{{ $folder->title }}</h1>
                @if(isset( $folder->avg ))
                  <p class="result-rating-rate">
                  <span class="star5_rating " data-rate="{{ $folder->avg }}"></span>
                  <span class="number_rating ">{{ $folder->avg }}点</span>
                  </p>
                @else
                  <p>レビューがありません</p>
                @endif
                <form action="{{ route('review.create', ['id' => $folder->id]) }}" class="">
                <input type="hidden" name="folder_name" value="{{ $folder->title }}">
                <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                <button class="shadow-lg px-2 py-1  bg-blue-400  text-white font-semibold rounded  hover:bg-blue-500 "><input type="submit" value="レビューする"></button>
                </form>
                <p class="mt-3 text-lg">
                {{ $folder->detail }}
                </p>
            </div>
        </div>
    </div>
@endforeach
@endsection