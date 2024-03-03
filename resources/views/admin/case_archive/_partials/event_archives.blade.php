@php
    $archives = $event->archives()->where('file_path', '<>', null)->get();
@endphp

@if ($archives)
    <div class="row">
        <div class="col-12">
            <h4 class="text-info bg-secondary p-4">Archives submitted for case schedule held on {{ $event->getDate() }}
                for
                {{ $event->eventType->event_type_name }}</h4>
        </div>
        @foreach ($archives as $archive)
            <div class="col-12">
                <div class="card">
                    <div class="card-header p-2">
                        Archive File Type: {{ $archive->file_type }}
                    </div>
                    <div class="card-body">
                        <div class="container-fluid" style="overflow: auto;">
                            @if ($archive->file_type == 'image')
                                <img src="{{ asset('/storage' . '/' . $archive->file_path) }}" class="img-fluid"
                                    style="width: 350px; height:auto">
                            @elseif($archive->file_type == 'doc')
                                <embed src="{{ asset('/storage' . '/' . $archive->file_path) }}" type="text/document"
                                    style="width: 100%; height: auto;">
                            @elseif ($archive->file_type == 'audio')
                                <audio src="{{ '/storage' . '/' . $archive->file_path }}" controls></audio>
                            @elseif ($archive->file_type == 'vedio')
                                <video src="{{ '/storage' . '/' . $archive->file_path }}" controls></video>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <small class="text-muted text-right">Uploaded By
                                <b>{{ $archive->archivedBy->user_name }}</b> on
                                <b>{{ date('d/m/Y', $archive->archived_at) }}</b></small>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
    </div>
@else
    <p class="bg-warning p-2">None</p>
@endif
