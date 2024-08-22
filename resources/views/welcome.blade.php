@extends("layouts.main")
<?php

$files = \App\Models\File::all();
?>

@section("content")
    <h1>Willkommen {{ auth()->user()->name }}</h1>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Freigegebene Dokumente
                </div>

                <div class="card-body">
                    @foreach($files->sortBy("title") as $file)
                        <div class="card mt-2">
                            <div class="card-header">
                                {{ $file->title }}
                            </div>
                            @if(!is_null($file->note) && strlen($file->note)>3)
                                <div class="card-body">
                                    @foreach(explode("/n", $file->note) as $note)
                                        <p>{{ $note }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <div class="card-footer">
                                <a href="/file/{{$file->id}}" class="btn btn-outline-dark"><span class="fas fa-file-pdf"></span>  Dokument herunterladen</a>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
