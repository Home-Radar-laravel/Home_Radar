@extends('layout/side-menu')

@section('subhead')
    <title>Property List - Your App</title>
@endsection

@section('subcontent')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <h2 class="intro-y text-lg font-medium mt-10">Property List</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('properties.create') }}">
                <button class="btn btn-primary shadow-md mr-2">Create New Property</button>
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
                            <a href="#" class="dropdown-item">
                                <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing {{ $properties->count() }} of {{ $totalProperties }} entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" id="searchInput" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>

       <!-- BEGIN: Data List -->
<div class="intro-y col-span-12">
    <div class="table-responsive">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Images</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Garage Size</th>
                    <th>Rooms</th>
                    <th>Bathrooms</th>
                    <th>Availability</th>
                    <th></th>
                    <th></th>
                    <th>Description</th>
                    <th></th>
                    <th width="280px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $key => $property)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="w-40">
                            <div class="flex">
                                @for ($i = 1; $i <= 6; $i++)
                                    @php $imageField = 'image' . $i; @endphp
                                    @if ($property->$imageField)
                                        <div class="w-10 h-10 image-fit zoom-in @if($i > 1) -ml-5 @endif">
                                            <img alt="Image {{ $i }}" class="tooltip rounded-full" src="{{ Storage::url($property->$imageField) }}" title="Image {{ $i }}">
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </td>
        
                        <td>{{ $property->property_name }}</td>
                        <td>{{ $property->location }}</td>
                        <td>{{ $property->price }}</td>
                        <td>{{ $property->property_size }}</td>
                        <td>{{ $property->garage_size }}</td>
                        <td>{{ $property->rooms }}</td>
                        <td>{{ $property->bathrooms }}</td>
                        <td>
                            <form action="{{ route('property.updateAvailability', $property->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="availability" class="form-control">
                                    <option value="1" {{ $property->availability == 1 ? 'selected' : '' }}>Available</option>
                                    <option value="0" {{ $property->availability == 0 ? 'selected' : '' }}>Not Available</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-1">Update</button>
                            </form>
                        </td>
                        <td></td>
                        <td></td>
                        <td>{{ $property->description }}</td>
                        <td></td>
                        <td>
                            <a class="btn btn-info" href="{{ route('properties.show', $property->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('properties.edit', $property->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['properties.destroy', $property->id], 'style' => 'display:inline', 'class' => 'delete-form']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
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
                            'The property has been deleted.',
                            'success'
                        ).then(() => {
                            // توجيه إلى صفحة قائمة العقارات بعد حذف العقار
                            window.location.href = "{{ route('properties.index') }}";
                        });
                    } else {
                        return response.json().then(data => {
                            Swal.fire(
                                'Error!',
                                data.error || 'There was an error deleting the property.',
                                'error'
                            );
                        });
                    }
                })
                .catch(error => {
                    Swal.fire(
                        'Error!',
                        'There was an error deleting the property.',
                        'error'
                    );
                });
            }
        });
    });
});

            document.getElementById('searchInput').addEventListener('keyup', function() {
                var searchText = this.value.toLowerCase();
                var rows = document.querySelectorAll('table tbody tr');

                rows.forEach(function(row) {
                    var name = row.querySelector('td:nth-child(8)').textContent.toLowerCase();
                    var location = row.querySelector('td:nth-child(9)').textContent.toLowerCase();
                    var price = row.querySelector('td:nth-child(10)').textContent.toLowerCase();

                    if (name.includes(searchText) || location.includes(searchText) || price.includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>
    </div>
@endsection
