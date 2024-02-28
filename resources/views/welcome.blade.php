<x-layouts.layout>
    <div class="welcome-page">
        <header class="header">
            <h2 class="h-100 d-flex justify-content-center align-items-center text-black">"Header provvisorio"</h2>
        </header>
        <div class="container">
            <div class="row A">
                <div class="col-12">
                    <h1 class="text-center my-4">{{__('ui.welcomePageTitle')}}</h1>
                    @if (session('access.denied'))
                    <div class="alert alert-danger text-center">
                        {{ session('access.denied') }}
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row  mb-costum">
                            @foreach ($announcements as $announcement)
                            <div class="col-12 col-md-4 my-4 d-flex justify-content-center div-container">
                                <div class="card shadow card-welcome" style="width: 18rem;">
                                    <div class="img-container">
                                        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,300) : 'https://picsum.photos/200'}}" class="card-img-top mb-0 card-img-welcome img-fluid " alt=". . .">
                                    </div>
                                    <div class="px-4 pb-0 publishedby-section-container">
                                        <h5 class="card-title mb-0">{{$announcement->title}}</h5>
                                        <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="text-decoration-none text-black">Categoria: {{$announcement->category->name}}</a>
                                        <p class="card-text my-2">{{ Str::limit($announcement->body, 60) }}</p>
                                        <p class="card-text fs-5 mb-0">{{$announcement->price}} €</p>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{route('announcements.show', compact('announcement'))}}" id="show-more-cards" class="text-decoration-none text-black fw-semibold">{{__('ui.welcomePageShowMore')}}</a>
                                        </div>
                                        <p class="card-footer mb-0 pb-0 publishedby-section-cards">{{__('ui.welcomePublishedDate')}} {{$announcement->created_at->format('d/m/Y')}} <br> {{__('ui.welcomeAutore')}}  {{$announcement->user->name ?? ''}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>