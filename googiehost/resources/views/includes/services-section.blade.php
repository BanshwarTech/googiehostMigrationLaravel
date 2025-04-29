@foreach ($data->serviceSections as $serviceSections)
    <div class="col-md-6 col-lg-4">
        <div class="feature-card">
            <div class=" mx-auto">
                <img src="{{ asset('storage/uploads/service/' . $serviceSections->image) }}" alt="Extended Security"
                    class="mb-3">
                {!! $serviceSections->title !!}
            </div>
            <div class="card-body">
                {!! $serviceSections->description !!}
                @if (!empty($serviceSections->button_link))
                    <a href="{{ $serviceSections->button_link }}" class="mt-3"
                        style="color: #2b0074;font-weight:bold;font-size:16px;"
                        rel="me">{{ strtoupper($serviceSections->button_text) }} <i
                            class="fa-solid fa-angle-right"></i></a>
                @endif
            </div>
        </div>
    </div>
@endforeach
