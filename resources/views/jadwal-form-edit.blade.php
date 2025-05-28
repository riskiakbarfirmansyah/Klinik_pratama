<title>Ubah Jadwal</title>
@include('partials.navdashboard')

@if ($errors->any())
    @foreach ($errors->all() as $item)
        <div class="alert alert-danger" role="alert">
            {{ $item }}
        </div>
    @endforeach
@endif  

<div class="container">
    <h1>Perubahan Jadwal</h1>
    <br>
    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Hari -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hari</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="hari" value="{{ old('hari', $jadwal->hari) }}">
            </div>
        </div>

        <!-- Jam -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jam</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="jam" value="{{ old('jam', $jadwal->jam) }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="/jadwal" class="btn btn-warning">Batal</a>
            </div>
        </div>
    </form>
</div>
