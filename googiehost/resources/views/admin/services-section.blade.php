@extends('admin.includes.layouts')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Services Section</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Services</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('manage.services-section') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Manage Services Section
            </a>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Services Section</h5>


                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>
                                        Page Name
                                    </th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $service)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $service->pageService->page_name }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td> <a href="{{ route('manage.services-section', $service->id) }}"
                                                class="btn btn-primary"><i class="bx bxs-edit"></i> Edit</a>
                                            <form action="{{ route('hero.delete', $service->id) }}" method="POST"
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
