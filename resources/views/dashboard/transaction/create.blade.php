@extends('layouts.custom')

@section('title', 'Form Transaction')

@section('content')
    {{-- start logo and back --}}
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route($transactions_route['index']) }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route($transactions_route['index']) }}">
                {{-- <img src="{{ asset('assets/img/logo-kos.svg') }}"> --}}
            </a>
        </div>
    </nav>
    {{-- endt logo and back --}}
    <div class="card-header">
        <h4 class="card-title">Form Transaction</h4>
    </div>
    <div class="card-body">
        <form action="{{ route($transactions_route['store']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="fk_id_member" class="form-label @error('fk_id_member') is-invalid @enderror">Nama Penghuni
                    Kos</label>
                @if ($members->count() > 0)
                    <select class="form-select" name="fk_id_member" id="fk_id_member" required>
                        @foreach ($members as $member)
                            @if (old('fk_id_member') == $member->id)
                                <option value="{{ $member->id }}" selected>{{ $member->name }} ( Kamar
                                    {{ $member->rooms[0]->room_number }} )</option>
                            @else
                                <option value="{{ $member->id }}">{{ $member->name }} ( Kamar
                                    {{ $member->rooms[0]->room_number }} )</option>
                            @endif
                        @endforeach
                    </select>
                @else
                    <div class="form-control is-invalid">Tidak ada data. Tambah data penghuni kos dahulu <a
                            href="{{ route($members_route['index']) }}">disini</a></div>
                @endif
                @error('fk_id_member')
                    <div class="invalid-feedback">
                        {!! $message !!}
                    </div>
                @enderror
            </div>
            @if (true)
                <div class="mb-3">
                    <label for="total_month" class="form-label">Total Bulan Bayar</label>
                    <input type="number" min="1" max="12" name="total_month"
                        class="form-control @error('total_month') is-invalid @enderror" id="total_month"
                        value="{{ old('total_month') }}" required>
                    <div class="invalid-feedback d-none" id="alert-input-month"></div>
                    @error('total_month')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="from_date" class="form-label">Dari</label>
                    <div class="input-group flex-column flex-lg-row">
                        <div class="d-flex flex-row w-100 w-lg-50 mb-3 mb-lg-0">
                            <span class="input-group-text">Bulan</span>
                            <select class="form-select @error('month_from') is-invalid @enderror" name="month_from"
                                id="month_from" required>
                                @foreach ($months as $month)
                                    @if (old('month_from') == $month['id'])
                                        <option value="{{ $month['id'] }}" selected>{{ $month['name'] }}</option>
                                    @else
                                        <option value="{{ $month['id'] }}">{{ $month['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-row w-100 w-lg-50">
                            <span class="input-group-text">Tahun</span>
                            <select class="form-select @error('year_from') is-invalid @enderror" name="year_from"
                                id="year_from" required>
                                <option value="2022" selected>2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                    </div>
                    @error('month_from')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('year_from')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="to_date" class="form-label">Sampai</label>
                    <div class="input-group flex-column flex-lg-row">
                        <div class="d-flex flex-row w-100 w-lg-50 mb-3 mb-lg-0">
                            <span class="input-group-text">Bulan</span>
                            <select class="form-select @error('month_to') is-invalid @enderror" name="month_to"
                                id="month_to" required>
                                @foreach ($months as $month)
                                    @if (old('month_to') == $month['id'])
                                        <option value="{{ $month['id'] }}" selected>{{ $month['name'] }}</option>
                                    @else
                                        <option value="{{ $month['id'] }}">{{ $month['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-row w-100 w-lg-50">
                            <span class="input-group-text">Tahun</span>
                            <select class="form-select @error('year_to') is-invalid @enderror" name="year_to" id="year_to"
                                required>
                                <option value="2022" selected>2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                    </div>
                    @error('month_to')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('year_to')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endif

            <div class="mb-3">
                <label for="fk_id_kind_paymentlogs"
                    class="form-label @error('fk_id_kind_paymentlogs') is-invalid @enderror">Jenis Pembayaran</label>
                @if ($kindpaymentlogs->count() > 0)
                    <select class="form-select" name="fk_id_kind_paymentlogs" id="fk_id_kind_paymentlogs" required>
                        @foreach ($kindpaymentlogs as $kindpaymentlog)
                            @if (old('fk_id_kind_paymentlogs') == $kindpaymentlog->id)
                                <option class="{{ $kindpaymentlog->need_image ? 'true' : 'false' }}"
                                    value="{{ $kindpaymentlog->id }}" selected>{{ $kindpaymentlog->name }}</option>
                            @else
                                <option class="{{ $kindpaymentlog->need_image ? 'true' : 'false' }}"
                                    value="{{ $kindpaymentlog->id }}">{{ $kindpaymentlog->name }}</option>
                            @endif
                        @endforeach
                    </select>
                @else
                    <div class="form-control is-invalid">Tidak ada data. Tambah data jenis pembayaran dahulu <a
                            href="{{ route($kindpaymentlogs_route['index']) }}">disini</a></div>
                @endif
                @error('fk_id_kind_paymentlogs')
                    <div class="invalid-feedback">
                        {!! $message !!}
                    </div>
                @enderror
            </div>

            <div class="mb-3 d-none" id="input-proof-payment">
                <label for="proof_payment" class="form-label">Bukti Pembayaran</label>
                <span>
                    <img class="img-preview img-fluid mb-3 p-0 border-1 border-primary d-none" id="image-preview"
                        style="border: solid">
                </span>
                <input class="form-control @error('proof_payment') is-invalid @enderror" type="file"
                    id="proof_payment" name="proof_payment" accept="image/*">
                @error('proof_payment')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>




            {{-- <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="basicSelect">
                    <option>user</option>
                    <option>admin</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password">
            </div>
            <a href="{{ route('dashboard.home') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button> --}}
        </form>
    </div>
    <script>
        const inputmember = document.getElementById("fk_id_member");
        let urlajax = "{{ route('member.index') }}";

        inputmember.addEventListener("input", () => {
            // console.log(inputmember.value)
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let data = JSON.parse(xhr.responseText);
                    console.log(data.data)
                }
            };

            xhr.open("GET", urlajax + "/get/" + inputmember.value, true);

            xhr.send();
        })

        const inputKindPayment = document.getElementById("fk_id_kind_paymentlogs");
        const inputImageContainer = document.getElementById("input-proof-payment");
        const inputImage = document.querySelector("#proof_payment");
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

        function showOrHiddenInputImage(elementInput, elementContainer) {
            if (elementInput.selectedOptions[0].className == "true") {
                elementContainer.classList.remove("d-none")
                if (inputImage.files[0] != null) {
                    displayInputImage()
                }
            } else {
                previewImage.classList.add("d-none")
                previewImage.src = ""
                elementContainer.classList.add("d-none")
                inputImage.value = null;
            }
        }

        showOrHiddenInputImage(inputKindPayment, inputImageContainer)

        inputKindPayment.addEventListener("change", (e) => {
            showOrHiddenInputImage(e.target, inputImageContainer)
        })

        inputImage.addEventListener("change", displayInputImage)

        const inputTotalMonth = document.querySelector("#total_month");
        const inputFromMonth = document.querySelector("#month_from");
        const inputToMonth = document.querySelector("#month_to");
        const alertInputMonth = document.querySelector("#alert-input-month");

        inputTotalMonth.addEventListener("input", (e) => {
            if (inputTotalMonth.value == "") {
                alertInputMonth.classList.add("d-none");
                alertInputMonth.classList.remove("d-block");
            } else {
                if (inputTotalMonth.value > 0 && inputTotalMonth.value <= 12) {
                    alertInputMonth.classList.add("d-none");
                    alertInputMonth.classList.remove("d-block");
                    if (parseInt(inputFromMonth.value) + parseInt(inputTotalMonth.value) > 12) {
                        inputToMonth.value = parseInt(inputFromMonth.value) + parseInt(inputTotalMonth.value) - 12
                    } else {
                        inputToMonth.value = parseInt(inputFromMonth.value) + parseInt(inputTotalMonth.value)
                    }
                } else {
                    alertInputMonth.classList.remove("d-none");
                    alertInputMonth.classList.add("d-block");
                    alertInputMonth.innerHTML = "The total month must be between 1 and 12";
                }
            }
        })

        inputToMonth.addEventListener("input", () => {
            if (parseInt(inputToMonth.value) - parseInt(inputFromMonth.value) <= 0) {
                inputTotalMonth.value = 12 + (parseInt(inputToMonth.value) - parseInt(inputFromMonth.value))
            } else {
                inputTotalMonth.value = parseInt(inputToMonth.value) - parseInt(inputFromMonth.value)
            }
        })
    </script>
@endsection
