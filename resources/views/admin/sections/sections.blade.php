@extends('admin.layout.layout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('admin/add-edit-section') }}" class="btn btn-primary" style="float: right; display:inline-block;">Add Section</a>
                        @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session::get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="table-responsive pt-3">
                            <table id="sections" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            SL
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sl = 1; ?>
                                    @foreach($sections as $section)
                                    <tr>
                                        <td>
                                            {{ $sl++ }}
                                        </td>
                                        <td>
                                            {{ $section['name'] }}
                                        </td>
                                        <td>
                                            @if($section['status']==1)
                                            <a href="javascript:void(0)" class="updateSectionStatus" id="section-{{ $section['id'] }}" section_id="{{ $section['id'] }}"><i style="font-size:25px;" class=" mdi mdi-bookmark-check" status="Active"></i></a>
                                            @else
                                            <a href="javascript:void(0)" class="updateSectionStatus" id="section-{{ $section['id'] }}" section_id="{{ $section['id'] }}"><i style="font-size:25px;" class=" mdi mdi-bookmark-outline" status="Inactive"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-section/'. $section['id']) }}"><i class="mdi mdi-table-edit"></i></a>
                                            <?php //  <a title="section" href="{{ url('admin/delete-section/'. $section['id']) }}" class="confirmDelete"><i class="mdi mdi-close-box "></i></a>
                                            ?>
                                            <a module="section" moduleid="{{ $section['id'] }}" href="javascript:void(0)" class="confirmDelete"><i class="mdi mdi-close-box "></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>



@endsection