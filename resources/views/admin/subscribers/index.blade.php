<x-admin-layout title="Subscribers">
    <x-slot:action>
        <div class="widgetbar">
            <a class="btn btn-primary-rgba" href="{{ route('admin.subscribers.create') }}"><i
                    class="feather icon-plus mr-2"></i>Create</a>
        </div>
    </x-slot:action>
    <x-slot:pageName>
        Subscribers
    </x-slot:pageName>
    <x-slot:slot>
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Subscribers</h5>
                </div>
                <div class="card-body">
                    <x-flash-message/>
                    <div class="table-responsive">
                        <table id="default-datatable" class="display table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Image</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($subscribers as $key => $subscriber)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $subscriber->name }}</td>
                                    <td>{{ $subscriber->phone }}</td>
                                    <td><img src="{{ asset('storage/' . $subscriber->image) }}" width="60px"
                                             height="60px">
                                    </td>

                                    <td>
                                        @if ($subscriber->subscription)
                                            {{ \Carbon\Carbon::parse($subscriber->subscription->start_date)->format('Y-m-d') ?? '' }}
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        @if ($subscriber->subscription)
                                            {{ \Carbon\Carbon::parse($subscriber->subscription->end_date)->format('Y-m-d') ?? '' }}
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        @if ($subscriber->subscription)
                                            {{ $subscriber->subscription->duration_in_months ?? '' }} Months
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        @if ($subscriber->subscription)
                                            @if ($subscriber->subscription->status == 'active')
                                                <span class="badge badge-success">Active</span>
                                            @elseif ($subscriber->subscription->status == 'expired')
                                                <span class="badge badge-danger">Expired</span>
                                            @else
                                                <span
                                                    class="badge badge-primary">{{ $subscriber->subscription->status }}</span>
                                            @endif
                                        @else
                                            <span class="badge badge-secondary">Not Subscribed</span>
                                        @endif
                                    </td>
                                    <td class="row">
                                        <a href="{{ route('admin.subscribers.edit', $subscriber->id) }}"
                                           class="btn btn-round btn-warning"><i
                                                class="feather icon-upload"></i></a>
                                        <form action="{{ route('admin.subscribers.destroy', $subscriber->id) }}"
                                              method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-round btn-danger"><i
                                                    class="feather icon-trash-2"></i>
                                            </button>
                                        </form>
                                        @if ($subscriber->subscription)
                                            @if ($subscriber->subscription->status == 'active')
                                                <!-- Hide the "Subscribe" button -->
                                            @elseif ($subscriber->subscription->status == 'expired')
                                                <a href="" class="btn btn-primary-rgba"><i
                                                        class="feather icon-send mr-2"></i>Renew</a>
                                            @endif
                                        @else
                                            <a href="{{ route('admin.subscriptions.create', $subscriber->id) }}"
                                               class="btn btn-success-rgba"><i
                                                    class="feather icon-plus mr-2"></i>Subscribe</a>
                                        @endif
                                        <!-- Add the dropdown button -->
                                        @if($subscriber->subscription)
                                            <div class="btn-group mr-2">
                                                <div class="dropdown show">
                                                    <button class="btn btn-round btn-primary-rgba " type="button"
                                                            id="CustomdropdownMenuButton3" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="true"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu"
                                                         aria-labelledby="CustomdropdownMenuButton3"
                                                         x-placement="bottom-start"
                                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                                        <form
                                                            action="{{ route('admin.subscriptions.destroy', $subscriber->subscription->id) ??'' }}"
                                                            method="POST" onsubmit="return confirm('Are you sure?');"
                                                        >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item">
                                                                Delete Subscription
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
