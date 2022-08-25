<form method="POST" action="{{route('admin.login')}}">
    @csrf
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="submit">
</form>