<div>
    @foreach($doctors as $doctor)
    <a href="#"
       wire:click.prevent="selectDoctor({{ $doctor->id }})"
       class="list-group-item list-group-item-action d-flex align-items-center {{ $selectedDoctor == $doctor->id ? 'active' : '' }}">
        <div class="mr-3">
            <div class="avatar-circle">
                {{ substr($doctor->name, 0, 1) }}
            </div>
        </div>
        <div>
            <h6 class="mb-1">{{ $doctor->name }}</h6>
            <small class="text-muted">Dokter</small>
        </div>
    </a>
    @endforeach
</div>

<style>
.avatar-circle {
    width: 40px;
    height: 40px;
    background-color: #4e73df;
    border-radius: 50%;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}
</style>
