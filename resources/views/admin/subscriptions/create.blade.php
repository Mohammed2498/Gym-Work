<x-admin-layout title="Add Subscription">
    <x-slot:action>
    </x-slot:action>
    <x-slot:pageName>
        Add Subscription
    </x-slot:pageName>
    <x-slot:slot>

                <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Subscriber</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.subscriptions.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.subscriptions.form')
                        <button class="btn btn-primary">Subscribe</button>
                        <a href="{{route('admin.subscribers.index')}}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </x-slot:slot>
</x-admin-layout>
