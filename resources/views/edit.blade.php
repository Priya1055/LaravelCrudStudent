<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Add your custom CSS styles here */
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h5 class="card-title card-header text-center">Student Information Form</h5>
            <div class="card-body">
                <form action="{{ route('update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
                            </div>

                            <div class="form-group">
                                <label for="class">Class</label>
                                <input type="text" class="form-control" id="class" name="class" value="{{ $student->class }}">
                            </div>

                            <div class="form-group">
                                <label for="roll_no">Roll No</label>
                                <input type="text" class="form-control" id="roll_no" name="roll_no" value="{{ $student->roll_no }}">
                            </div>

                            <div class="form-group">
                                <label for="marks">Marks</label>
                                <input type="text" class="form-control" id="marks" name="marks" value="{{ $student->marks }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="d-flex">
                                    <label for="subjects" class="me-2">Subjects</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="maths" value="maths" name="subjects[]" {{ $student->subject === 'maths' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="maths">Maths</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="science" value="science" name="subjects[]" {{ $student->subject === 'science' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="science">Science</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="english" value="english" name="subjects[]" {{ $student->subject === 'english' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="english">English</label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="country">Country</label>
                                <select class="form-control" id="country" name="country">
                                    <option value="India" {{ $student->country == 'India' ? 'selected' : '' }}>India</option>
                                    <option value="USA" {{ $student->country == 'USA' ? 'selected' : '' }}>USA</option>
                                    <option value="UK" {{ $student->country == 'UK' ? 'selected' : '' }}>UK</option>
                                    <option value="Canada" {{ $student->country == 'Canada' ? 'selected' : '' }}>Canada</option>
                                    <option value="Australia" {{ $student->country == 'Australia' ? 'selected' : '' }}>Australia</option>
                                </select>
                            </div>

                            <!-- Add more input fields for other student details as needed -->

                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
