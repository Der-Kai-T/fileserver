<div class="row mt-2">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <span class="btn btn-warning" onclick="$('#delete_form').show()"><span class="fas fa-trash mr-2"> </span> {{$name}} löschen</span>
            </div>

            <div class="card-body" id="delete_form" style="display:none">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="btn btn-danger float-right"
                    >
                        <span class="fas fa-exclamation-triangle mr-3"></span>
                        {{ $name }} und alle Verbindungen dazu endgültig löschen
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>
