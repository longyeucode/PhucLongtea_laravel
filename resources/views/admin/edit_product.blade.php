

@extends('admin.header')
@section('content')
<div class="main-content">
  
    <div class="div p-5">
    <form class="addPro p-5" action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputFile">Ảnh sản phẩm</label>
            <input type="file" name="photo" id="HinhAnh">
            <div id="preview"></div>
         <img class="img-thumbnail img-fluid" style="width:100px" src="{{asset('./storage/images')}}/{{$products->image}}" alt="">
        </div>
        <div class="row">
        <div class="form-group col-6">
            <label for="name">Tên sản phẩm:</label>
            <input value="{{$products->name}}" type="text" class="form-control" name="name" id="ProductName" placeholder="Nhập tên sả phẩm" onkeyup="ChangeToSlug()">
        </div>
        <div class="form-group col-6">
            <label for="name">Đường dẫn slug:</label>
            <input value="{{$products->slug}}" type="text" class="form-control" name="slug" id="slug" placeholder="">
        </div>
    </div>
        <div class="form-group">
            <label for="categories">Danh mục:</label>
            <select  name="category_id" class="form-select" aria-label="Default select example">
                @foreach ($categories as $item)
                <option value="{{$item->id}}" {{ $item->id == $products->category_id ? 'selected' : '' }}>{{$item->name}}</option>
                @endforeach
                 
            </select>
        </div>
        <div class="form-group">
            <label for="price">Giá gốc:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">$</span>
                </div>
                <input value="{{$products->price}}" type="text" name="price" id="price" class="form-control" placeholder="Nhập giá gốc">
            </div>
        </div>
        <div class="form-group">
            <label for="price_sale">Giá khuyến mãi:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">$</span>
                </div>
                <input value="{{$products->sale_price}}" type="text" name="sale_price" id="price_sale" class="form-control"
                    placeholder="Giá khuyến mãi">
            </div>
        </div>
        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea name="description" id="editor1" rows="10" cols="80">
                {{$products->description}}
            </textarea>
        </div>

        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</div>

@endsection
@section('custom-js')

<script src="{{asset('assets/ckeditor/ckeditor/ckeditor.js')}}"></script>
<script>

    CKEDITOR.replace('editor1');
    </script>
    <script>
        function ChangeToSlug()
{
    var ProductName, slug;
 
    //Lấy text từ thẻ input title 
    ProductName = document.getElementById("ProductName").value;
 
    //Đổi chữ hoa thành chữ thường
    slug = ProductName.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, " - ");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slug').value = slug;
}
    </script>
@endsection