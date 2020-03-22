@if ($message = Session::get('success'))
    <div class="fd_success" data-flashdata="{{ $message }}"></div>
@endif

@if ($message = Session::get('error'))
    <div class="fd_error" data-flashdata="{{ $message }}"></div>
@endif

@if ($message = Session::get('warning'))
    <div class="fd_warning" data-flashdata="{{ $message }}"></div>
@endif

@if ($message = Session::get('info'))
    <div class="fd_info" data-flashdata="{{ $message }}"></div>
@endif
