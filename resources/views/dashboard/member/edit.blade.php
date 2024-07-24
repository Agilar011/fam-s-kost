@extends('layouts.custom')

@section('title', 'Form Edit')

@section('content')
    {{-- start logo and back --}}
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route($member_route['index']) }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route($member_route['index']) }}">
                {{-- <img src="{{ asset('assets/img/logo-kos.svg') }}"> --}}
            </a>
        </div>
    </nav>
    {{-- endt logo and back --}}

    <div class="card-header">
        <h4 class="card-title">Form Edit</h4>
    </div>
    <div class="card-body">
        <form action="{{ route($member_route['update'], $member->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ old('name', $member->name) }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                    id="address" value="{{ old('address', $member->address) }}" required autofocus>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Nomer Telepon</label>
                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                    id="phone_number" value="{{ old('phone_number', $member->phone_number) }}" required autofocus>
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="checkin_date" class="form-label">Tanggal Masuk Kos</label>
                <input type="date" name="checkin_date" class="form-control @error('checkin_date') is-invalid @enderror"
                    id="checkin_date" value="{{ old('checkin_date', $member->checkin_date) }}" required>
                @error('checkin_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto KTP</label>
                <span>
                    @if ($member->image)
                        <img src={{ asset('storage/' . $member->image) }}
                            class="img-preview img-fluid col-lg-10 col-xl-8 mb-3 p-0 border-1 border-primary"
                            id="image-preview" style="display: block; aspect-ratio: 16/9; object-fit:cover; border:solid;">
                    @else
                        <img class="img-preview img-fluid col-lg-10 col-xl-8 mb-3 p-0 border-1 border-primary d-none"
                            id="image-preview" style="border: solid">
                    @endif
                </span>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" accept="image/*">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning">Edit Data</button>
        </form>
    </div>
    <script>
        const inputImage = document.querySelector("#image");
        const previewImage = document.querySelector("#image-preview.img-preview");

        const displayInputImage = () => {
            previewImage.classList.remove("d-none")
            previewImage.style.display = "block";
            previewImage.style.aspectRatio = "16/9";
            previewImage.style.objectFit = "cover";
            const oFReader = new FileReader();
            oFReader.readAsDataURL(inputImage.files[0]);

            oFReader.onload = function(oFREvent) {
                previewImage.src = oFREvent.target.result;
            }
        }

        if (inputImage.files[0] != null) {
            displayInputImage()
        }

        inputImage.addEventListener("change", displayInputImage)
    </script>
@endsection
