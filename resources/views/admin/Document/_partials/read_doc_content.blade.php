<div class="container">
    <div class="row">
        <div class="col-12">
            <h4>Document Detail : Uploaded under case {{ $doc->caseStaffAssignemnt->case->case_number }} on
                {{ $doc->date_filed }}</h4>
        </div>
        <div class="col-12">
            <hr>
        </div>
        <div class="col-12" title="{{ $doc->doc_storage_path }}" style="min-height: 400px;">
            @php
                $pathhh = '/storage' . '/' . $doc->doc_storage_path;
                $extension = File::extension($pathhh);
            @endphp
            @if (in_array($extension, ['jpg', 'png']))
                <img alt="document" src="{{ asset($pathhh) }}" class="card-img-top img-card">
            @else
                <embed src="{{ asset($pathhh) }}" type="text/pdf" width="100%" height="100%">
            @endif

        </div>
    </div>
</div>
