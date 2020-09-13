<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">{{ auth()->user()->company()->name }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/bounties">Bounty</a>
    </li>
    <li class="breadcrumb-item">
        <span>@yield('title')</span>
    </li>
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-i">
    <div class="content-box">
        @yield('main')
    </div>
</div>
