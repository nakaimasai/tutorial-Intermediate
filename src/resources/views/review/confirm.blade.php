@extends('layout')

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('content')
<form action="{{ route('review.create') }}" method="post">
@csrf
<input type="hidden" name="email" value="{{ $contact['name'] }}">
<div class="row">
<label for="name" class="col-md-3 text-md-right">氏名:</label>
<div class="col-md-9">
    {{ $contact['name'] }}
</div>
</div>
</form>
@endsection