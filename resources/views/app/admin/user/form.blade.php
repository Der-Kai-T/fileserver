@extends("layouts.main")

@section("title")
    Benutzer
@endsection

<?php
if (isset($user)) {
    $action = "/user/" . $user->id;
    $patch = true;
    $h3 = "Benutzer $user->name bearbeiten";

} else {
    $user = new \App\Models\User();
    $action = "/user";
    $patch = false;
    $h3 = "neuen Benutzer anlegen";
}
?>

@section("content")

    <div class="row mt-2">
        <div class="col-12">

            <div class="card">
                <form action="{{ $action }}" method="POST">
                    <div class="card-body">

                        @csrf


                        <div class="row">
                            <div class="col-12">
                                <x-form.input
                                    name="name"
                                    label="Name"
                                    value="{{ $user->name }}"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <x-form.input
                                    name="email"
                                    label="E-Mail-Adresse"
                                    type="email"
                                    value="{{ $user->email }}"
                                    required
                                />
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <x-form.submit/>
                    </div>
                </form>

            </div>
        </div>

    </div>

    @if($patch)

        <div class="row mt-2">
            <div class="col-12">
                <form action="/user/{{$user->id}}/password" method="POST"
                >
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            Passwort ändern
                        </div>

                        <div class="card-body">
                            <x-form.input
                                name="password"
                                label="Passwort"
                                type="password"
                                required
                            />
                            <x-form.input
                                name="password_confirmation"
                                label="Passwort wiederholen"
                                type="password"
                                required
                            />
                        </div>
                        <div class="card-footer">
                            <x-form.submit/>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <x-delete-section
            action="/user/{{$user->id}}"
            name="Benutzer"
        />


        <div class="row mt-2">
            <div class="col-6">
                <div class="card">
                        <?php
                        $roles = \App\Models\Role::all();
                        $assigned_roles = [];
                        ?>

                    <div class="card-body">
                        <form action="/user/{{$user->id}}/role_remove" method="POST">
                            @csrf
                            <label class="col-form-label" for="name">zugewiesene Rollen</label>
                            <select multiple required name="name[]" id="name" class="form-control" size="10">
                                @foreach($user->roles->sortBy("name") as $role)
                                    @php($assigned_roles[] = $role->name)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>

                                @endforeach
                            </select>
                            <x-form.submit class="bg-info mt-2" text="Berechtigung entfernen >>>"/>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">


                    <div class="card-body">
                        <form action="/user/{{$user->id}}/role_assign" method="POST">
                            @csrf

                            <label class="col-form-label" for="name">verfügbare Berechtigungen</label>
                            <select multiple required name="name[]" id="name" class="form-control" size="10">
                                @foreach($roles->sortBy("name") as $role)
                                    @if(!in_array($role->name, $assigned_roles))
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <x-form.submit class="bg-info mt-2" text="<<< Berechtigung erteilen"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection
