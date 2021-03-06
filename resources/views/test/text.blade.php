<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.4.11/d3.min.js"></script>
<link href="https://rawgit.com/masayuki0812/c3/master/c3.css" rel="stylesheet" />
<script src="https://rawgit.com/masayuki0812/c3/master/c3.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <title>C3 Bar Chart</title>
</head>

<body>
<div id="designerChart"></div>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {

        columnColors = ['#9a4d6f', '#c76c47', '#f85115', '#d9b099', '#d4ba2f'];

        function setColumnBarColors(colors, chartContainer) {

            $('#' + chartContainer + ' .c3-chart-bars .c3-shape').each(function(index) {
                this.style.cssText += 'fill: ' + colors[index] + ' !important; stroke: ' + colors[index] + '; !important';
            });

            $('#' + chartContainer + ' .c3-chart-texts .c3-text').each(function(index) {
                this.style.cssText += 'fill: ' + colors[index] + ' !important;';
            });
        }

        var chart = c3.generate({
            bindto: '#designerChart',
            data: {
                columns: [
                    ['rainfall', 6, 8, 6, 5, 4]
                ],
                type: 'bar'
            },
            axis: {
                x: {
                    label: {
                        text: 'States',
                        position: 'outer-center',
                    },
                    type: 'category',
                    categories: ['MA', 'ME', 'NY', 'CN', 'TX'],
                    tick: {
                        centered: true
                    }
                },
                y: {
                    label: {
                        text: 'Rainfall (inches)',
                        position: 'outer-middle'
                    },
                    max: 10,
                    min: 0,
                    padding: {
                        top: 0,
                        bottom: 0
                    }
                }
            },
            legend: {
                show: false
            }
        });

        setColumnBarColors(columnColors, 'designerChart');

        // Color turns to original when window is resized
        // To handle that
        $(window).resize(function() {
            setColumnBarColors(columnColors, 'designerChart');
        });
    });
</script>

</body>

</html>