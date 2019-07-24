@if (session('success'))
<div class="alert alert-success alert-block">
    <button type="buton" class="close" data-dismiss="alert">x</button>
        <strong> {!! session('success') !!} </strong>
</div>
@endif