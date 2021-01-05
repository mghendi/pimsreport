<?php
// Variables here
$month = Date("M") . ' ' . Date("Y");
$division = ucwords('Africa');
include_once('dynamic_algo.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>A4 Report</title>
	<link rel="stylesheet" href="assets/css/highcharts.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<style type="text/css">
		body {
			background: rgb(204,204,204);
			font-family: 'Roboto', sans-serif;
			color: #707070;
		}
		page {
			background: white;
			display: block;
			margin: 0 auto;
			margin-bottom: 0.5cm;
			box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
		}
		page[size="A4"] {
			width: 21cm;
			height: 29.7cm;
		}
		page[size="A4"][layout="landscape"] {
			width: 29.7cm;
			height: 21cm;
		}
		page[size="A3"] {
			width: 29.7cm;
			height: 42cm;
		}
		page[size="A3"][layout="landscape"] {
			width: 42cm;
			height: 29.7cm;
		}
		page[size="A5"] {
			width: 14.8cm;
			height: 21cm;
		}
		page[size="A5"][layout="landscape"] {
			width: 21cm;
			height: 14.8cm;
		}
		.highcharts-container {
		  	margin: 0 auto;
		}
		@media print {
			body, page {
				margin: 0;
				box-shadow: 0;
			}
		}
	</style>

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>

	<script src="assets/vendor/jquery/jquery.min.js"></script>
</head>
<body>
	<page size="A4">
		<div class="page-margin" style="padding: 0.8cm 1.32cm 0.8cm 1.32cm;">
			<div class="page-content" style="height: 28.1cm; width: 18.36cm; max-height: 28.1cm; max-width: 18.36cm;">
				<div class="header" style="display: -ms-flexbox;display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap; border-bottom: 0.1cm solid #707070; margin-bottom: 0.2cm;">
					<div class="logo" style="position: relative;width: 100%;-ms-flex: 0 0 30%;flex: 0 0 30%;max-width: 30%;margin-bottom: 0.2cm;">
						<img src="assets/images/pimslogo.png" style="max-width: 100%">
					</div>
					<div class="title" style="position: relative;width: 100%;-ms-flex: 0 0 50%;flex: 0 0 50%;max-width: 50%;margin-bottom: 0.2cm;text-align: center;">
						<h1 style="margin: 0;font-weight: 500;font-size: 0.8cm;color: #333;letter-spacing: 0;">
							<?php echo $processed_divisiondata[$division]["entity"]; ?>
						</h1>
						<h6 style="margin: 0;letter-spacing: 0;color: #707070;padding-top: 0cm;font-size: 0.35cm;font-weight: 400;">
							Programme Delivery Report
						</h6>
					</div>
                    <div class="stamp" style="position: relative;width: 100%;-ms-flex: 0 0 20%;flex: 0 0 20%;max-width: 20%;margin-bottom: 0.2cm;text-align: right;">
                        <table style="border-collapse: collapse; float: right;">
                            <tr>
                                <td colspan="2">
                                    <p style="margin: 0;font-size: 0.35cm;font-weight: 400;">
                                        <?php echo $month; ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: bottom;">
                                    <p style="font-size: 0.6cm;text-align: right;font-weight: 600;margin:0;">
                                        <?php echo $processed_divisiondata[$division]["reportedprojectspct"];?>%
                                    </p>
                                </td>
                                <td width="1cm">
                                    <div class="healthrating_box" style="border-radius: 50%;width: 0.6cm;height: 0.6cm;float: right;background-color:<?php echo $processed_divisiondata[$division]["healthcolor"];?>; margin-top: 0cm">&nbsp;</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p style="margin: 0;font-size: 0.3cm;color: #17a2b8;">Average Reporting %</p>
                                </td>
                            </tr>
                        </table>
                    </div>
				</div>
				<div class="body" style="display: -ms-flexbox;display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap; border-bottom: 0.1cm solid #707070; margin-bottom: 0.5cm; padding: 0.2cm 0 0.2cm">
					<div class="left" style="position: relative;width: 100%;-ms-flex: 0 0 50%;flex: 0 0 50%;max-width: 50%;margin-bottom: 0.2cm;text-align: left;background-color: #f6f6f6;">
						<h5 style="margin: 0.2cm 0.4cm;font-size: 0.45cm;font-weight: 500;color: #333;">Summary</h5>
						<p style="margin: 0.2cm 0.4cm 0.4cm;text-align: justify;font-size: 0.33cm;font-weight: 300;line-height: 0.5cm;">The dashboard captured financial data of <strong><?php echo $processed_divisiondata[$division]["totalprojects"];?> projects</strong> for the <?php echo $division; ?> Division. The overall budget recorded for this portfolio as of 2020 was <strong>(USD. <?php echo number_format($processed_divisiondata[$division]["consumablebudget"], 0, '.', ',');?>)</strong>, capturing a rolling total of the cash received over time.</p>
						<p style="display:none;margin: 0.2cm 0.4cm 0.4cm;text-align: justify;font-size: 0.33cm;font-weight: 300;line-height: 0.5cm;">Out of the <? echo $projects; ?>, <strong><? echo $keystoneprojects; ?></strong>, these are projects with dollar value of $ 10 million and above, contributing to <strong>USD. <? echo $fundedactivities; ?></strong> of the overall budget. Keystone projects are projects of significant value to the organization as they attract a higher dollar value and require further scrutiny by management, in comparison to other projects.</p>
					</div>
					<div class="right" style="position: relative;width: 100%;-ms-flex: 0 0 50%;flex: 0 0 50%;max-width: 50%;margin-bottom: 0.2cm;text-align: left;background-color: #f6f6f6;">
						<h5 style="margin: 0.2cm 0.4cm;font-size: 0.45cm;font-weight: 500;color: #333;">&nbsp;</h5>
						<div style="display: -ms-flexbox;display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap; margin:0 0.4cm">
							<div style="position: relative;width: 100%;-ms-flex: 0 0 33%;flex: 0 0 33%;max-width: 33%;margin-bottom: 0.5cm;text-align: left;background-color: #f6f6f6;">
								<div style="text-align: center; color: #0077b6;">
									<p style="margin: 0;font-size: 0.5cm;font-weight: 600;"><?php echo number_format($processed_divisiondata[$division]["totalprojects"],0,'.',',');?></p>
									<p style="margin: 0;font-size: 0.3cm;font-weight: 400;">Total Projects</p>
								</div>
							</div>
							<div style="position: relative;width: 100%;-ms-flex: 0 0 33%;flex: 0 0 33%;max-width: 33%;margin-bottom: 0.5cm;text-align: left;background-color: #f6f6f6;">
								<div style="text-align: center; color: #17a2b8;">
									<p style="margin: 0;font-size: 0.5cm;font-weight: 600;"><?php echo number_format($processed_divisiondata[$division]["totaloutputs"],0,'.',',');?></p>
									<p style="margin: 0;font-size: 0.3cm;font-weight: 400;">Total Outputs</p>
								</div>
							</div>
							<div style="position: relative;width: 100%;-ms-flex: 0 0 33%;flex: 0 0 33%;max-width: 33%;margin-bottom: 0.5cm;text-align: left;background-color: #f6f6f6;">
								<div style="text-align: center; color: #688753;">
									<p style="margin: 0;font-size: 0.5cm;font-weight: 600;"><?php echo number_format($processed_divisiondata[$division]["totalactivities"],0,'.',',');?></p>
									<p style="margin: 0;font-size: 0.3cm;font-weight: 400;">Total Activities</p>
								</div>
							</div>
							

							<div style="position: relative;width: 100%;-ms-flex: 0 0 50%;flex: 0 0 50%;max-width: 50%;margin-bottom: 0.5cm;text-align: left;background-color: #f6f6f6;">
								<div id="chart1"></div>
							</div>
							<div style="position: relative;width: 100%;-ms-flex: 0 0 100%;flex: 0 0 100%;max-width: 100%;margin-bottom: 0.5cm;text-align: left;background-color: #f6f6f6;">
								<div id="chart2"></div>
								<script type="text/javascript">
									Highcharts.chart('chart2', {
									    colors: ['#17a2b8'],
									    credits: {
									        text: ''
									    },
									    chart: {
									        backgroundColor: '#F6F6F6',
									        type: 'column',
									        height: 150
									    },
									    title: {
									        text: 'Budget Utilization',
									        floating: true,
									        align: 'center',
                                            verticalAlign: 'bottom',
                                            margin: 0,
                                            style: {
                                                color: '#707070',
                                                fontSize: '12px',
                                                fontWeight: '500',
                                                textTransform: 'none'
                                            },
        									x: 30,
        									y: 30,
        									/*style: {
        										fontSize: '0.35cm',
        										fontWeight: 'bold'
        									}*/
									    },
									    xAxis: {
									        categories: [
									            'Consumable Budget',
									            'Consumed Budget',
									            'Budget Balance'
									        ],
									        labels: {
									            style: {
									                fontSize: '0.2cm'
									            },
									            formatter: function() {
												    var ret = this.value,
												        len = ret.length;
												    //console.log(len);
												    if (len > 10) {
												    	ret = ret.split(' ')[0] + '<br/>' +ret.split(' ')[1]
												    }
												    if (len > 25) {
												        ret = ret.slice(0, 25) + '...';
												    }
												    return ret;
												}
									        },
									        crosshair: true
									    },
									    yAxis: {
									        min: 0,
									        title: {
									            text: 'USD (M)'
									        },
									        labels: {
									            style: {
									                fontSize: '0.2cm'
									            }
									        }
									    },
									    tooltip: {
									        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
									        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
									            '<td style="padding:0"><b>USD {point.y:.1f} M</b></td></tr>',
									        footerFormat: '</table>',
									        shared: true,
									        useHTML: true
									    },
									    plotOptions: {
									        column: {
									            pointPadding: 0.2,
									            borderWidth: 0,
                                                dataLabels: {
                                                    enabled: true,
                                                    formatter: function() {
                                                        return '$ ' + Highcharts.numberFormat(this.y,2) + 'M';
                                                    }
                                                }
									        }
									    },
									    series: [{
									        name: '2020',
									        data: [
                                                <? echo $processed_divisiondata[$division]["consumablebudget"]/1000000; ?>, 
                                                <? echo $processed_divisiondata[$division]["totalconsumedbudget"]/1000000; ?>, 
                                                <?php echo ($processed_divisiondata[$division]["consumablebudget"] - $processed_divisiondata[$division]["totalconsumedbudget"])/1000000; ?>],
                                            showInLegend: false

									    }]
									});
								</script>
							</div>
						</div>
					</div>


					<div class="left" style="position: relative;width: 100%;-ms-flex: 0 0 50%;flex: 0 0 50%;max-width: 50%;margin-bottom: 0.2cm;text-align: left;">
						<h5 style="margin: 0.4cm;font-size: 0.45cm;font-weight: 500;color: #333;">Portfolio Statistics</h5>
						<div class="container" style="display: -ms-flexbox;display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap;">
							<div id="budgetutilized" style="position: relative;width: 33%;-ms-flex: 0 0 33%;flex: 0 0 33%;max-width: 33%;margin-bottom: 0.2cm;text-align: left;">
                                <div id="budgetutilized_chart" style="height: 100px"></div>
                                <script type="text/javascript">
                                    Highcharts.chart('budgetutilized_chart', {
                                        chart: {
                                            plotBackgroundColor: null,
                                            plotBorderWidth: 0,
                                            plotShadow: false
                                        },
                                        colors: ['#0077b6','#ccc'],
                                        credits: {
                                            enabled: false
                                        },
                                        title: {
                                            text: '<?php echo number_format($processed_divisiondata[$division]["pctbudgetutilized"], 0, '.', ','); ?>%',
                                            align: 'center',
                                            verticalAlign: 'middle',
                                            y: 20
                                        },
                                        tooltip: {
                                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                        },
                                        accessibility: {
                                            point: {
                                                valueSuffix: '%'
                                            }
                                        },
                                        plotOptions: {
                                            pie: {
                                                dataLabels: {
                                                    enabled: false,
                                                    distance: -50,
                                                    style: {
                                                        fontWeight: 'bold',
                                                        color: 'white'
                                                    }
                                                },
                                                startAngle: -90,
                                                endAngle: 90,
                                                center: ['50%', '75%'],
                                                size: '200%'
                                            }
                                        },
                                        series: [{
                                            type: 'pie',
                                            name: 'Avg. Time Taken',
                                            innerSize: '70%',
                                            data: [
                                                ['Time Taken', <?php echo $processed_divisiondata[$division]["pctbudgetutilized"]; ?> ],
                                                {
                                                    name: '',
                                                    y: <?php echo (100 - $processed_divisiondata[$division]["pctbudgetutilized"]);  ?>,
                                                    dataLabels: {
                                                        enabled: false
                                                    }
                                                }
                                            ]
                                        }]
                                    });
                                </script>
                                <p>% Budget Spent</p>
                            </div>
                            <div id="timetaken" style="position: relative;width: 33%;-ms-flex: 0 0 33%;flex: 0 0 33%;max-width: 33%;margin-bottom: 0.2cm;text-align: left;">
                                <!--<p><?php echo $processed_divisiondata[$division]["pctgdurationused"]; ?> % used</p>
                                <p>% Time Used</p>-->


                                <div id="timetaken_chart" style="height: 100px"></div>
                                <script type="text/javascript">
                                    Highcharts.chart('timetaken_chart', {
                                        chart: {
                                            plotBackgroundColor: null,
                                            plotBorderWidth: 0,
                                            plotShadow: false
                                        },
                                        colors: ['#688753','#ccc'],
                                        credits: {
                                            enabled: false
                                        },
                                        title: {
                                            text: '<?php echo number_format($processed_divisiondata[$division]["pctgdurationused"], 0, '.', ','); ?>%',
                                            align: 'center',
                                            verticalAlign: 'middle',
                                            y: 20
                                        },
                                        tooltip: {
                                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                        },
                                        accessibility: {
                                            point: {
                                                valueSuffix: '%'
                                            }
                                        },
                                        plotOptions: {
                                            pie: {
                                                dataLabels: {
                                                    enabled: false,
                                                    distance: -50,
                                                    style: {
                                                        fontWeight: 'bold',
                                                        color: 'white'
                                                    }
                                                },
                                                startAngle: -90,
                                                endAngle: 90,
                                                center: ['50%', '75%'],
                                                size: '200%'
                                            }
                                        },
                                        series: [{
                                            type: 'pie',
                                            name: 'Activities Completed',
                                            innerSize: '70%',
                                            data: [
                                                ['Time Taken', <?php echo $processed_divisiondata[$division]["pctgdurationused"]; ?> ],
                                                {
                                                    name: '',
                                                    y: <?php echo (100 - $processed_divisiondata[$division]["pctgdurationused"]);  ?>,
                                                    dataLabels: {
                                                        enabled: false
                                                    }
                                                }
                                            ]
                                        }]
                                    });
                                </script>
                                <p>% Time Used</p>
							</div>
							<div id="activitiescompleted" style="position: relative;width: 33%;-ms-flex: 0 0 33%;flex: 0 0 33%;max-width: 33%;margin-bottom: 0.2cm;text-align: left;">
								<div id="activitiescompleted_chart" style="height: 100px"></div>
								<script type="text/javascript">
									Highcharts.chart('activitiescompleted_chart', {
									    chart: {
									        plotBackgroundColor: null,
									        plotBorderWidth: 0,
									        plotShadow: false
									    },
                                        colors: ['#688753','#ccc'],
									    credits: {
									        enabled: false
									    },
									    title: {
									        text: '<?php echo number_format($processed_divisiondata[$division]["avgactivitiescompleted"], 0, '.', ','); ?>%',
									        align: 'center',
									        verticalAlign: 'middle',
									        y: 20
									    },
                                        tooltip: {
									        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
									    },
									    accessibility: {
									        point: {
									            valueSuffix: '%'
									        }
									    },
									    plotOptions: {
									        pie: {
									            dataLabels: {
									                enabled: false,
									                distance: -50,
									                style: {
									                    fontWeight: 'bold',
									                    color: 'white'
									                }
									            },
									            startAngle: -90,
									            endAngle: 90,
									            center: ['50%', '75%'],
									            size: '200%'
									        }
									    },
									    series: [{
									        type: 'pie',
									        name: 'Activities Completed',
									        innerSize: '70%',
									        data: [
									            ['Time Taken', <?php echo $processed_divisiondata[$division]["avgactivitiescompleted"]; ?> ],
									            {
									                name: '',
									                y: <?php echo (100 - $processed_divisiondata[$division]["avgactivitiescompleted"]);  ?>,
									                dataLabels: {
									                    enabled: false
									                }
									            }
									        ]
									    }]
									});
								</script>
                                <p>% Activities Completed</p>
							</div>
							
						</div>
						<div class="container" style="display: -ms-flexbox;display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap;">
							<div id="projectdis" style="position: relative;width: 100%;-ms-flex: 0 0 100%;flex: 0 0 100%;max-width: 100%;margin-bottom: 0.2cm;text-align: left;">
								<div id="budgetsize_chart"></div>
								<script type="text/javascript">
									Highcharts.chart('budgetsize_chart', {
									    chart: {
									        type: 'bar',
									        height: 240
									    },
									    title: {
									        text: 'Grouping by Budget Size'
									    },
									    subtitle: {
									        text: ''
									    },
									    xAxis: {
									        categories: ['0-1 M', '1-2 M', '2-5 M', '5-10 M', '10+ M'],
									        title: {
									            text: null
									        }
									    },
									    yAxis: {
									        min: 0,
									        title: {
									            text: 'US Millions',
									            align: 'high'
									        },
									        labels: {
									            overflow: 'justify'
									        }
									    },
									    tooltip: {
									        valueSuffix: ' millions'
									    },
									    plotOptions: {
									        bar: {
									            dataLabels: {
									                enabled: true
									            },
									            pointPadding: 0,
									            groupPadding: 0.1
									        }
									    },
									    credits: {
									        enabled: false
									    },
									    series: [{
									        name: 'Grant Funding',
									        data: [26197640, 75917439, 216143282, 196345716, 89225351],
									        color: '#4e90e0'
									    }]
									});
								</script>
							</div>

							<div id="budgetsize" style="position: relative;width: 100%;-ms-flex: 0 0 100%;flex: 0 0 100%;max-width: 100%;margin-bottom: 0.2cm;text-align: left;">
								<div id="budgetsize_chart"></div>
								<script type="text/javascript">
									Highcharts.chart('budgetsize_chart', {
									    chart: {
									        type: 'bar',
									        height: 240
									    },
									    title: {
									        text: 'Grouping by Budget Size'
									    },
									    subtitle: {
									        text: ''
									    },
									    xAxis: {
									        categories: ['0-1 M', '1-2 M', '2-5 M', '5-10 M', '10+ M'],
									        title: {
									            text: null
									        }
									    },
									    yAxis: {
									        min: 0,
									        title: {
									            text: 'US Millions',
									            align: 'high'
									        },
									        labels: {
									            overflow: 'justify'
									        }
									    },
									    tooltip: {
									        valueSuffix: ' millions'
									    },
									    plotOptions: {
									        bar: {
									            dataLabels: {
									                enabled: true
									            },
									            pointPadding: 0,
									            groupPadding: 0.1
									        }
									    },
									    credits: {
									        enabled: false
									    },
									    series: [{
									        name: 'Grant Funding',
									        data: [26197640, 75917439, 216143282, 196345716, 89225351],
									        color: '#4e90e0'
									    }]
									});
								</script>
							</div>
						</div>

					</div>
				</div>
				<div class="footer">Footer</div>
			</div>
		</div>
	</page>
	<page size="A4">
		<div class="page-margin" style="padding: 1.9cm 1.32cm 3.67cm 1.9cm;">
			<div class="page-content" style="height: 23.49cm; width: 17.78cm; max-height: 23.49cm; max-width: 17.78cm;">
				<div class="header">Header</div>
				<div class="body">Body</div>
				<div class="footer">Footer</div>
			</div>
		</div>
	</page>
</body>
</html>
