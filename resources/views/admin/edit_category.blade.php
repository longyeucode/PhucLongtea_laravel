

@extends('admin.header')
@section('content')
<div class="main-content">
  
    <div class="div p-5">
       
    <form class="addPro p-5" " method="POST" enctype="multipart/form-data">
      @method('PUT')
        @csrf
        <div class="form-group">
            <h2>Sửa danh mục </h2>
            <label for="name">Tên danh mục:</label>

            <input value="{{$categories->name}}" type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sả phẩm">
        </div>

        <div class="form-group mt-1">
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </div>
    </form>
</div>
</div>

@endsection
          