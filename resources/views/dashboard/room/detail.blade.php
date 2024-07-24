@extends('layouts.custom')

@section('title', 'Form Transaction')

@section('content')
    {{-- start logo and back --}}
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route($rooms_route['index']) }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route($rooms_route['index']) }}">
                {{-- <img src="{{ asset('assets/img/logo-kos.svg') }}"> --}}
            </a>
        </div>
    </nav>
    {{-- endt logo and back --}}
    <div class="card-header">
        <h4 class="card-title">Detail Room</h4>
    </div>

    <div class="card-body">
        <div class="p-0 mb-sm-3">
            @if (count($room->roomimages) > 0)
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        @for ($i = 0; $i < count($room->roomimages); $i++)
                            @if ($i == 0)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="{{ $i }}" class="active" aria-current="true"
                                    aria-label="Slide {{ $i + 1 }}"></button>
                            @else
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
                            @endif
                        @endfor
                    </div>
                    <div class="carousel-inner bg-primary flex justify-content-center align-items-center w-100">
                        @for ($i = 0; $i < count($room->roomimages); $i++)
                            @if ($i == 0)
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/' . $room->roomimages[$i]->image) }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/' . $room->roomimages[$i]->image) }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @endif
                        @endfor
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                <div class="col-12 mb-3 p-0">
                    <span class="form-control border-1 border-danger text-danger">Tidak ada gambar untuk kamar ini</span>
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Nomer Kamar</label>
            <span class="form-control border-1 border-primary">{{ $room->room_number }}</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Penghuni Kos</label>
            <span
                class="form-control border-1 border-primary {{ $room->member->name ?? 'text-danger' }}">{{ $room->member->name ?? 'Tidak ada penghuni' }}</span>
        </div>
    </div>
@endsection
