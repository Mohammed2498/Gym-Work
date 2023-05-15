<x-admin-layout title="Subscribers">
    <x-slot:action>
        <div class="widgetbar">
            <a class="btn btn-primary-rgba" href="{{route('admin.subscribers.create')}}"><i
                    class="feather icon-plus mr-2"></i>Create</a>
        </div>
    </x-slot:action>
    <x-slot:pageName>
        Subscribers
    </x-slot:pageName>
    <x-slot:slot>

        <div class="col-lg-10">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Subscribers</h5>
                </div>
                <div class="card-body">
                    <x-flash-message/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribers as $key=> $subscriber)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$subscriber->name}}</td>
                                    <td>{{$subscriber->phone}}</td>
                                    <td><img src="{{asset('storage/' . $subscriber->image) }}" width="60px"
                                             height="60px">
                                    </td>
                                    <td>
                                        <a href="{{route('admin.subscribers.edit',$subscriber->id)}}"
                                           class="btn btn-round btn-warning"><i class="feather icon-upload"></i></a>
                                        <form action="{{route('admin.subscribers.destroy',$subscriber->id)}}"
                                              method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-round btn-danger"><i
                                                    class="feather icon-trash-2"></i>
                                            </button>
                                        </form>
                                        <a href="{{route('admin.subscriptions.create',$subscriber->id)}}"
                                           class="btn btn-primary">Subscribe</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:slot>
</x-admin-layout>

