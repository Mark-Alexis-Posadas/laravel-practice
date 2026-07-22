@props(['title', 'count', 'icon', 'color' => 'primary'])

<div class="col-md-3">
    <div class="card border-0 shadow-sm h-100 dashboard-card">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-muted text-uppercase">
                        {{ $title }}
                    </small>

                    <h2 class="fw-bold mb-0 mt-2">
                        {{ number_format($count) }}
                    </h2>

                </div>

                <div class="rounded-circle bg-{{ $color }} bg-opacity-10 text-{{ $color }}
                    d-flex align-items-center justify-content-center"
                    style="width:65px;height:65px;">

                    <i class="bi {{ $icon }} fs-3"></i>

                </div>

            </div>

        </div>

    </div>
</div>
