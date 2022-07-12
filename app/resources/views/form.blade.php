@extends('layout')

<h1 class="text-center">Registration</h1>
@section('content')
    <form class="d-flex" id="register-form">
        <div class="col">
            <div class="mb-5">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="username-help"
                    placeholder="Please enter username">
                <small id="username-help" class="form-text fst-italic"></small>
            </div>
            <div class="mb-3">
                <label for="phonenumber" class="form-label">Phone number</label>
                <input type="text" class="form-control" name="phonenumber" id="phonenumber"
                    aria-describedby="phonenumber-help" placeholder="Please enter your phone number">
                <small id="phonenumber-help" class="form-text fst-italic"></small>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

        @csrf
    </form>
@endsection

@section('modals')
    <!-- Modal -->
    <div class="modal fade" id="link-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">URL</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Body
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="url" id="copy-field" placeholder=""
                            aria-label="" value="" disabled>
                        <span class="input-group-btn">
                            <button id="clipboard-copy-button" class="btn btn-secondary" type="button"
                                aria-label="">Copy</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
