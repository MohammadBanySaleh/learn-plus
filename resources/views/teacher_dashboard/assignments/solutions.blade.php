@extends('teacher_dashboard.teacher_layouts.master')

@section('title', 'Student Solutions')


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('title_page1')

    Solutions
@endsection

@section('title_page2')
    Student Solutions
@endsection

{{-- <div class="container-fluid">
    <h3>{{$subject->name}}</h3>
    <h4>{{$subject->grade->name}}</h4>
</div> --}}
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ session()->get('success') }}
                        @endif
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Subject: <b> {{ $subject->name }} </b> | Grade: <b>{{ $subject->grade->name }} </b> |
                                Assignment: <b>{{ $assignment->name }} </b>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Solution text</th>
                                        <th>Solution File</th>
                                        <th>Mark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($solutions as $solution)
                                            <td>{{ $i }}</td>
                                            <td>{{ $solution->student->name }}</td>
                                            <td>{{ $solution->solution }}</td>
                                            <td> <a href="{{ asset($solution->file) }}">{{ $solution->file }}</a></td>
                                            @if ($solution->mark == null)
                                                <td style="font-weight: bold; font-size:20px; text-align:center">_</td>
                                            @else
                                                <td>{{ $solution->mark }}</td>
                                            @endif

                                            {{-- <td class="project-actions">
                                                <div style="margin-bottom: 5px;">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('assignments.edit', $solution->id) }}"
                                                        style="width: 100%;">
                                                        <i class="fas fa-book"></i>
                                                        Edit mark
                                                    </a>
                                                </div>
                                            </td> --}}

                                            <td class="project-actions">
                                                <div style="margin-bottom: 5px;">
                                                    <button class="btn btn-primary btn-sm edit-mark-btn" data-toggle="modal"
                                                        data-target="#editMarkModal"
                                                        onclick="setSolutionId({{ $solution->id }})" style="width: 100%;">
                                                        <i class="fas fa-book"></i>
                                                        Edit mark
                                                    </button>

                                                </div>
                                            </td>


                                            @php
                                                $i++;
                                            @endphp

                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Modal -->
    <div class="modal fade" id="editMarkModal" tabindex="-1" role="dialog" aria-labelledby="editMarkModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMarkModalLabel">Edit Mark</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('assignments.updateSolutionMark') }}" method="POST" id="editMarkForm">

                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <input type="hidden" id="solutionId" name="solutionId" value="">
                        <div class="form-group">
                            <label for="newMark">New Mark</label>
                            <input type="number" class="form-control" id="newMark" name="newMark" required
                                min="0">
                        </div>
                        @error('newMark')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <script>
        $('.edit-mark-btn').click(function() {
            var solutionId = $(this).data('solution-id');
            console.log('solutionId:', solutionId);
            $('#solutionId').val(solutionId);

            // Set the form action attribute dynamically with the correct route and solutionId
            $('#editMarkForm').attr('action', "{{ route('assignments.updateSolutionMark', '') }}/" + solutionId);
        });
    </script> --}}
    <script>
        function setSolutionId(solutionId) {
            $('#solutionId').val(solutionId);
        }
    </script>

@endsection














@section('scripts')
    {{-- <script src="../../plugins/datatables/jquery.dataTables.min.js"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>

    {{-- <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>

    {{-- <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> --}}
    <script type="text/javascript"
        src="{{ URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

    {{-- <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> --}}
    <script type="text/javascript"
        src="{{ URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    {{-- <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> --}}
    <script type="text/javascript"
        src="{{ URL::asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>

    {{-- <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> --}}
    <script type="text/javascript"
        src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    {{-- <script src="../../plugins/jszip/jszip.min.js"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jszip/jszip.min.js') }}"></script>

    {{-- <script src="../../plugins/pdfmake/pdfmake.min.js"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>

    {{-- <script src="../../plugins/pdfmake/vfs_fonts.js"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>

    {{-- <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}">
    </script>

    {{-- <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}">
    </script>

    {{-- <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}">
    </script>


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

@endsection
