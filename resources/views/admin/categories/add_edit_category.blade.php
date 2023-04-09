@extends('admin.layout.layout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            @if($id="" )
                            {{ $title }}
                            @else
                            {{ $title }}
                            @endif
                        </h4>
                        @if(Session::has('error_message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ session::get('error_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif


                        @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session::get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form class="forms-sample" @if(empty($category['id'])) action="{{ url('admin/add-edit-category') }}" @else action="{{ url('admin/add-edit-category/'.$category['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Enter category name" id="category_name" name="category_name" @if(!empty($category['category_name'])) value="{{ $category['category_name'] }}" @else value="{{ old('category_name') }}" @endif>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="section_id" class="col-sm-3">Section</label>
                                <div class="col-sm-9">
                                    <select name="section_id" id="section_id" class="form-control">
                                        <option value="">Select section</option>
                                        @foreach($getSection as $section)
                                        <option value="{{ $section['id'] }}" @if(!empty($category['section_id']) && $category['section_id']==$section['id']) selected=" " @endif>{{ $section['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="appendCategoriesLevel">
                                @include('admin.categories.append_category_level')
                            </div>
                            <div class="form-group row">
                                <label for="category_image" class="col-sm-3 col-form-label">Category Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="category_image" id="category_image">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_discount" class="col-sm-3 col-form-label">Category Discount</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Enter category discount" id="category_discount" name="category_discount" @if(!empty($category['category_discount'])) value="{{ $category['category_discount'] }}" @else value="{{ old('category_discount') }}" @endif>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">Category Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="description" name="description" @if(!empty($category['description'])) value"{{ $category['description'] }}" @else value="{{ old('description')}}" @endif rows="3">{{ $category['description']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url" class="col-sm-3 col-form-label">Category URL</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Enter category url" id="url" name="url" @if(!empty($category['url'])) value="{{ $category['url'] }}" @else value="{{ old('url') }}" @endif>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="meta_title" class="col-sm-3 col-form-label">Meta Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Enter meta title" id="meta_title" name="meta_title" @if(!empty($category['meta_title'])) value="{{ $category['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="meta_description" class="col-sm-3 col-form-label">Meta Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Enter meta title" id="meta_description" name="meta_description" @if(!empty($category['meta_description'])) value="{{ $category['meta_description'] }}" @else value="{{ old('meta_description') }}" @endif>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="meta_keywords" class="col-sm-3 col-form-label">Meta Keywords</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Enter meta title" id="meta_keywords" name="meta_keywords" @if(!empty($category['meta_keywords'])) value="{{ $category['meta_keywords'] }}" @else value="{{ old('meta_keywords') }}" @endif>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
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