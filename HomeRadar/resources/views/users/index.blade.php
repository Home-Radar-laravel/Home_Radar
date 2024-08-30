@extends('layout/side-menu')

@section('subhead')
    <title>User List - Your App</title>
@endsection

@section('subcontent')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <h2 class="intro-y text-lg font-medium mt-10">User List</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('users.create') }}">
                <button class="btn btn-primary shadow-md mr-2">Create New User</button>
            </a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing {{ $users->count() }} of {{ $totalUsers }} entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" id="searchInput" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="280px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role->id == 1)
                                    Admin
                                @elseif ($user->role->id == 2) 	
                                    Renter
                                @elseif ($user->role->id == 3)
                                    Client
                                @else
                                    Unknown
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline', 'class' => 'delete-form']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24" id="confirm-delete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->

    <script>
        document.querySelectorAll('form.delete-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // منع الإرسال التلقائي للنموذج
    
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // إرسال طلب الحذف عبر AJAX
                        fetch(form.action, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: new URLSearchParams(new FormData(form)).toString()
                        })
                        .then(response => {
                            if (response.ok) {
                                Swal.fire(
                                    'Deleted!',
                                    'The user has been deleted.',
                                    'success'
                                ).then(() => {
                                    // توجيه إلى صفحة قائمة المستخدمين بعد حذف المستخدم
                                    window.location.href = "{{ route('users.index') }}";
                                });
                            } else {
                                return response.json().then(data => {
                                    Swal.fire(
                                        'Error!',
                                        data.error || 'There was an error deleting the user.',
                                        'error'
                                    );
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error!',
                                'There was an error deleting the user.',
                                'error'
                            );
                        });
                    }
                });
            });
        });

        document.getElementById('searchInput').addEventListener('keyup', function() {
    // الحصول على النص المدخل في حقل البحث
    var searchText = this.value.toLowerCase();
    
    // الحصول على جميع الصفوف في الجدول
    var rows = document.querySelectorAll('table tbody tr');
    
    // تكرار على كل صف في الجدول
    rows.forEach(function(row) {
        // افتراض أن الصف يجب أن يكون مخفيًا
        let rowContainsText = false;
        
        // الحصول على جميع الأعمدة داخل الصف الحالي
        var columns = row.querySelectorAll('td');
        
        // التكرار على كل عمود داخل الصف
        columns.forEach(function(column) {
            // الحصول على النص من العمود الحالي
            var columnText = column.textContent.toLowerCase();
            
            // التحقق مما إذا كان النص المدخل موجودًا في العمود الحالي
            if (columnText.indexOf(searchText) !== -1) {
                // إذا كان النص موجودًا في أي عمود، يتم إظهار الصف
                rowContainsText = true;
            }
        });
        
        // إذا كان النص موجودًا في أي عمود، يتم إظهار الصف، وإلا يتم إخفاؤه
        if (rowContainsText) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
    </script>
    

@endsection
