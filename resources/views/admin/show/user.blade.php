@extends('admin.layouts.main_dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" href="#" >เพิ่มสมาชิก</a>
                <div class="card">

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">ชื่อ</th>
            <th scope="col">Status</th>
            <th scope="col">action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td scope="row">1</td>
            <td>ไกรสร</td>
            <td>Normal</td>
            <td>
                <a class="btn btn-facebook" href="#" >Detail</a>
                <a class="btn badge-primary" href="#" >Edit</a>
                <a class="btn btn-danger" href="#" >Delete</a>
                </td>

        </tr>
        <tr>
            <td scope="row">2</td>
            <td>พงษกร</td>
            <td>Normal</td>
            <td> <a class="btn btn-facebook" href="#" >Detail</a>
                <a class="btn badge-primary" href="#" >Edit</a>
                <a class="btn btn-danger" href="#" >Delete</a></td>
        </tr>
        <tr>
            <td scope="row">3</td>
            <td>ปรีเปรม</td>
            <td>VIP</td>
            <td> <a class="btn btn-facebook" href="#" >Detail</a>
                <a class="btn badge-primary" href="#" >Edit</a>
                <a class="btn btn-danger" href="#" >Delete</a></td>

        </tr>
        <tr>

        </tr>
        </tbody>
    </table>
                </div>
                </div>
                </div>
                </div>
@endsection