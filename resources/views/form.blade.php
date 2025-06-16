@extends('layouts.app')

@section('title', 'เขียนบทความ')

@section('content')
    <h2 class="text-center">เขียนบทความ</h2>
    <form method="POST" action="insert">
        @csrf
        <div class="form-group">
            <label for="title">ชื่อบทความ</label>
            <input type="text" class="form-control" name="title" placeholder="กรุณากรอกหัวข้อบทความ">
        </div>
        @error('title')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror

        <div class="form-group py-3">
            <label for="content">เนื้อหา</label>
            <textarea class="form-control" name="content" clos="30" rows="5" placeholder="กรุณากรอกเนื้อหาบทความ"
                id="content"></textarea>
        </div>
        @error('content')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror

        <input type="submit" value="บันทึก" class="btn btn-primary py-2">
        <a href="/blog" class="btn btn-success py-2">บทความทั้งหมด</a>
    </form>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NTAyMDQ3OTksImp0aSI6IjFlMDljOTU2LWI0MGEtNDU1NS1iODcyLTczMDJjZWRjNTZiNCIsImxpY2Vuc2VkSG9zdHMiOlsiKi53ZWJjb250YWluZXIuaW8iLCIqLmpzaGVsbC5uZXQiLCIqLmNzcC5hcHAiLCJjZHBuLmlvIiwiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIiwic2giXSwibGljZW5zZVR5cGUiOiJldmFsdWF0aW9uIiwidmMiOiIzZGMwNDQ5OSJ9.azv4SjqGgR6CP - Z116OYKzPlQK0tufUALlqg1SNVdqZvOPwa_TpCPtbsr2HKCQ6yPNDdCOIghUumClGEGfnjYQ',
                // Create a free account on https://portal.ckeditor.com/checkout?plan=free
                //ลิงค์สมัคร
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
