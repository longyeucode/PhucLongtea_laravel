
@extends('admin.header')
@section('content')
<div class="main-content p-5">
   
    <div class="d-flex justify-content-end mt-5">
        <a href="/admin/create_product" class="btn btn-primary mb-2">Thêm Sản phẩm </a>
    </div>
    <h3 class="title-page">
        Sản phẩm 
    </h3>
    @if ($message = Session::get('success') )

    <div class="alert alert-success  alert-block">
   <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('erorr') )

    <div class="alert alert-success  alert-block">
   <strong>{{ $message }}</strong>
    </div>
    @endif  
    <form method="POST" action="" class="form-inline">
        @csrf
        <div class="d-flex">
        <div class="form-group mb-2">
            <input type="text" class="form-control" name="key" placeholder="nhập tên .....">
        </div>
        <button  type="submit" class="btn mx-1 mb-2 ml-2">
            <i class='bx bx-search-alt-2'></i>
        </button>
      </div>
    </form>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh sản phẩm</th>
                <th>Tên danh mục </th>
                <th>Danh mục </th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th>Tùy chọn</th>
               
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td> <img class="img-thumbnail img-fluid" style="width:100px" src="{{asset('./storage/images')}}/{{$item->image}}" alt=""></td>
                <td>{{$item->name}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->created_at}}</td>
                <td>Còn hàng</td>
                <td class=" ">
                    <DIV class="d-flex">
                    <a href="edit_product/{{$item->id}}" class="btn btn-warning mx-2"><i
                            class="fa-solid fa-pen-to-square"></i> Sửa</a>
                            <form action="{{ route('delete_product', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger " onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form> 
                        </DIV>
                </td>
            </tr>
            @empty
                <span>chưa có dữ liệu</span>
            @endforelse
       
           
        </tbody>
       
    </table>
   

    
    {{$products->links()}}
 
   
</div>

@endsection
           