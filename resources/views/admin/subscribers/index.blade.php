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
                        <table class="table">
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

{{--        <div class="col-lg-12">--}}
{{--            <div class="card m-b-30">--}}
{{--                <div class="card-header">--}}
{{--                    <h5 class="card-title">Default Data Table</h5>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <div id="default-datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12 col-md-6">--}}
{{--                                    <div class="dataTables_length" id="default-datatable_length"><label>Show <select--}}
{{--                                                name="default-datatable_length" aria-controls="default-datatable"--}}
{{--                                                class="form-control form-control-sm">--}}
{{--                                                <option value="10">10</option>--}}
{{--                                                <option value="25">25</option>--}}
{{--                                                <option value="50">50</option>--}}
{{--                                                <option value="100">100</option>--}}
{{--                                            </select> entries</label></div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-12 col-md-6">--}}
{{--                                    <div id="default-datatable_filter" class="dataTables_filter"><label>Search:<input--}}
{{--                                                type="search" class="form-control form-control-sm" placeholder=""--}}
{{--                                                aria-controls="default-datatable"></label></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12">--}}
{{--                                    <table id="default-datatable"--}}
{{--                                           class="display table table-striped table-bordered dataTable dtr-inline"--}}
{{--                                           role="grid" aria-describedby="default-datatable_info" style="width: 754px;">--}}
{{--                                        <thead>--}}
{{--                                        <tr role="row">--}}
{{--                                            <th class="sorting" tabindex="0" aria-controls="default-datatable"--}}
{{--                                                rowspan="1" colspan="1" style="width: 110.8px;"--}}
{{--                                                aria-label="Name: activate to sort column ascending">Name--}}
{{--                                            </th>--}}
{{--                                            <th class="sorting" tabindex="0" aria-controls="default-datatable"--}}
{{--                                                rowspan="1" colspan="1" style="width: 168.8px;"--}}
{{--                                                aria-label="Position: activate to sort column ascending">Position--}}
{{--                                            </th>--}}
{{--                                            <th class="sorting" tabindex="0" aria-controls="default-datatable"--}}
{{--                                                rowspan="1" colspan="1" style="width: 71.8px;"--}}
{{--                                                aria-label="Office: activate to sort column ascending">Office--}}
{{--                                            </th>--}}
{{--                                            <th class="sorting_desc" tabindex="0" aria-controls="default-datatable"--}}
{{--                                                rowspan="1" colspan="1" style="width: 26.8px;" aria-sort="descending"--}}
{{--                                                aria-label="Age: activate to sort column ascending">Age--}}
{{--                                            </th>--}}
{{--                                            <th class="sorting" tabindex="0" aria-controls="default-datatable"--}}
{{--                                                rowspan="1" colspan="1" style="width: 67.8px;"--}}
{{--                                                aria-label="Start date: activate to sort column ascending">Start date--}}
{{--                                            </th>--}}
{{--                                            <th class="sorting" tabindex="0" aria-controls="default-datatable"--}}
{{--                                                rowspan="1" colspan="1" style="width: 55.8px;"--}}
{{--                                                aria-label="Salary: activate to sort column ascending">Salary--}}
{{--                                            </th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <tr role="row" class="odd">--}}
{{--                                            <td tabindex="0">Ashton Cox</td>--}}
{{--                                            <td>Junior Technical Author</td>--}}
{{--                                            <td>San Francisco</td>--}}
{{--                                            <td class="sorting_1">66</td>--}}
{{--                                            <td>2009/01/12</td>--}}
{{--                                            <td>$86,000</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr role="row" class="even">--}}
{{--                                            <td tabindex="0">Michael Silva</td>--}}
{{--                                            <td>Marketing Designer</td>--}}
{{--                                            <td>London</td>--}}
{{--                                            <td class="sorting_1">66</td>--}}
{{--                                            <td>2012/11/27</td>--}}
{{--                                            <td>$198,500</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr role="row" class="odd">--}}
{{--                                            <td tabindex="0">Jackson Bradshaw</td>--}}
{{--                                            <td>Director</td>--}}
{{--                                            <td>New York</td>--}}
{{--                                            <td class="sorting_1">65</td>--}}
{{--                                            <td>2008/09/26</td>--}}
{{--                                            <td>$645,750</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr role="row" class="even">--}}
{{--                                            <td tabindex="0">Paul Byrd</td>--}}
{{--                                            <td>Chief Financial Officer (CFO)</td>--}}
{{--                                            <td>New York</td>--}}
{{--                                            <td class="sorting_1">64</td>--}}
{{--                                            <td>2010/06/09</td>--}}
{{--                                            <td>$725,000</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr role="row" class="odd">--}}
{{--                                            <td tabindex="0">Olivia Liang</td>--}}
{{--                                            <td>Support Engineer</td>--}}
{{--                                            <td>Singapore</td>--}}
{{--                                            <td class="sorting_1">64</td>--}}
{{--                                            <td>2011/02/03</td>--}}
{{--                                            <td>$234,500</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr role="row" class="even">--}}
{{--                                            <td tabindex="0">Serge Baldwin</td>--}}
{{--                                            <td>Data Coordinator</td>--}}
{{--                                            <td>Singapore</td>--}}
{{--                                            <td class="sorting_1">64</td>--}}
{{--                                            <td>2012/04/09</td>--}}
{{--                                            <td>$138,575</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr role="row" class="odd">--}}
{{--                                            <td tabindex="0">Garrett Winters</td>--}}
{{--                                            <td>Accountant</td>--}}
{{--                                            <td>Tokyo</td>--}}
{{--                                            <td class="sorting_1">63</td>--}}
{{--                                            <td>2011/07/25</td>--}}
{{--                                            <td>$170,750</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr role="row" class="even">--}}
{{--                                            <td tabindex="0">Zenaida Frank</td>--}}
{{--                                            <td>Software Engineer</td>--}}
{{--                                            <td>New York</td>--}}
{{--                                            <td class="sorting_1">63</td>--}}
{{--                                            <td>2010/01/04</td>--}}
{{--                                            <td>$125,250</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr role="row" class="odd">--}}
{{--                                            <td tabindex="0">Vivian Harrell</td>--}}
{{--                                            <td>Financial Controller</td>--}}
{{--                                            <td>San Francisco</td>--}}
{{--                                            <td class="sorting_1">62</td>--}}
{{--                                            <td>2009/02/14</td>--}}
{{--                                            <td>$452,500</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr role="row" class="even">--}}
{{--                                            <td tabindex="0">Tiger Nixon</td>--}}
{{--                                            <td>System Architect</td>--}}
{{--                                            <td>Edinburgh</td>--}}
{{--                                            <td class="sorting_1">61</td>--}}
{{--                                            <td>2011/04/25</td>--}}
{{--                                            <td>$320,800</td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                        <tfoot>--}}
{{--                                        <tr>--}}
{{--                                            <th rowspan="1" colspan="1">Name</th>--}}
{{--                                            <th rowspan="1" colspan="1">Position</th>--}}
{{--                                            <th rowspan="1" colspan="1">Office</th>--}}
{{--                                            <th rowspan="1" colspan="1">Age</th>--}}
{{--                                            <th rowspan="1" colspan="1">Start date</th>--}}
{{--                                            <th rowspan="1" colspan="1">Salary</th>--}}
{{--                                        </tr>--}}
{{--                                        </tfoot>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12 col-md-5">--}}
{{--                                    <div class="dataTables_info" id="default-datatable_info" role="status"--}}
{{--                                         aria-live="polite">Showing 1 to 10 of 57 entries--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-12 col-md-7">--}}
{{--                                    <div class="dataTables_paginate paging_simple_numbers"--}}
{{--                                         id="default-datatable_paginate">--}}
{{--                                        <ul class="pagination">--}}
{{--                                            <li class="paginate_button page-item previous disabled"--}}
{{--                                                id="default-datatable_previous"><a href="#"--}}
{{--                                                                                   aria-controls="default-datatable"--}}
{{--                                                                                   data-dt-idx="0" tabindex="0"--}}
{{--                                                                                   class="page-link">Previous</a></li>--}}
{{--                                            <li class="paginate_button page-item active"><a href="#"--}}
{{--                                                                                            aria-controls="default-datatable"--}}
{{--                                                                                            data-dt-idx="1" tabindex="0"--}}
{{--                                                                                            class="page-link">1</a></li>--}}
{{--                                            <li class="paginate_button page-item "><a href="#"--}}
{{--                                                                                      aria-controls="default-datatable"--}}
{{--                                                                                      data-dt-idx="2" tabindex="0"--}}
{{--                                                                                      class="page-link">2</a></li>--}}
{{--                                            <li class="paginate_button page-item "><a href="#"--}}
{{--                                                                                      aria-controls="default-datatable"--}}
{{--                                                                                      data-dt-idx="3" tabindex="0"--}}
{{--                                                                                      class="page-link">3</a></li>--}}
{{--                                            <li class="paginate_button page-item "><a href="#"--}}
{{--                                                                                      aria-controls="default-datatable"--}}
{{--                                                                                      data-dt-idx="4" tabindex="0"--}}
{{--                                                                                      class="page-link">4</a></li>--}}
{{--                                            <li class="paginate_button page-item "><a href="#"--}}
{{--                                                                                      aria-controls="default-datatable"--}}
{{--                                                                                      data-dt-idx="5" tabindex="0"--}}
{{--                                                                                      class="page-link">5</a></li>--}}
{{--                                            <li class="paginate_button page-item "><a href="#"--}}
{{--                                                                                      aria-controls="default-datatable"--}}
{{--                                                                                      data-dt-idx="6" tabindex="0"--}}
{{--                                                                                      class="page-link">6</a></li>--}}
{{--                                            <li class="paginate_button page-item next" id="default-datatable_next"><a--}}
{{--                                                    href="#" aria-controls="default-datatable" data-dt-idx="7"--}}
{{--                                                    tabindex="0" class="page-link">Next</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </x-slot:slot>
</x-admin-layout>
