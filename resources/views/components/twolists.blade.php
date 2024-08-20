<div {{ $attributes->class(['row']) }}>
    <div class="col-6">
        <div class="card">
            <?php
                $assigned = [];
            ?>

            <div class="card-body">
                <form action="{{$action}}_remove" method="POST">
                    @csrf
                    <label class="col-form-label" for="id">zugewiesene {{$label}}</label>
                    <select multiple required name="id[]" id="id" class="form-control" size="10">
                        @foreach($references->sortBy($sortBy) as $ref)
                            @php($assigned[] = $ref->$key)
                            <option value="{{ $ref->$key }}">{{ $ref->$value }}</option>

                        @endforeach
                    </select>
                    <x-dc.admin.form.submit class="bg-info mt-2" text="{{$label}} entfernen >>>"/>
                </form>

            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">


            <div class="card-body">
                <form action="{{$action}}_add" method="POST">
                    @csrf

                    <label class="col-form-label" for="id">verfügbare {{$label}}</label>
                    <select multiple required name="id[]" id="id" class="form-control" size="10">
                        @foreach($all->sortBy($sortBy) as $a)
                            @if(!in_array($a->$key, $assigned))
                                <option value="{{ $a->$key }}">{{ $a->$value }}</option>
                            @endif
                        @endforeach
                    </select>
                    <x-dc.admin.form.submit class="bg-info mt-2" text="<<< {{$label}} zuweisen"/>
                </form>
            </div>
        </div>
    </div>
</div>
