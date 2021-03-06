@extends('layouts.base')

@section('title', 'Issue generator')

@section('content')
    <link rel="stylesheet" href="/css/darcula.css">

    <div class="row">
        <div class="col s12">
            <h3>Issue generator</h3>
            <p>You can use this tool to generate a special code that will help the developers solve your issue</p>
        </div>
    </div>

    <div class="row">
        <form class="col s12" onsubmit="genJson(); return false;">

            <div class="row">
                <div class="input-field col s12">
                    <input id="description" type="text" class="validate" required>
                    <label for="description">Description: </label>
                    <span class="helper-text" data-error="This field is required" data-success=""></span>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea id="detailedReport" class="materialize-textarea validate" required></textarea>
                    <label for="detailedReport">Detailed report</label>
                    <span class="helper-text" data-error="This field is required" data-success=""></span>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    https://discord.gg/
                    <div class="input-field inline">
                        <input id="inv" type="text" class="validate" pattern="[a-zA-Z0-9-_]+" required>
                        <label for="inv">Server invite</label>
                        <span class="helper-text" data-error="That does not look like a valid discord invite"
                              data-success=""></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <p>List of commands that you ran</p>
                <div class="col s6" id="commandsContainer">
                    <div id="cmd-main">
                        <button class="btn red" onclick="delCMD('cmd-main'); return false;">X</button>
                        <div class="input-field inline">
                            <input name="command" type="text" placeholder="db!help drake" pattern="db![a-z0-9 ]+" class="validate" required>
                            <span class="helper-text" data-error="Invalid command (should start with db!)" data-success=""></span>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <p><button class="btn" onclick="addCommand(); return false;">Add command</button></p>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="submit" class="btn">
                </div>
            </div>

        </form>
    </div>

    <!-- Modal Structure -->
    <div id="modal1" class="modal discord greyple">
        <div class="modal-content">
            <h4 class="black-text">The code for your reported issue</h4>
            <p class="black-text">Copy this code as argument for the <code class="white-text">db!issue</code> command</p>
            <code id="output" class="json"></code>
        </div>
        <div class="modal-footer grey lighten-1">
            <a href="#" class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/js/highlight.pack.js"></script>
    <script src="/js/issues.js?time={!! $timestamp !!}"></script>
@endpush
