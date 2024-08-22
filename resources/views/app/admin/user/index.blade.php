@extends("layouts.main")

@section("title")
    Benutzer
@endsection
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="/user/create">neuen Benutzer anlegen</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>E-Mail</th>
                            <th>Name</th>
                            <th>Berechtigungen</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $u)
                            <tr>
                                <td>
                                    @if($u->disabled)
                                        <span style="color: red">DEAKTIVIERT</span>
                                    @endif
                                    {{ $u->email }}


                                </td>
                                <td>
                                    {{ $u->name }}
                                </td>
                                <td>
                                    <ul>
                                        @foreach($u->roles as $role)
                                            <li>{{ $role->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                   <a href="/user/{{$u->id}}/edit"> bearbeiten </a>
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
