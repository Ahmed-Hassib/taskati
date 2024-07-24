{{ $alertType }}

<div id="toast-container" class="toast-container toastr toast-top-right">
    <div class="toast toast-{{ $alertType }}" aria-live="polite" style="display: block;">
        <button type="button" class="toast-close-button" role="button">×</button>
        <div class="toast-title">{{ $message }}</div>
    </div>
</div>

<script>
    setTimeout(() => {
        document.querySelector('#toast-container').remove();
    }, 5000);
</script>
