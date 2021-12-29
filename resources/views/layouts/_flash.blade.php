@if (session()->has('flash_notification.message')) <div class="container"></div>
<div class="alter alter-{{ session()->get('flash_notification.message')}}">
    <button type="button" class="close" data-dismiss="alter" aria-hidden="true">&time;</button>
    { !! session()->get('flash_notification.message') !!}
</div>
@endif