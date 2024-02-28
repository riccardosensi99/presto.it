<x-layouts.layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-2 text-center my-4"> {{__('ui.announcement')}} {{$announcement->title}}</h1>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-12">
                <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                    @if($announcement->images)
                    <div class="carousel-inner">
                        @foreach ($announcement->images as $image)
                          <div class="carousel-item @if($loop->first)active @endif">
                            <img src="{{Storage::url($image->path)}}" class="img-fluid p-3 rounded" alt="">
                          </div>
                            
                        @endforeach 
                    </div>
                    @else
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="https://picsum.photos/id/27/1200/200" class="img-fluid p-3 rounded" alt=". . .">
                            </div>
            
                            <div class="carousel-item">
                                <img src="https://picsum.photos/id/27/1200/200" class="img-fluid p-3 rounded" alt=". . .">
                            </div>
            
                            <div class="carousel-item">
                                <img src="https://picsum.photos/id/27/1200/200" class="img-fluid p-3 rounded" alt=". . .">
                            </div>
                        </div>
                    @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                        <span  class="carousel-control-prev-icon" area-hidden="true"></span>
                        <span class="visually-hidden"> {{__('ui.previous')}} </span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                        <span  class="carousel-control-next-icon" area-hidden="true"></span>
                        <span class="visually-hidden"> {{__('ui.next')}} </span>
                    </button>
                </div>
                <h5 class="card-title"> {{__('ui.titleToCheck')}} {{$announcement->title}}</h5>
                <p class="card-text"> {{__('ui.descriptionToCheck')}} {{$announcement->body}}</p>
                <p class="card-text"> {{__('ui.priceToCheck')}}  {{$announcement->price}}</p>
                <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="btn btn-primary shadow my-2 border-top pt-2 border-dark card-link shadow">Categoria: {{$announcement->category->name}}</a>
                <p class="card-footer"> {{__('ui.welcomePublishedDate')}} {{$announcement->created_at->format('d/m/Y')}} -  {{__('ui.welcomeAutore')}} {{$announcement->user->name ?? ''}}</p>
            </div>
        </div>
    </div>
</x-layouts.layout>