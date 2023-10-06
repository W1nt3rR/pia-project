<div class="logo">
    C&S
</div>

<div class="filler"></div>

<a href="/">Home</a>
<!-- <a href="/dashboard">Dashboard</a> -->
<a href="/news">News</a>
<a href="/courses">Courses</a>
<a href="/enrolled">Enrolled</a>

@if(auth()->user())
<a href="/logout">Logout</a>
@else
<a href="/login">Login</a>
@endif

@auth
<div class="user-avatar">
    <div>{{ auth()->user()['first-name'] }} {{ auth()->user()['last-name'] }}</div>
    <div>{{ auth()->user()['username'] }}</div>
    
</div>
@if (auth()->user()?->attempts > 0)
<div>
    Precision: {{ number_format((auth()->user()->completions / auth()->user()->attempts) * 100, 2) }}%
</div>
@endif
@endauth