@extends('layouts.app')
@section('title', 'edit office')
@section('content')
    <h1>ビル編集</h1>
    @include('offices.components.form', [
                                            'office' => $office,
                                            'action' => route('offices.update', $office),
                                            'isUpdate' => true
                                        ])
@endsection
