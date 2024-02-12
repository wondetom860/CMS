<style>
        /* Style for input fields */
        input[type=text]{
            width: 30%; /* Make input fields fill the available width */
            padding: 10px; /* Add padding for better appearance */
            border: 1px solid #ccc; /* Add a border */
            border-radius: 4px; /* Add rounded corners */
            margin-bottom: 10px;
            margin-left: 10px; /* Add left margin */
        }
label{
    margin-right: 2em;
}        
    </style>

<!-- resources/views/case_staff_assignments/_form.blade.php -->
<div class="container">
    <div class="form-control">
<div class="ml-5">
<label for="case_id">Case ID</label>
<input type="text" class="col-xs-3 mb-3 bd-highlight py-2" name="case_id" id="case_id" value="{{ old('case_id', $case_staff_assignment->case_id ?? '') }}">
</div>
<div class="ml-5">
<label for="court_staff_id">Court Staff ID</label>
<input type="text" class="col-xs-3 mb-3 bd-highlight py-2 float-center" name="court_staff_id" id="court_staff_id" value="{{ old('court_staff_id', $case_staff_assignment->court_staff_id ?? '') }}">
</div>

<div class="ml-5">
<label for="assigned_as">Assigned As</label>
<input type="text" class="col-xs-7 mb-3" name="assigned_as" id="assigned_as" value="{{ old('assigned_as', $case_staff_assignment->assigned_as ?? '') }}">
</div>

<div class="ml-5">
<label for="assigned_as">Assigned At</label>
<input type="text" class="col-xs-7 mb-3" name="assigned_as" id="assigned_as" value="{{ old('assigned_as', $case_staff_assignment->assigned_as ?? '') }}">
</div>

<div class="ml-5">
<label for="assigned_as">Assigned By</label>
<input type="text" class="col-xs-7 mb-3" name="assigned_as" id="assigned_as" value="{{ old('assigned_as', $case_staff_assignment->assigned_as ?? '') }}">
</div>
</div>
<!-- Add more fields as needed -->
