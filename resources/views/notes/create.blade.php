@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create your note</div>

                <div class="card-body">
                    <form method="POST" action="/note/store">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <label for="text">
                                        Note text
                                </label>
                                <input class="form-text-input" type="text" name="text" id="text">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
