@extends('layout')

@section('content')
<h1 class="text-center text-9xl">お店一覧</h1>
<div class="mr-20 ml-20 my-9">
  @foreach($folders as $folder)
  <div class="flex">
  <img src="{{ asset('img/'. $folder->path) }}" alt="" class="h-90 w-150 text-right pb-9">
  <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
  <h2 class="text-6xl ">{{ $folder->title }}</h2>
  <form action="{{ route('review.create', ['id' => $folder->id]) }}" class="">
  <input type="hidden" name="folder_name" value="{{ $folder->title }}">
  <input type="hidden" name="folder_id" value="{{ $folder->id }}">
  <button class="shadow-lg px-2 py-1  bg-blue-400 text-lg text-white font-semibold rounded  hover:bg-blue-500"><input type="submit" value="レビューする"></button>
    
  </form>
  </div>
</div>
  @endforeach
</div>
  @endsection