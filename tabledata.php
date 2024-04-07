<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<select id="filter">
<option value="lowHigh">Price: low - High</option>
<option value="highLow">Price: High - Low</option>
</select>
<script>
    $("#filter").change(function() {
        $.ajax({
        type: 'post',
        url: URL_TO_YOUR_PHP_SCRIPT,
        data: {
            priceFilter: $('#filter').val()
        },
        dataType: 'json',
        success: function(result) {
            if (result) {
                $.each(result, function(i, item) {
                    $('#your_table').append('<tr><td>'+item+'</td></tr>');
                }
            }
        }
        });
    });
</script>
</body>
</html>