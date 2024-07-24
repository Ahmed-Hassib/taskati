<div>
    @if ($alertType && $message)
        <x-alert :alert-type="$alertType" :message="$message" />
    @endif
</div>

@script
    <script>
        $wire.on('taskUpdated', removeAlert);
        $wire.on('taskInserted', removeAlert);

        function removeAlert() {
            setTimeout(() => {
                document.querySelector('#toast-container').remove();
            }, 5000);
        }
    </script>
@endscript
