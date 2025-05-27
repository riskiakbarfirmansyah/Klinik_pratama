<title>Jadwal Praktek Baru</title>
@include('partials.navdashboard')

@if ($errors->any())
    @foreach ($errors->all() as $item)
        <div class="alert alert-danger" role="alert">
            {{ $item }}
        </div>
    @endforeach
@endif

<div class="container">
    <h1>Jadwal Praktek Baru</h1>
    <br>
    <form action="{{ route('jadwal.store') }}" method="post">
        @csrf

        <!-- Hari -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hari</label>
            <div class="col-sm-7">
                <input type="text" class="form-control @error('hari') is-invalid @enderror" name="hari"
                    placeholder="Contoh: Senin" value="{{ old('hari') }}">
                @error('hari')
                    <div class="invalid-feedback">Hari masih kosong</div>
                @enderror
            </div>
        </div>

        <!-- Jam Mulai -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jam Mulai</label>
            <div class="col-sm-7">
                <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai"
                    value="{{ old('jam_mulai') }}">
                @error('jam_mulai')
                    <div class="invalid-feedback">Jam mulai masih kosong</div>
                @enderror
            </div>
        </div>

        <!-- Jam Selesai -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jam Selesai</label>
            <div class="col-sm-7">
                <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" name="jam_selesai"
                    value="{{ old('jam_selesai') }}">
                @error('jam_selesai')
                    <div class="invalid-feedback">Jam selesai masih kosong</div>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="/jadwal" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </form>
</div>
