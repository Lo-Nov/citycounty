
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/pace/pace.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/vendor/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/vendor/Flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/vendor/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/vendor/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('assets/vendor/flot.tooltip/jquery.flot.tooltip.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('assets/scripts/klorofilpro-common.min.js') }}"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="{{ asset('assets/vendor/datatables/js-bootstrap/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables-colreorder/dataTables.colReorder.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables-tabletools/js/dataTables.tableTools.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/clockpicker/bootstrap-clockpicker.min.js') }}"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>

        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });

    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
    $(document).ready(function() {
        $('#example1').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
    $(document).ready(function() {
        $('#example3').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
    $(document).ready(function() {
        $('#example2').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
        $(document).ready(function() {
            $('#example4').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );

        $(document).ready(function() {
            $('#example5').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );

        $(document).ready(function() {
            $('#example6').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );

        $(document).ready(function() {
            $('#example7').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );

        $(document).ready(function() {
            $('#example8').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );

        $(document).ready(function() {
            $('#example9').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );

    $(function()
    {
        // datatable column with reorder extension
        $('#datatable-column-reorder').dataTable(
            {
                pagingType: "full_numbers",
                sDom: "RC" +
                "t" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
                colReorder: true,
            });
        // datatable with column filter enabled
        var dtTable = $('#datatable-column-filter').DataTable(
            { // use DataTable, not dataTable
                sDom: // redefine sDom without lengthChange and default search box
                "t" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>"
            });
        $('#datatable-column-filter thead').append('<tr class="row-filter"><th></th><th></th><th></th><th></th><th></th></tr>');
        $('#datatable-column-filter thead .row-filter th').each(function()
        {
            $(this).html('<input type="text" class="form-control input-sm" placeholder="Search...">');
        });
        $('#datatable-column-filter .row-filter input').on('keyup change', function()
        {
            dtTable
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
        // datatable with paging options and live search
        $('#featured-datatable').dataTable(
            {
                sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
            });
        // datatable with export feature
        var exportTable = $('#datatable-data-export').DataTable(
            {
                sDom: "T<'clearfix'>" +
                "<'row'<'col-sm-6'l><'col-sm-6'f>r>" +
                "t" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
                "tableTools":
                    {
                        "sSwfPath": "assets/vendor/datatables-tabletools/swf/copy_csv_xls_pdf.swf"
                    }
            });
        // datatable with scrolling
        $('#datatable-basic-scrolling').dataTable(
            {
                scrollY: "300px",
                scrollCollapse: true,
                paging: false
            });
    });
</script>



<script>
    $(function()
    {
        // donut chart
        var data = [
            {
                label: "Social",
                data: 45
            },
            {
                label: "Referral",
                data: 26
            },
            {
                label: "Organic",
                data: 14
            },
            {
                label: "Others",
                data: 15
            }];
        $.plot('#traffic-sources-chart', data,
            {
                series:
                    {
                        pie:
                            {
                                show: true,
                                innerRadius: 0.5,
                                stroke:
                                    {
                                        width: 4,
                                        color: "#F9F9F9"
                                    },
                                label:
                                    {
                                        show: true,
                                        radius: 3 / 4,
                                        formatter: donutLabelFormatter,
                                    },
                            },
                    },
                legend:
                    {
                        backgroundOpacity: 0
                    },
                colors: ["#FF4402", "#AB7DF6", "#F3BB23", "#20B2AA"],
            });
        function donutLabelFormatter(label, series)
        {
            return "<div class=\"flot-donut-label\">" + Math.round(series.percent) + "%</div>";
        }
        // sales performance chart
        var puzzle = [
            [gt(2013, 10, 21), 188],
            [gt(2013, 10, 22), 205],
            [gt(2013, 10, 23), 250],
            [gt(2013, 10, 24), 230],
            [gt(2013, 10, 25), 245],
            [gt(2013, 10, 26), 260],
            [gt(2013, 10, 27), 290]
        ];
        var qrcode = [
            [gt(2013, 10, 21), 100],
            [gt(2013, 10, 22), 110],
            [gt(2013, 10, 23), 155],
            [gt(2013, 10, 24), 120],
            [gt(2013, 10, 25), 135],
            [gt(2013, 10, 26), 150],
            [gt(2013, 10, 27), 175]
        ];
        var easypolls = [
            [gt(2013, 10, 21), 75],
            [gt(2013, 10, 22), 65],
            [gt(2013, 10, 23), 80],
            [gt(2013, 10, 24), 60],
            [gt(2013, 10, 25), 65],
            [gt(2013, 10, 26), 80],
            [gt(2013, 10, 27), 110]
        ];
        plot = $.plot($('#sales-performance-chart'), [
                {
                    data: puzzle,
                    label: "Puzzle"
                },
                {
                    data: qrcode,
                    label: "QRCode"
                },
                {
                    data: easypolls,
                    label: "EasyPolls"
                }],
            {
                bars:
                    {
                        show: true,
                        barWidth: 28 * 60 * 60 * 300,
                        align: "center",
                        fill: true,
                        order: true,
                        lineWidth: 0,
                        fillColor:
                            {
                                colors: [
                                    {
                                        opacity: 1
                                    },
                                    {
                                        opacity: 1
                                    }]
                            }
                    },
                grid:
                    {
                        hoverable: true,
                        clickable: true,
                        borderWidth: 0,
                        tickColor: "#E4E4E4",
                    },
                colors: ["#56B9B7", "#5666B9", "#FF4402"],
                xaxis:
                    {
                        mode: "time",
                        timezone: "browser",
                        minTickSize: [1, "day"],
                        timeformat: "%a",
                        font:
                            {
                                color: "#676a6d"
                            },
                        tickColor: "#fafafa",
                        autoscaleMargin: 0.2
                    },
                yaxis:
                    {
                        font:
                            {
                                color: "#676a6d"
                            },
                        ticks: 8,
                    },
                legend:
                    {
                        labelBoxBorderColor: "transparent",
                        backgroundColor: "transparent"
                    },
                tooltip: true,
                tooltipOpts:
                    {
                        content: '%s: %y'
                    }
            });
        function gt(y, m, d)
        {
            return new Date(y, m - 1, d).getTime();
        }
        // project progress bars
        $('.progress .progress-bar').progressbar(
            {
                display_text: 'fill'
            });
    });
</script>

<script>
    $(function()
    {
        $('#btn-sw-success').on('click', function()
        {
            swal(
                'Good job!',
                'You clicked the button!',
                'success'
            ).catch(swal.noop);
        });
        $('#btn-sw-error').on('click', function()
        {
            swal(
                'Error!',
                'Please check again',
                'error'
            ).catch(swal.noop);
        });
        $('#btn-sw-warning').on('click', function()
        {
            swal(
                'Warning!',
                'Your storage is almost full',
                'warning'
            ).catch(swal.noop);
        });
        $('#btn-sw-info').on('click', function()
        {
            swal(
                'Hello!',
                'Welcome to Klorofil Pro',
                'info'
            ).catch(swal.noop);
        });
        $('#btn-sw-question').on('click', function()
        {
            swal(
                'Any question?',
                'Please contact us at support@themeineed.com',
                'info'
            ).catch(swal.noop);
        });
        $('#btn-sw-confirmation').on('click', function()
        {
            swal(
                {
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#F9354C',
                    cancelButtonColor: '#41B314',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function()
            {
                swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );
            }).catch(swal.noop);
        });
        $('#btn-sw-confirmation2').on('click', function()
        {
            swal(
                {
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: '#F9354C',
                    cancelButtonColor: '#41B314',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function()
            {
                swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                ).catch(swal.noop);
            }, function(dismiss)
            {
                if (dismiss === 'cancel')
                {
                    swal(
                        'Cancelled',
                        'Your file is safe',
                        'info'
                    ).catch(swal.noop);
                }
            });
        });
        $('#btn-sw-chaining').on('click', function()
        {
            swal.setDefaults(
                {
                    input: 'text',
                    confirmButtonText: 'Next &rarr;',
                    showCancelButton: true,
                    animation: false,
                    progressSteps: ['1', '2', '3']
                });
            var steps = [
                {
                    title: 'Question 1',
                    text: 'What\'s your name?'
                },
                {
                    title: 'Question 2',
                    text: 'How old are you?'
                },
                {
                    title: 'Question 3',
                    text: 'Where are you come from?'
                }];
            swal.queue(steps).then(function(result)
            {
                swal.resetDefaults();
                swal(
                    {
                        title: 'All done!',
                        html: 'Your answer: <pre>' +
                        JSON.stringify(result) +
                        '</pre>',
                        confirmButtonText: 'Confirm!',
                        showCancelButton: false
                    }, function()
                    {
                        swal.resetDefaults();
                    });
            }).catch(function()
            {
                swal.resetDefaults();
                swal.noop;
            });
        });
        $('#btn-sw-dynamic').on('click', function()
        {
            swal.queue([
                {
                    title: 'Your public IP',
                    confirmButtonText: 'Show my public IP',
                    text: 'Your public IP will be received via AJAX request',
                    showLoaderOnConfirm: true,
                    preConfirm: function()
                    {
                        return new Promise(function(resolve)
                        {
                            $.get('https://api.ipify.org/?format=json')
                                .done(function(data)
                                {
                                    swal.insertQueueStep(data.ip);
                                    resolve();
                                });
                        });
                    }
                }]).catch(swal.noop);
        });
        $('#btn-sw-ajax').on('click', function()
        {
            swal(
                {
                    title: 'Submit your email',
                    text: 'Use taken@example.com to simulate AJAX error',
                    input: 'email',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,
                    preConfirm: function(email)
                    {
                        return new Promise(function(resolve, reject)
                        {
                            setTimeout(function()
                            {
                                if (email === 'taken@example.com')
                                {
                                    reject('This email is already taken.');
                                }
                                else
                                {
                                    resolve();
                                }
                            }, 2000);
                        });
                    },
                    allowOutsideClick: false,
                }).then(function(email)
            {
                swal(
                    {
                        type: 'success',
                        title: 'Ajax request finished!',
                        html: 'Submitted email: ' + email
                    });
            }).catch(swal.noop);
        });
        $('#btn-sw-text').on('click', function()
        {
            swal(
                {
                    title: 'Input something',
                    text: 'Try to input blank input to simulate error',
                    input: 'text',
                    showCancelButton: true,
                    inputValidator: function(value)
                    {
                        return new Promise(function(resolve, reject)
                        {
                            if (value)
                            {
                                resolve();
                            }
                            else
                            {
                                reject('You need to write something!');
                            }
                        });
                    }
                }).then(function(result)
            {
                swal(
                    {
                        type: 'success',
                        html: 'You entered: ' + result
                    });
            }).catch(swal.noop);
        });
        $('#btn-sw-email').on('click', function()
        {
            swal(
                {
                    title: 'Input email address',
                    input: 'email'
                }).then(function(email)
            {
                swal(
                    {
                        type: 'success',
                        html: 'Entered email: ' + email
                    });
            }).catch(swal.noop);
        });
        $('#btn-sw-url').on('click', function()
        {
            swal(
                {
                    title: 'Input URL',
                    input: 'url'
                }).then(function(url)
            {
                swal(
                    {
                        type: 'success',
                        html: 'Entered URL: ' + url
                    });
            }).catch(swal.noop);
        });
        $('#btn-sw-password').on('click', function()
        {
            swal(
                {
                    title: 'Enter your password',
                    input: 'password',
                    inputAttributes:
                        {
                            'maxlength': 10,
                            'autocapitalize': 'off',
                            'autocorrect': 'off'
                        }
                }).then(function(password)
            {
                if (password)
                {
                    swal(
                        {
                            type: 'success',
                            html: 'Entered password: ' + password
                        });
                }
            }).catch(swal.noop);
        });
        $('#btn-sw-textarea').on('click', function()
        {
            swal(
                {
                    input: 'textarea',
                    showCancelButton: true
                }).then(function(text)
            {
                if (text)
                {
                    swal(text);
                }
            }).catch(swal.noop);
        });
        $('#btn-sw-select').on('click', function()
        {
            swal(
                {
                    title: 'Select Ukraine',
                    input: 'select',
                    inputOptions:
                        {
                            'SRB': 'Serbia',
                            'UKR': 'Ukraine',
                            'HRV': 'Croatia'
                        },
                    inputPlaceholder: 'Select country',
                    showCancelButton: true,
                    inputValidator: function(value)
                    {
                        return new Promise(function(resolve, reject)
                        {
                            if (value === 'UKR')
                            {
                                resolve();
                            }
                            else
                            {
                                reject('You need to select Ukraine :)');
                            }
                        });
                    }
                }).then(function(result)
            {
                swal(
                    {
                        type: 'success',
                        html: 'You selected: ' + result
                    });
            }).catch(swal.noop);
        });
        $('#btn-sw-radio').on('click', function()
        {
            var inputOptions = new Promise(function(resolve)
            {
                setTimeout(function()
                {
                    resolve(
                        {
                            '#ff0000': 'Red',
                            '#00ff00': 'Green',
                            '#0000ff': 'Blue'
                        })
                }, 2000);
            });
            swal(
                {
                    title: 'Select color',
                    input: 'radio',
                    inputOptions: inputOptions,
                    inputValidator: function(result)
                    {
                        return new Promise(function(resolve, reject)
                        {
                            if (result)
                            {
                                resolve();
                            }
                            else
                            {
                                reject('You need to select something!');
                            }
                        });
                    }
                }).then(function(result)
            {
                swal(
                    {
                        type: 'success',
                        html: 'You selected: ' + result
                    });
            }).catch(swal.noop);
        });
        $('#btn-sw-checkbox').on('click', function()
        {
            swal(
                {
                    title: 'Terms and conditions',
                    input: 'checkbox',
                    inputPlaceholder: 'I agree with the terms and conditions',
                    confirmButtonText: 'Continue <i class="fa fa-arrow-right"></i>',
                    inputValidator: function(result)
                    {
                        return new Promise(function(resolve, reject)
                        {
                            if (result)
                            {
                                resolve();
                            }
                            else
                            {
                                reject('You need to agree with T&C')
                            }
                        });
                    }
                }).then(function(result)
            {
                swal(
                    {
                        type: 'success',
                        text: 'You agreed with T&C :)'
                    });
            }).catch(swal.noop);
        });
        $('#btn-sw-file').on('click', function()
        {
            swal(
                {
                    title: 'Select image',
                    input: 'file',
                    inputAttributes:
                        {
                            accept: 'image/*'
                        }
                }).then(function(file)
            {
                var reader = new FileReader
                reader.onload = function(e)
                {
                    swal(
                        {
                            imageUrl: e.target.result
                        });
                }
                reader.readAsDataURL(file);
            }).catch(swal.noop);
        });
        $('#btn-sw-range').on('click', function()
        {
            swal(
                {
                    title: 'How old are you?',
                    type: 'question',
                    input: 'range',
                    inputAttributes:
                        {
                            min: 8,
                            max: 120,
                            step: 1
                        },
                    inputValue: 25
                }).catch(swal.noop);
        });
    });
</script>
</body>
</html>
