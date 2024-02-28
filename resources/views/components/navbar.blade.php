<nav class="navbar navbar-expand-lg shadow">
    <a class="navbar-brand mx-3 fs-1 welcome-page-elements" href="/">Presto.it</a>
    <a href="{{ route('announcements.index') }}" class="navbuttons btn btn-outline-success mx-3" aria-current="page">{{__('ui.announcementsNavbar')}}</a>
    <div class="dropdown nav-item">
        <button class="btn dropdown-toggle navbuttons me-3" id="categoriesDropdown" type="button" data-bs-toggle="dropdown"
        aria-expanded="false">{{__('ui.categoriesNavbar')}}</button>
        <ul class="dropdown-menu dropdown-color" aria-labelledby="categoriesDropdown">
            @foreach ($categories as $category)
            <li><a class="dropdown-item" href="{{ route('categoryShow', compact('category')) }}">{{-- {{ __("ui.$category->name") }} --}} {{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <form action="{{route('announcements.search')}}" method="GET" class="d-flex">
        <input type="search" name="searched" class="form-control me-1" placeholder="{{__('ui.placeholderNavbar')}}" aria-label="Search">
        <button class="btn btn-outline-succes links" type="submit">{{__('ui.placeholderNavbar')}}</button>
    </form>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto me-3">
        <nav class="navbar">
            <form class="container-fluid justify-content-start">
                @auth
                <p class="mb-0 mx-3">
                    {{__('ui.welcomeAuthorMessage')}} <i>{{ Auth::user()->name }}</i>
                </p>
                @endauth
                @guest
                <button class="btn btn-sm btn-outline-success me-2 navbuttons" type="button"><a id="links-navbar"
                    href="{{ route('register') }}">{{__('ui.registerNavbar')}}</a></button>
                    <button class="btn btn-sm btn-outline-success me-2 navbuttons" type="button"><a id="links-navbar"
                        href="{{ route('login') }}">{{__('ui.accessNavbar')}}</a></button>
                        @else
                        <a class="navbuttons btn btn-outline-success mx-2" href="{{ route('announcements.create') }}">{{__('ui.putAnnouncementNavbar')}}</a>
                        @if (Auth::user()->is_revisor)
                        <a class="navbuttons btn btn-outline-success position-relative me-4"
                        href="{{ route('revisor.index') }}">
                        {{__('ui.revZoneNavbar')}}
                        <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ App\Models\Announcement::toBeRevisionedCount() }}
                        <span class="visually-hidden">unread messagges</span>
                    </span>
                </a>
                @endif
                <button class="btn btn-outline-danger navbuttons mx-2" type="button"><a id="links-navbar" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{__('ui.logoutNavbar')}}</a></button>
                @endguest
            </form>
            <form id="form-logout" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </nav>
    </ul>
</div>
</nav>
