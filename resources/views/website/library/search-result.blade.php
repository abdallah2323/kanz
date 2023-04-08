@if ($libs->count() > 0)

    <div class="row">
        @foreach ($libs as $lib)
            <div class="col-lg-4 col-sm-6 mb-5">
                <a href="{{ route('file-page', $lib->id) }}" class="a-1">
                    <div class="box">
                        <img src="{{ asset('project/website/img/library.jpg') }}" alt="" class="library" />
                        <p class="p-7 mb-0">{{ $lib->attachment_name }}</p>
                    </div>
                </a>
            </div>
        @endforeach

        @else

        <div class="col-md-12 my-5 text-center">
            <h2>لا يوجد شيء لعرضه</h2>
        </div>
    </div>

@endif
