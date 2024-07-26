
@extends('admin.header')
@section('content')
<div class="main-content p-5">
   
    <div class="d-flex justify-content-end mt-5">
        <a href="/admin/create_category" class="btn btn-primary mb-2">Thêm danh mục</a>
    </div>
    <h3 class="title-page">
        Danh mục
    </h3>
    @if (  $message = Session::get('success') )

    <div class="alert alert-success  alert-block">
   <strong>{{ $message }}</strong>
    </div>
    @endif

@csrf
@method('DELETE')
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên danh mục </th>
                
                {{-- <th>Ngày tạo </th> --}}
                <th>Trạng thái</th>
                <th>Tùy chọn</th>
               
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                {{-- <td>{{$item->created_at}}</td> --}}
               
                <td>2011-04-25</td>
                <td>
                    <div class="d-flex">
                    <a href="edit_category/{{$item->id}}" class="btn btn-warning mx-2"><i
                            class="fa-solid fa-pen-to-square"></i> Sửa</a>

           
                        <form action="{{ route('delete_category', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger " onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form> 
                </div>
                </td>
            </tr>
            @empty
                <span>chưa có dữ liệu</span>
            @endforelse
       
           
        </tbody>
       
    </table>
</div>

@endsection
           