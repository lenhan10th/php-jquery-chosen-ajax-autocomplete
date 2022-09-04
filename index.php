<!DOCTYPE html>
<html>

<head>
    <title>PHP - Jquery Chosen Ajax Autocomplete Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">PHP - Jquery Chosen Ajax Autocomplete Example</div>
            <div class="panel-body">
                <form>
                    <select class="form-control select-box">
                        <option value="">Select Option</option>
                    </select>
                    <button type="button" class="btn-submit">Submit</button>
                    <button type="button" class="btn-reset">Reset</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(".select-box").chosen();

    $('.chosen-search input').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "ajaxpro.php?name=" + request.term,
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    $('.select-box').empty();
                    response($.map(data, function(item) {
                        $('.select-box').append('<option value="' + item.id + '">' + item.name + '</option>');
                    }));
                    $(".select-box").trigger("chosen:updated");
                }
            });
        }
    });
    $(document).on('click', '.btn-submit', function(){
        console.log('value: ' + $(".select-box").val());
    });
    $(document).on('click', '.btn-reset', function(){
        $('.select-box').empty();
        $('.select-box').append('<option value="">Select Option</option>');
        $(".select-box").trigger("chosen:updated");
    });
    </script>
</body>

</html>