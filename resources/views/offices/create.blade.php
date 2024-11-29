@extends('layouts.app')
@section('title', 'create office')

@section('content')
    <h1>オフィス新規登録</h1>
    @include('offices.components.form', [
        'office' => null,
        'action' => route('offices.store'),
        'isUpdate' => false
    ])
{{--    ajaxで使う --}}
{{--    <ul data-error-message></ul>--}}
{{--    <form data-office-create>--}}
{{--        @csrf--}}
{{--        <table>--}}
{{--            <tr>--}}
{{--                <td><label for="name">施設名</label></td>--}}
{{--                <td><input type="text" name="name" id="name" value="{{ old('name') }}"/></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td><label for="address">住所</label></td>--}}
{{--                <td><input type="text" name="address" id="address" value="{{ old('address') }}" /></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td><label for="post_code">郵便番号</label></td>--}}
{{--                <td><input type="text" name="post_code" id="post_code" value="{{ old('post_code') }}" /></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td><label for="stair">階</label></td>--}}
{{--                <td><input type="text" name="stair" id="stair" value="{{ old('stair') }}" /></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td><label for="comment">コメント</label></td>--}}
{{--                <td><textarea name="comment" id="comment">{{ old('comment') }}</textarea></td>--}}
{{--            </tr>--}}
{{--        </table>--}}
{{--        <button type="submit">登録</button>--}}
{{--    </form>--}}
{{--@endsection--}}
@endsection

# ajaxで使う
<script src="{{ mix('js/pages/offices/create.js') }}"></script>
