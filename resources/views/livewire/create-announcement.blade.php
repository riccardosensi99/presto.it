<div>
    <h1 class="text-center display-1">{{__('ui.createAnnouncement')}}</h1>

    @if (session('message'))
        <div class="alert alert-success flex flex-row justify-center my-2">
            {{ session('message') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger flex flex-row justify-center my-2">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        @csrf
        <div class="my-3">
            <label for="title">{{__('ui.announcementTitle')}}</label>
            <input wire:model="title" type="text" class="form-control @error('title') is-ivalid @enderror">
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <div class="my-3">
            <label for="body">{{__('ui.announcementDescription')}}</label>
            <input wire:model="body" type="text" class="form-control @error('body') is-ivalid @enderror">
            @error('body')
                {{ $message }}
            @enderror
        </div>
        <div class="my-3">
            <label for="price">{{__('ui.announcementPrice')}}</label>
            <input wire:model="price" type="number" class="form-control @error('price') is-ivalid @enderror">
            @error('price')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="category">{{__('ui.announcementCategory')}}</label>
            <select wire:model.defer="category" id="category" class="form-control">
                <option value="">{{__('ui.announcementChoseCategory')}}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <input wire:model="temporary_images" type="file" name="images" multiple
                class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="img">
            @error('temporary_images.*')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
        </div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Photo preview:</p>
                    <div class="row border border-4 border-info rounded shadow py-4">
                        @foreach ($images as $key => $image)
                            <div class="col my-3">
                                <div class="img-preview mx-auto shadow rounded"
                                    style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                                    wire:click="removeImage({{ $key }})">{{__('ui.cancelMessage')}}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success text-light shadow my-3 navbuttons">{{__('ui.createMessage')}}</button>
        </div>
    </form>
</div>
