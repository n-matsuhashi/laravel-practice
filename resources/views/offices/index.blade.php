@extends('layouts.app')
@section('title', 'Office')
@section('content')
    <h1>Offices</h1>
    <p>Welcome to the office.</p>
    <a href="{{ route('offices.create') }}">Create Office</a>
    <ul>
        @foreach ($offices as $office)
            <li>
                <a href="{{ route('offices.show', $office) }}">{{ $office->name }}</a>
                <ul>
                    @foreach($office->memos as $memo)
                        <li>{{$memo->content}}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection
