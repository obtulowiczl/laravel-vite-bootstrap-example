@extends('layout.app')
@section('page-title', 'Bootstrap + Laravel in Vite!!')
@section('page-styles')
    @vite('resources/css/customstyle.css')
@endsection
@section('page-scripts')
<!-- Remember to add your script to vite.config.js -->
@vite('resources/js/page-scripts/customscript.js')
@endsection

@section('content')

<div class="wrapper w-25 m-auto mt-5">
    <div class="card">
        <div class="card-header">
            Bootstrap component test
        </div>
        <div class="card-body">
            <h5 class="card-title text">Try this BootStrap 5 components</h5>
            <div class="my-3 m-auto w-50 alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> It look's like Bootstrap installed with npm works!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>


            <!-- Button trigger modal -->
<div class="text-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Test bootstrap modal
                </button>
    <p class="customstyle">Its paragraph with custom style from resources/css/customstyle.css</p>
</div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection