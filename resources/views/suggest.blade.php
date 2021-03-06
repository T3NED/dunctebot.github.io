@extends('layouts.base')

@section('title', 'Leave a suggestion')

@section('content')
    <div id="message" style="display: none;" class="row col s5">
        <h1></h1>
    </div>

    <div class="row col s12 flow-text">
        <div class="rowInner">
            <h3>Suggestions</h3>
            <div class="divider"></div>
            <p>If you feel that the bot is missing a feature why not suggest it here?</p>
            <p>Make sure to check our <a href="https://trello.com/b/iSaxpcGR/skybot-suggestions" target="_blank">Trello
                    board</a> to see if someone already suggested your idea and join <a href="{!! $guildInvite !!}" target="_blank">our discord</a> so we can contact you if needed.</p>

            <form id="quotesForm" onsubmit="return false;" method="post" autocomplete="off">
                <div class="input-field">
                    <input type="text" pattern=".*#[0-9]{4}" class="input-field validate" name="name" id="name"
                           required/>
                    <label for="name">Your (user)name</label>
                    <span class="helper-text" data-error="A discord tag usually contains a # (example duncte123#1245)"
                          data-success=""></span>
                </div>

                <div class="input-field">
                    <input type="text" class="input-field validate " name="sug" data-length="100" maxlength="100"
                           id="sug" required/>
                    <label for="sug">Your suggestion</label>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" name="desc" class="materialize-textarea validate "></textarea>
                        <label for="textarea1">Better explanation</label>
                    </div>
                </div>

                <button class="btn waves-effect waves-light waves-ripple blue accent-4 h-captcha"
                        data-sitekey="{!! env('HCAPTCHA_KEY') !!}"
                        data-callback="makeSuggestion">Submit
                </button>
                <span id="msg" class="fadeOut"></span>
            </form>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
    <script src="/js/suggest.js?time={!! $timestamp !!}"></script>
@endpush
