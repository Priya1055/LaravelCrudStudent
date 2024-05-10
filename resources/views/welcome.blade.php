<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
       <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <style>
        /* Reduce size of pagination arrows */

        body {
            font-family: Arial, sans-serif; /* Use appropriate font stack */
            background-color: #f8f9fa; /* Set background color */
        }

        .container {
            max-width: 1000px; /* Adjust maximum width as needed */
            margin: 0 auto; /* Center the container horizontally */
            padding: 20px; /* Add padding */
        }

        .card {
            width: 100%; /* Set card width to 100% */
            margin-bottom: 20px; /* Add margin between cards */
            background-color: #fff; /* Set card background color */
            border: 1px solid #ddd; /* Add border */
            border-radius: 5px; /* Add border radius */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow */
        }

        .card-content {
            padding: 20px; /* Add padding to content */
        }

        .card-content a {
            text-decoration: none; /* Remove underline from links */
            color: #333; /* Set link color */
            font-size: 18px; /* Set font size */
        }
    </style>
</head>
<body>

    <div class="container">
    <table class="table-responsive">
        <tr>
            {{-- Create Student --}}
            <td >
                <div>
                    {{-- Create Student --}}
                    <a href="{{ route('StudeInfoForm') }}" class="btn btn-primary float-right" title="Add Student">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </td>
            {{-- Search --}}
            <td style="padding-left:200px">
                <div>
                    <form action="{{ route('search') }}" method="GET" class="form-inline">
                        @csrf
                        {{-- <div class="input-group"> --}}
                            <input type="text" name="searchQuery" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-secondary">
                                    <i class="fas fa-search"></i> <!-- Font Awesome search icon -->
                                </button>
                            </div>
                        {{-- </div> --}}
                    </form>
                </div>
            </td>
            {{-- Sort By --}}
            <td style="padding-left:200px">
                <form action="{{ route('sort') }}" method="GET" class="form-inline ml-md-2">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="sortOptions">Sort by:</label>
                        </div>
                        <select class="custom-select" id="sortOptions" name="sortBy">
                            <option value="name">Name</option>
                            <option value="class">Class</option>
                            <option value="roll_no">Roll No</option>
                            <option value="marks">Marks</option>
                            <option value="gender">Gender</option>
                            <option value="country">Country</option>
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-secondary">Sort</button>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
    </table>

{{-- Student Grid --}}
        <div class="card mt-3">
            <thead style="background-color: #333A56;">
                <h2 class="card-header" >Student Information</h2>
            </thead>
            <tbody>
            <div class="card-body">
                @if(isset($StudInfos) && $StudInfos->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Roll No</th>
                                    <th>Marks</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Subject</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($StudInfos as $student)
                                    <tr>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->class }}</td>
                                        <td>{{ $student->roll_no }}</td>
                                        <td>{{ $student->marks }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->subject }}</td>
                                        <td>{{ $student->country }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('edit', $student->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- Delete Form -->
                                            <form action="{{ route('delete', $student->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Links -->
                    <nav aria-label="Page navigation" class="mt-3">
                        <ul class="pagination justify-content-center">
                            {{ $StudInfos->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>

                @else
                    <p>No student information available.</p>
                @endif
            </div>
        </div>
    </tbody>
    </div>

    <!-- Include Bootstrap JS files if needed -->
    <script>
        // JavaScript for search operation
document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    var searchQuery = formData.get('searchQuery');

    // Send AJAX request to server with searchQuery
    // Update page content with filtered data
});

// JavaScript for sort operation
document.querySelectorAll('.sort-btn').forEach(function(element) {
    element.addEventListener('click', function() {
        var sortCriteria = this.dataset.sort;

        // Send AJAX request to server with sortCriteria
        // Update page content with sorted data
    });
});
    </script>
</body>
</html>
