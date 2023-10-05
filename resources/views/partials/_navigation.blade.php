<div class="logo">
    C&S
</div>

<div class="filler"></div>

<a href="/">Home</a>
<!-- <a href="/dashboard">Dashboard</a> -->
<a href="/news">News</a>
<a href="/courses">Courses</a>
<a href="/login">Login</a>

@auth
<div class="user-avatar">
    {{ auth()->user()['first-name'] }} {{ auth()->user()['last-name'] }}
</div>
@endauth