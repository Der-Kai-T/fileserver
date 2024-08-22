@extends("layouts.main")

@section("content")
    <h1>Dokumente verwalten</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Liste aller Dokumente
                    @can("file.upload")
                        <a href="/edit/file/create">neue Datei anlegen</a>
                        @endcan
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th>Titel</th>
                            <th>Datei</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files->sortBy("title") as $file)
                            <tr>
                                <td>
                                    {{ $file->title }}
                                </td>
                                <td>
                                    {{ $file->file_name }}
                                </td>
                                <td>
                                    <x-edit-link href="/edit/file/{{$file->id}}/edit"/>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
