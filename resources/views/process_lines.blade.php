@extends('layouts.app')
@section('title', 'Process Lines')
@section('content')
<div class="container">
    <!-- Success Message -->
    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}
    
    <!-- Add LaneName Button -->
    @if (Auth::user()->role == 'admin')
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addLaneModal">
        Add+
    </button>
    @endif

    <!-- Search Form -->
    <form action="{{ route('process_lines.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search Lane Name" aria-label="Search Lane Name">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <!-- Add LaneName Modal -->
    <div class="modal fade" id="addLaneModal" tabindex="-1" aria-labelledby="addLaneModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addLaneModalLabel">Add LaneName</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('process_lines.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                <label for="LaneName">Lane Name</label>
                <input type="text" class="form-control" id="LaneName" name="LaneName" placeholder="Enter Lane Name" required>
                </div>
            </div>
            @if (Auth::user()->role == 'admin')
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            @endif
            </form>
        </div>
        </div>
    </div>
  
    <h1>Process Lines</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Line ID</th>
                <th>Lane Name</th>
                @if (Auth::user()->role == 'admin')
                <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($processLines as $line)
            <tr>
                <td>{{ $line->LineID }}</td>
                <td>{{ $line->LaneName }}</td>
                <td>
                    <!-- Edit Button -->
                    @if (Auth::user()->role == 'admin')
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editLaneModal{{ $line->LineID }}">
                        <i class="fas fa-edit"></i> แก้ไข
                    </button>
                    @endif
                    
                    <!-- Delete Button -->
                    @if (Auth::user()->role == 'admin')
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal{{ $line->LineID }}">
                        <i class="fas fa-trash"></i> ลบ
                    </button>
                    @endif
                </td>
            </tr>

            <!-- Confirmation Modal -->
            <div class="modal fade" id="confirmDeleteModal{{ $line->LineID }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            คุณแน่ใจหรือไม่ว่าต้องการลบ "<span style="color: red;">{{ $line->LaneName }}</span>" นี้?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                            <form action="{{ route('process_lines.destroy', $line->LineID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> ลบ
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Edit LaneName Modal -->
             <div class="modal fade" id="editLaneModal{{ $line->LineID }}" tabindex="-1" aria-labelledby="editLaneModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editLaneModalLabel">Edit LaneName</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('process_lines.update', $line->LineID) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="LaneName">Lane Name</label>
                                    <input type="text" class="form-control" id="LaneName" name="LaneName" value="{{ $line->LaneName }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
