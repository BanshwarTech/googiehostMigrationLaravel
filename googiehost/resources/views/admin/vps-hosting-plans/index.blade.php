@extends('admin.includes.layouts')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>VPS Hosting Plans</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                    <li class="breadcrumb-item active">VPS Hosting</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('manage.vps-hosting-plans') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Manage VPS Hosting Plans
            </a>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">VPS Hosting</h5>


                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>
                                        Page Name
                                    </th>
                                    <th>Logo Image</th>
                                    <th>Offer Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $paid)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $paid->pageVps->page_name }}</td>
                                        <td><img src="{{ asset('storage/paidplans/vpsHosting/logo_image/' . $paid->logo_image) }}"
                                                alt="" width="150">
                                        </td>
                                        <td><img src="{{ asset('storage/paidplans/vpsHosting/offer_image/' . $paid->offer_image) }}"
                                                alt="" width="50" height="50">
                                        </td>
                                        <td>
                                            <div class="dropdown mb-1">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Update Status
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('vps.status', ['id' => $paid->id, 'status' => 'active']) }}">
                                                            Active
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('vps.status', ['id' => $paid->id, 'status' => 'inactive']) }}">
                                                            InActive
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            ||<a href="{{ route('manage.vps-hosting-plans', $paid->id) }}"
                                                class="btn btn-primary"><i class="bx bxs-edit"></i> Edit</a>
                                            ||
                                            <form action="{{ route('vps.delete', $paid->id) }}" method="POST"
                                                style="display: inline-block;"
                                                onsubmit="return confirm('Are you sure you want to delete this page?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bx bxs-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
