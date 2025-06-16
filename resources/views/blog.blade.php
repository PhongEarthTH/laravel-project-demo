@extends('layouts.app')

@section('title', 'บทความทั้งหมด')

@section('content')
    @if (count($blogs) > 0)
        <h2 class="text-center">บทความทั้งหมด</h2>
        <table class="table table-striped table-hover table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">บทความ</th>
                    {{-- <th scope="col">เนื้อหา</th> --}}
                    <th scope="col">สถานะ</th>
                    <th scope="col">แก้ไข</th>
                    <th scope="col">ลบ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        {{-- <td>{{Str::limit($item->content,20)}}</td> --}}
                        <td>
                            @if ($item->status == true)
                                <a href="{{ route('change', $item->id) }}"
                                    onclick="return confirm('คุณต้องการเปลี่ยนสถานะ {{ $item->title }} หรือไม่?')">
                                    <span class="badge bg-success">เผยแพร่</span></a>
                            @else
                                <a href="{{ route('change', $item->id) }}"
                                    onclick="return confirm('คุณต้องการเปลี่ยนสถานะ {{ $item->title }} หรือไม่?')">
                                    <span class="badge bg-secondary">ฉบับร่าง</span></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('edit', [$item->id, 'page' => request()->get('page', 1)]) }}">
                                <span class="badge bg-warning">แก้ไข</span></a>
                        </td>
                        <td>
                            <a href="{{ route('delete', [$item->id, 'page' => request()->get('page', 1)]) }}"
                                onclick="return confirm('คุณต้องการลบบทความ {{ $item->title }} หรือไม่?')">
                                <span class="badge bg-danger">ลบ</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blogs->links() }}
    @else
        <h2 class="text-center">ไม่มีบทความ</h2>
    @endif

@endsection
