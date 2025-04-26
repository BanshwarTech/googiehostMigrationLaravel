@foreach ($data->faqSection as $index => $faqSection)
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading{{ $faqSection->id }}">
            <button class="accordion-button border-bottom-0 pb-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse{{ $faqSection->id }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                aria-controls="collapse{{ $faqSection->id }}">
                {!! $faqSection->question !!}
            </button>
        </h2>
        <div id="collapse{{ $faqSection->id }}"
            class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }} border-top-0"
            aria-labelledby="heading{{ $faqSection->id }}" data-bs-parent="#accordionExample0">
            <div class="accordion-body">
                {!! $faqSection->answer !!}
            </div>
        </div>
    </div>
@endforeach
