{{-- kijkt of de user is ingelogd via guard web met check() --}}
@if(Auth::guard('web')->check())
    <p class="text-success">
        You are logged in as user.
    </p>
@else
    <p class="text-danger"> 
        You are logged out as user.
    </p>
@endif

{{-- kijkt of de admin is ingelogd via guard web met check() --}}
@if(Auth::guard('admin')->check())
    <p class="text-success">
        You are logged in as admin.
    </p>
@else
    <p class="text-danger"> 
        You are logged out as admin.
    </p>
@endif