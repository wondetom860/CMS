<fieldset>
    {{ Form::select('curs', $courses) }}
    {{ Form::select('assignatura', $assignatures) }}
</fieldset>

{{ Form::open(['action' => 'ResultsController@setSelectTestView']) }}
<fieldset>
    {{ Form::select('test', $tests) }}
</fieldset>
<input type="submit" value="Select">
{{ Form::close() }}

// JavaScript (using jQuery)
$('select[name="curs"], select[name="assignatura"]').on('change', function () {
    const cur = $('select[name="curs"]').val();
    const asg = $('select[name="assignatura"]').val();

    $.ajax({
        url: '/result/search',
        data: { cur: cur, asg: asg },
        type: 'POST',
        success: function (data) {
            $('#result_container').html(data); // Update the results container
        }
    });
});