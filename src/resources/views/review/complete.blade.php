@extends('layout')

@section('content')
<div class="flex items-center justify-center p-12">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="mx-auto w-full max-w-[550px]">
<p>ご意見ありがとうございます
<a href="{{ route('tasks.index') }}" class="bg-blue-300 hover:bg-blue-400 text-white rounded px-4 py-2">
                お店一覧へ
</a>
</div>
</div>
@endsection