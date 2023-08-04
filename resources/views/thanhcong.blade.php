@if(Auth::check())
    <h1>Đăng nhập thành công</h1>
    @if(isset($user))
        {{'Tên: '.$user->name}} <br>
        {{'Email: '.$user->email}} <br>
        <a href="{{url('logout')}}">Logout</a>
    @endif
@else
    <h1>Ban chua dang nhap</h1>
@endif
