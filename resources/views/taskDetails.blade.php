@extends('layouts.app')

@section('title' , $task->title);

@section('content')

    <h1> {{ $task->title }} </h1>
    <p>{{ $task->description }}</p>

    @if($task->longDescription)
        <p>{{ $task->longDescription }}</p>
    @endif

    <p>{{ $task->createdAt }} </p>
    <p>{{ $task->updatedAt }} </p>

@endsection
