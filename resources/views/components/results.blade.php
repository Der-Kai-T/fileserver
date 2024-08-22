{{--    Operation Result Area --}}
@if (session()->has('success'))
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-success">
                        <div class="card-body ">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            </div>

    </section>
@endif

@if (session()->has('error'))
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-gradient-warning">

                            Fehler: {{ session('error') }}
                            <p>
                                {!!   session('error_details') ?? "" !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

    </section>
@endif

@if ($errors->any())
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        <h3>Bei der Überprüfung wurden folgende Fehler gefunden:</h3>
                        <ul>
                            @php($messages = "")
                            @foreach($errors->all() as $message)
                                @php($messages.=$message."\n")
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
