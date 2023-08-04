<form action="{{route('postForm')}}" method="post">
    @csrf
    <input type="text" name="HoTen">
    <input type="submit">
</form>
