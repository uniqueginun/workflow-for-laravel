@extends('laraflow::layout.master')

@section('title', 'Control Panel - Home')

@section('left-section')
    <a href="{{ route('laraflow.cp-service.create') }}" class="btn btn-sm btn-outline-secondary">
        إضافة
    </a>
@endsection

@section('content')
    <h3>إدارة الخدمات</h3>

    <div class="mt-5 table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان</th>
                <th scope="col">عنوان</th>
                <th scope="col">عنوان</th>
                <th scope="col">عنوان</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1,001</td>
                <td>بيانات</td>
                <td>عشوائية</td>
                <td>تثري</td>
                <td>الجدول</td>
            </tr>
            <tr>
                <td>1,002</td>
                <td>تثري</td>
                <td>مبهة</td>
                <td>تصميم</td>
                <td>تنسيق</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
