@extends('layouts.app')
@section('title', 'login')
@section('content')
    <form method="POST" action="{{ route('login.process') }}">
        @csrf
        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <table>
            <tr>
                <td><label for="email">メールアドレス</label></td>
                <td><input type="email" name="email" id="email" value="{{ old('email') }}" /></td>
            </tr>
            <tr>
                <td><label for="password">パスワード</label></td>
                <td><input type="password" name="password" id="password" /></td>
            </tr>
        </table>
        <br />
        <button type="submit">ログイン</button>
    </form>
@endsection
