<x-layouts.layout>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="display-2 text-center my-4">
          @if($announcement_to_check)
          {{__('ui.reviseAnnouncement')}}
          @else
          {{__('ui.noAnnouncementToRevise')}}
          @endif

        </h1>
      </div>
    </div>
  </div>
  @if($announcement_to_check)
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
          @if($announcement_to_check->images)
          <div class="carousel-inner">
            @foreach ($announcement_to_check->images as $image)
            <div class="d-flex justify-content-center carousel-item @if($loop->first)active @endif">
              <img src="{{Storage::url($image->path)}}" class="img-fluid p-3 rounded" alt=". . .">
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
            <span class="visually-hidden">{{__('ui.previous')}}</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
            <span  class="carousel-control-next-icon" area-hidden="true"></span>
            <span class="visually-hidden">{{__('ui.next')}}</span>
          </button>
        </div>
        <h5 class="card-title">{{__('ui.titleToCheck')}} {{$announcement_to_check->title}}</h5>
        <p class="card-text">{{__('ui.descriptionToCheck')}} {{$announcement_to_check->body}}</p>
        <p class="card-footer">{{__('ui.welcomePublishedDate')}} {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-12 col-md-6">
        <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
          @csrf
          @method('PATCH')
          <button type="submit" class="btn btn-success shadow"> {{__('ui.accept')}} </button>
        </form>
      </div>
      <div class="col-12 col-md-6 text-end">
        <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
          @csrf
          @method('PATCH')
          <button type="submit" class="btn btn-danger shadow">{{__('ui.decline')}}</button>
        </form>
      </div>
    </div>
  </div>
  @endif

  <div style="min-height: 800px">
    
  </div>
</x-layouts.layout>