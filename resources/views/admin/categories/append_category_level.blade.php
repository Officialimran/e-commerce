<div class="form-group row">
    <label for="parent_id" class="col-sm-3">Select Category Level</label>
    <div class="col-sm-9">
        <select name="parent_id" id="parent_id" class="form-control">
            <option value="0" @if(isset($category['parent_id']) && $category['parent_id']==0) selected="" @endif>Main Category</option>
            @if(!empty($getCategories))
            @foreach($getCategories as $category)
            <option value="{{ $category['id'] }}" @if(isset($category['parent_id']) && $category['parent_id']==$category['id']) selected="" @endif>{{ $category['category_name'] }}</option>

            @if(!empty($category['subcategories']))
            @foreach($category['subcategories'] as $subcategory)
            <option value="{{ $subcategory['id'] }}" @if(isset($category['parent_id']) && $category['parent_id']==$subcategory['id']) selected="" @endif>{{ $subcategory['category_name'] }}</option>
            @endforeach
            @endif
            @endforeach


            @endif

        </select>
    </div>
</div>