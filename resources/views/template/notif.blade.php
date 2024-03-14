    <div class="notif">
        <img src="{{ asset('assets/img/icons-notification.png') }}" class="ms-4 icon-img" alt="" />
        @if ($c_notif != 0)
            <div class="notif-count">{{ $c_notif }}</div>
        @endif
        <div class="container-notif">
            <div class="container">
                @forelse ($dt_notifikasi as $notif)
                    <div class="row li-notif d-flex justify-content-center pt-3 pb-3 align-items-center">
                        <div class="col">
                            <p class="fs-7">{{ $notif->waktu_notif }}</p>
                            <p class="fs-8">{{ $notif->judul }}</p>
                        </div>
                    </div>
                @empty
                    <div class="row li-notif d-flex justify-content-center pt-3 pb-3 align-items-center">
                        <div class="col">
                            <p class="fs-8">Tidak ada notifikasi terbaru.</p>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
