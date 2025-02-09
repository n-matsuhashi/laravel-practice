@extends('layouts.app')
@section('title', $office->name)
@section('content')
    <h1>ビル詳細</h1>
    <table>
        <tr>
            <th>施設名</th>
            <td>{{ $office->name }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $office->address }}</td>
        </tr>
        <tr>
            <th>郵便番号</th>
            <td>{{ $office->post_code }}</td>
        </tr>
        <tr>
            <th>階</th>
            <td>{{ $office->stair }}階</td>
        </tr>
        <tr>
            <th>コメント</th>
            <td>{{ $office->comment }}</td>
        </tr>
        <tr>
            <th>メモ</th>
            @foreach($office->memos as $memo)
                <td>{{ $memo->content }}</td>
            @endforeach
        </tr>
    </table>
    <br />
    <form action="{{ route('offices.destroy', $office) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="削除">
    </form>
    <a href="{{ route('offices.edit', $office) }}">編集</a>
    <a href="{{ route('offices.index') }}">オフィス一覧</a>
@endsection
