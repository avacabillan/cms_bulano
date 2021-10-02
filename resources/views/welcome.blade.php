@extends('layout.master')

@section('content')
    <h4 class="form-label text-dark">Tax Types</h4> 
        <div class="row mt-2 me-4 text-dark" name="tax">
            <livewire:taxes />
        </div>
@endsection