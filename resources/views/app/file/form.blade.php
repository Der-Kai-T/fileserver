@extends("layouts.main")

@section("content")
    <h1>Dokumente verwalten</h1>

    <?php
    if (!isset($file)) {
        $file = new \App\Models\File();
        $h3 = "neues Dokument hochladen";
        $action = "/edit/file";
        $patch = false;
    } else {
        $h3 = "Dokument $file->title bearbeiten";
        $action = "/edit/file/$file->id";
        $patch = true;
    }
    ?>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($patch)
                        @method('PATCH')
                    @endif

                    <div class="card-header">
                        {{ $h3 }}
                    </div>
                    <div class="card-body">
                        <x-form.input
                            name="title"
                            label="Bezeichnung / Titel"
                            value="{{ $file->title }}"
                            required
                            />

                        @if(!$patch)
                        <x-form.input
                            name="file"
                            label="Datei auswählen"
                            type="file"
                            required
                            />

                        @endif

                        <x-form.textarea
                            name="note"
                            label="Beschreibung"
                            value="{{ $file->note }}"
                            />
                    </div>
                    <div class="card-footer">
                        <x-form.submit/>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($patch)
        <x-delete-section
        name="Dokument"
        action="/edit/file/{{$file->id}}"
        />
    @endif
@endsection
