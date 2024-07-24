@extends('layouts.custom')

@section('title', 'Edit Room')

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
        <h4 class="card-title">Edit Room</h4>
    </div>
    <div class="card-body">
        <form action="{{ route($rooms_route['update'], $room->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="fk_id_member" class="form-label">Nama Penghuni Kamar</label>
                <select name="fk_id_member" class="form-select @error('fk_id_member') is-invalid @enderror"
                    id="fk_id_member" required autofocus>
                    @if (!$room->fk_id_member)
                        <option value="0" selected>Tidak Ada Penghuni</option>
                    @endif
                    @foreach ($members as $member)
                        @if (old('fk_id_member', $room->fk_id_member) == $member->id)
                            <option value="{{ $member->id }}" selected>{{ $member->name }}</option>
                        @else
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('fk_id_member')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="room_number" class="form-label">Nomer Kamar</label>
                <input type="number" name="room_number" class="form-control @error('room_number') is-invalid @enderror"
                    id="room_number" value="{{ old('room_number', $room->room_number) }}" required>
                @error('room_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="mb-3">
				@if ($room->roomimages->count() > 0)
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col" class="text-center">Gambar</th>
								<th scope="col" class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($room->roomimages as $roomimage)
								<tr>
									<td>
										<img src="{{ asset("storage/" . $roomimage->image) }}" alt="" class="img-thumbnail">
									</td>
									<td class="middle">
										<a href="{{ route("image.rooms.destroy", $roomimage->id) }}" class="badge badge-danger px-2 py-1 px-md-3 py-md-2" onclick="return confirm('Apakah anda yakin ingin menghapus Gambar ini?')">Hapus</a>
									</td></div>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<div class="col-12 p-0 mt-4">
						<span class="form-control border-1 border-danger text-danger">Tidak ada gambar untuk kamar ini</span>
					</div>
				@endif
			</div> --}}

            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <div class="mb-3">
                    @if ($room->roomimages->count() > 0)
                        @foreach ($room->roomimages as $roomimage)
                            <span>
                                <img src="{{ asset('storage/' . $roomimage->image) }}" alt=""
                                    class="img-thumbnail">
                            </span>
                        @endforeach
                    @else
                        <div class="col-12 p-0 mt-4">
                            <span class="form-control border-1 border-danger text-danger">Tidak ada gambar untuk kamar
                                ini</span>
                        </div>
                    @endif
                </div>
                <input type="hidden" name="fk_id_room" value="{{ $room->id }}">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" name="image[]" multiple accept="image/*">
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
