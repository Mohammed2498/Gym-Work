<x-admin-layout title="Subscribers">
    <x-slot:action>
        <div class="widgetbar">
            <a class="btn btn-primary-rgba" href="{{route('admin.subscribers.create')}}"><i
                    class="feather icon-plus mr-2"></i>Create</a>
        </div>
    </x-slot:action>
    <x-slot:pageName>
        Add Subscriber
    </x-slot:pageName>
    <x-slot:slot>
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Add Subscriber</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.subscribers.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    @include('admin.subscribers.form')
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

    </x-slot:slot>
</x-admin-layout>
