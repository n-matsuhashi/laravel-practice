@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ $action }}" method="post">
    @csrf
    @if($isUpdate)
        @method('PUT')
    @endif
    <table>
        <tr>
            <td><label for="name">施設名</label></td>
            <td><input type="text" name="name" id="name" value="{{ old('name', $office->name ?? '') }}"/></td>
        </tr>
        <tr>
            <td><label for="address">住所</label></td>
            <td><input type="text" name="address" id="address" value="{{ old('address', $office->address ?? '') }}" /></td>
        </tr>
        <tr>
            <td><label for="post_code">郵便番号</label></td>
            <td><input type="text" name="post_code" id="post_code" value="{{ old('post_code', $office->post_code ?? '') }}" /></td>
        </tr>
        <tr>
            <td><label for="stair">階</label></td>
            <td><input type="text" name="stair" id="stair" value="{{ old('stair', $office->stair ?? '') }}" /></td>
        </tr>
        <tr>
            <td><label for="comment">コメント</label></td>
            <td><textarea name="comment" id="comment">{{ old('comment', $office->comment ?? '') }}</textarea></td>
        </tr>
    </table>
    <button type="submit">{{ $isUpdate ? '更新' : '登録' }}</button>
</form>
