<x-admin-layout title="Subscribers">
    <x-slot:action>
        <div class="widgetbar">
            <a class="btn btn-primary-rgba" href="{{ route('admin.subscribers.create') }}"><i
                    class="feather icon-plus mr-2"></i>Create</a>
        </div>
    </x-slot:action>
    <x-slot:pageName>
        Home
    </x-slot:pageName>
    <x-slot:slot>
        <div class="container">
            <h1>Home</h1>
            <div>
                <h3>Total Subscribers: {{ $totalSubscribers }}</h3>
                <h3>Active Subscribers: {{ $activeSubscribers }}</h3>
                <h3>Expired Subscribers: {{ $expiredSubscribers }}</h3>
                <h3>Not Subscribed Subscribers: {{ $notSubscribedSubscribers }}</h3>
            </div>
        </div>
    </x-slot:slot>
</x-admin-layout>
