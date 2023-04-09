@extends('admin.layout.layout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">
                        <p><a href="{{ url('admin/add-edit-category') }}" class="btn btn-primary" style="float: right; display:inline-block;">Add Category</a></p>
                        <br>
                        @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session::get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="table-responsive pt-3">
                            <table id="categories" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            SL
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Parent Category
                                        </th>
                                        <th>
                                            Section
                                        </th>
                                        <th>
                                            URL
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
                                    @foreach($categories as $category)
                                    @if(isset($category['parentcategory']['category_name'])&&!empty($category['parentcategory']['category_name']))
                                    <?php $parent_category = $category['parentcategory']['category_name'] ?>
                                    @else
                                    <?php $parent_category = "Root" ?>
                                    @endif
                                    <tr>
                                        <td>
                                            {{ $sl++ }}
                                        </td>
                                        <td>
                                            {{ $category['category_name'] }}
                                        </td>
                                        <td>
                                            {{ $parent_category }}
                                        </td>
                                        <td>
                                            {{ $category['section']['name'] }}
                                        </td>
                                        <td>
                                            {{ $category['url'] }}
                                        </td>
                                        <td>
                                            @if($category['status']==1)
                                            <a href="javascript:void(0)" class="updateCategoryStatus" id="category-{{ $category['id'] }}" category_id="{{ $category['id'] }}"><i style="font-size:25px;" class=" mdi mdi-bookmark-check" status="Active"></i></a>
                                            @else
                                            <a href="javascript:void(0)" class="updateCategoryStatus" id="category-{{ $category['id'] }}" category_id="{{ $category['id'] }}"><i style="font-size:25px;" class=" mdi mdi-bookmark-outline" status="Inactive"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-category/'. $category['id']) }}"><i class="mdi mdi-table-edit"></i></a>
                                            <?php //  <a title="category" href="{{ url('admin/delete-category/'. $category['id']) }}" class="confirmDelete"><i class="mdi mdi-close-box "></i></a>
                                            ?>
                                            <a module="category" moduleid="{{ $category['id'] }}" href="javascript:void(0)" class="confirmDelete"><i class="mdi mdi-close-box "></i></a>
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