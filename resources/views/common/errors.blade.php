@if (count($errors) > 0)
    <!-- Display Validation Errors -->
    <!-- resources/views/common/errors.blade.php -->
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
