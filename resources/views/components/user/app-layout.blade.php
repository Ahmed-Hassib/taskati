<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    {{-- user navbar --}}
    <x-user.app-navbar />

    {{-- Main wrapper --}}
    <div class="body-wrapper">
        {{-- user app header --}}
        <x-user.app-header />
        {{-- content slot --}}
        {{ $slot }}
    </div>
</div>



@if (session('success') || $errors->any())
    <livewire:alert alert-type="{{ session('success') ? 'success' : 'error' }}" :message="session('success') ?? $errors->first('error')" />
@endif

<livewire:alert />

