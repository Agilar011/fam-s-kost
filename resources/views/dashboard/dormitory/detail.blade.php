@extends('layouts.custom')

@section('title', 'Form Member')

@section('content')
    {{-- start logo and back --}}
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route($dormitory_route['index']) }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route($dormitory_route['index']) }}">
                {{-- <img src="{{ asset('assets/img/logo-kos.svg') }}"> --}}
            </a>
        </div>
    </nav>
    {{-- endt logo and back --}}
    <div class="card-header">
        <h4 class="card-title">Detail Member</h4>
    </div>
    <div class="card-body">
        @if ($dormitory->image)
            <div class="mb-3 p-0 col-lg-8 ratio ratio-16x9">
                <img class="mx-sm-auto-custom" src="{{ asset('storage/' . $dormitory->image) }}" alt="Gambar"
                    height="350px" style="display: block; aspect-ratio: 16/9; object-fit:cover; border:solid;" />
            </div>
        @else
            <div class="col-12 mb-3 p-0">
                <span class="form-control border-1 border-danger text-danger">Tidak ada gambar profile</span>
            </div>
        @endif

        <div class="mb-3">
            <label for="number" class="form-label">Name</label>
            <span class="form-control border-1 border-primary">{{ $dormitory->name }}</span>

        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <span class="form-control border-1 border-primary">{{ $dormitory->phone_number }}</span>

        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Tanggal Masuk Kos</label>
            <span class="form-control border-1 border-primary">{{ $dormitory->checkin_date ?? '-' }}</span>

        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Tanggal Keluar Kos</label>
            <span class="form-control border-1 border-primary">{{ $dormitory->checkout_date ?? '-' }}</span>

        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <span class="form-control border-1 border-primary">{{ $dormitory->address }}</span>
        </div>
        {{-- <div class="row mb-3 p-0 flex-sm-column">
            <div class="col">
                <span class="form-control border-1 border-primary">Skema Pembayaran</span>
            </div>
            <div class="col" id="container-response">
                @if ($dormitory->checkin_date)
                    <style>
                        a.m-0.text-nowrap.font-weight-bold.text-primary:hover {
                            color: blue !important;
                            text-decoration: underline;
                        }

                        a.m-0.text-nowrap.font-weight-bold.text-primary.active {
                            color: red !important;
                            text-decoration: underline;
                        }

                        .border-black-solid {
                            border: 1px solid black;
                        }

                        .month-box.text-nowrap:hover {
                            text-decoration: underline;
                        }
                    </style>
                    <div class="card shadow border-1 border-primary p-0 w-100">
                        <div class="card-header">
                            <div class="d-flex py-2 w-100 overflow-auto">
                                @for ($i = $year_checkin; $i <= $max_year + 1; $i++)
                                    <a role="button"
                                        class="text-center m-0 text-nowrap font-weight-bold text-primary {{ $i == $max_year + 1 ? '' : 'mr-5' }}">{{ $i }}</a>
                                @endfor
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row w-100 overflow-auto py-0 px-0 py-md-2"
                                id="month-body">
                            </div>
                        </div>
                    </div>


                    <script>
                        console.log("ok")
                        const headerYear = document.querySelectorAll("a.m-0.text-nowrap.font-weight-bold.text-primary");
                        const containerMonth = document.getElementById("month-body");

                        let year_now = new Date().getFullYear();
                        let urlajax = "{{ route('dormitory.index') }}";
                        let dormitory_id = {{ $dormitory->id }}

                        headerYear.forEach(element => {
                            if (element.text == year_now) {
                                element.classList.add("active");
                            }
                        });

                        headerYear.forEach(element => {
                            element.addEventListener("click", () => {
                                let yearActive = document.querySelector(
                                    "a.m-0.text-nowrap.font-weight-bold.text-primary.active")
                                yearActive.classList.remove("active");
                                element.classList.toggle("active");
                                const xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                        containerMonth.innerHTML = xhr.responseText;
                                    }
                                };

                                xhr.open("GET", urlajax + "/payment/" + dormitory_id + "/year/" + element.text, true);

                                xhr.send();
                            })
                        });
                    </script>

                    <script>
                        const containerresponse = document.getElementById("container-response");
                        let urlajax = "{{ route('dormitory.index') }}";
                        let dormitory_id = {{ $dormitory->id }}

                        const xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                containerresponse.innerHTML = xhr.responseText;
                            }
                        };

                        xhr.open("GET", urlajax + "/payment/" + dormitory_id, true);

                        xhr.send();
                    </script>
                @else
                    <span class="form-control border-1 border-danger text-danger text-wrap">Data Tanggal Masuk Kos belum
                        diset</span>
                @endif
            </div>
        </div> --}}

    </div>
@endsection
