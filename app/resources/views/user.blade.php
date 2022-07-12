@extends('layout')

<h1 class="text-center">Welcome</h1>
@section('content')
    <div class="d-flex justify-content-center">
        <input type="hidden" id="userid" name="user_id" value="{{ $userID }}">
        <input type="hidden" id="tokenid" name="token_id" value="{{ $tokenID }}">
        <button id="game-button">I'm feeling lucky</button>
        <button id="history-button">History</button>
        <button id="generate-button">Generate new link</button>
        <button id="deactivate-current-link">Deactivate current active link</button>
    </div>
    <div class="d-flex justify-content-center mt-5">
        <table style="width: 100%; text-align: center; color: #fff;">
            <tr>
                <td>Number</td>
                <td>Result</td>
                <td>Prize</td>
            </tr>
            <tr>
                <td><span id="result-number-container"></span></td>
                <td><span id="result-container"></span></td>
                <td><span id="result-prize-container"></span></td>
            </tr>
        </table>
    </div>
@endsection

@section('modals')
    <!-- Modal -->
    <div class="modal fade" id="history-modal" tabindex="-1" role="dialog" aria-labelledby="history" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="history-table-wrapper" class="modal-body">

                </div>
            </div>
        </div>
    </div>

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
