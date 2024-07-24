@extends('layouts.custom')

@section('title', 'Form Room')

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
    {{-- end logo and back --}}
    <div class="card-header">
        <h4 class="card-title">Form Room</h4>
    </div>
    <div class="card-body">
        <form action="{{ route($rooms_route['store']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="fk_id_member" class="form-label @error('fk_id_member') is-invalid @enderror">Nama Penghuni
                    Kos</label>
                @if ($members->count() > 0)
                    <select class="form-select" name="fk_id_member" id="fk_id_member">
                        <option value="" {{ old('fk_id_member') === null ? 'selected' : '' }}>Tidak Ada Penghuni</option>
                        @foreach ($members as $dormitory)
                            @if (old('fk_id_member') == $dormitory->id)
                                <option value="{{ $dormitory->id }}" selected>{{ $dormitory->name }}</option>
                            @else
                                <option value="{{ $dormitory->id }}">{{ $dormitory->name }}</option>
                            @endif
                        @endforeach
                    </select>
                @else
                    <div class="form-control is-invalid">Tidak ada penghuni kos. Tambah data penghuni kos dahulu <a
                            href="{{ route($members_routes['index']) }}">disini</a></div>
                @endif
                @error('fk_id_member')
                    <div class="invalid-feedback">
                        {!! $message !!}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="room_number" class="form-label">Nomer Kamar</label>
                <input type="number" name="room_number" class="form-control @error('room_number') is-invalid @enderror"
                    id="room_number" value="{{ old('room_number') }}" required>
                @error('room_number')
                    <div class="invalid-feedback">
                        {!! $message !!}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar Kamar</label>
                <span>
                    <img class="img-preview img-fluid mb-3 p-0 border-1 border-primary d-none" id="image-preview"
                        style="border: solid">
                </span>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image[]" multiple accept="image/*">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        const inputImage = document.querySelector("#image");
        const previewImage = document.querySelector("#image-preview.img-preview");

        const displayInputImage = () => {
            previewImage.classList.remove("d-none")
            previewImage.style.display = "block";
            previewImage.style.height = "350px";
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
