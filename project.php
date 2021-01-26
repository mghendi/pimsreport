<?php
$month = Date("M") . ' ' . Date("Y");
/*$office = array('Europe', 'Economy', 'Disasters and Conflicts', 'Latin America', 'Asia Pacific', 'Law', 'Communication', 'Ecosystems', 'Science', 'Africa', 'West Asia');
$officeid = (isset($_GET['office'])) ? $_GET['office'] : 0;
$division = $office[$officeid];*/
include_once 'projects_algo.php';
$projectid = (isset($_GET['id'])) ? strtoupper($_GET['id']) : strtoupper(key($projectlisting));
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $projectlisting[$projectid]["id"];?> | PIMS+ Report</title>
	<!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/highcharts.css">

    <!-- Vendor JS -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <script src="assets/js/main.js"></script>

    <!-- HTML TO PDF LIB LOADED -->
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 hidden "><!-- shadow -->
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="javascript:void(0);">KIRI</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 disabled" disabled="disabled" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">@rbwafula</a>
            </li>
        </ul>
    </nav>

    <!-- THE DIVISION TO BE EXPORTED MARKED -->
    <div id="to_export">

    <div class="container-fluid printlandscape">
        <div class="row noprint" data-html2canvas-ignore="true">
            <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Project Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                       <select class="projectlisting"  name="projectlist" onchange="location=this.value;">
                            <?php
                            $projectlisting_keys = array_keys($projectlisting);
                            for ($i=0;$i<count($projectlisting);$i++) {
                                $selecteditem = ($projectlisting[$projectlisting_keys[$i]]["id"] == $projectid) ? 'selected="selected"' : '';
                                echo '<option value="project.php?id='.$projectlisting[$projectlisting_keys[$i]]["id"].'" '.$selecteditem.'>'.$projectlisting[$projectlisting_keys[$i]]["title"].'</option>';
                            }
                            ?>
                        </select>
                        <div class="btn-group ml-2">
                            <!--<button type="button" class="btn btn-sm btn-outline-secondary" onclick="javascript:void(0);">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print();return false;">Export to PDF</button>-->
                            <!-- TRIGGER FOR THE HTML TO PDF FUNCTION -->
                            <a class="btn btn-sm btn-outline-secondary" target="_new" href="printproject.php?id=<?php echo $officeid; ?>">Print PDF</a>
                            <!--<button type="button" class="btn btn-sm btn-outline-secondary" onclick="jsp();"> PDF</button>-->
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div id="toprint" class="toprint">
            <div class="row reportheader">
                <div class="col-md-4 logo">
                    <img class="logo" src="assets/images/pimslogo.png">
                </div>
                <div class="col-md-6 title">
                    <h1><?php echo $projectlisting[$projectid]["title"]; ?></h1>
                    <h6>Project Delivery Report</h6>
                </div>
                <div class="col-md-2 health">
                    <p class="reportdate">Jan 2021</p>
                    <p class="healthrating_box" style="background-color:<?php echo $projectlisting[$projectid]["healthcolor"]; ?>;">&nbsp;</p>
                    <p class="healthratingdesc">Project Rating</p>
                </div>
            </div>

            <div class="row reportbody section1">
                <div class="col-md-6 summary">
                    <h5 class="sectiontitle">Summary</h5>
                    <div class="row summarystatistics">
                        <div class="col metric1">
                            <p class="metricvalue">
                                <?php echo number_format($projectlisting[$projectid]["fundamount"], 0, '.', ','); ?>
                            </p>
                            <p class="metricdesc">Fund<br/>Amount</p>
                        </div>
                        <div class="col metric2">
                            <p class="metricvalue">
                                <?php echo number_format($projectlisting[$projectid]["prodocamount"], 0, '.', ','); ?>
                            </p>
                            <p class="metricdesc">Prodoc<br/>Amount</p>
                        </div>
                        <div class="col metric3">
                            <p class="metricvalue">
                                <?php echo number_format($projectlisting[$projectid]["outputscount"], 0, '.', ','); ?>
                            </p>
                            <p class="metricdesc">Total<br/>Outputs</p>
                        </div>
                        <div class="col metric4">
                            <p class="metricvalue">
                                <?php echo number_format($projectlisting[$projectid]["activitiescount"], 0, '.', ','); ?>
                            </p>
                            <p class="metricdesc">Total<br/>Activities</p>
                        </div>
                        <div class="col metric5">
                            <p class="metricvalue">
                                <?php echo number_format($projectlisting[$projectid]["duration"], 0, '.', ','); ?>
                            </p>
                            <p class="metricdesc">Project<br/>Duration</p>
                        </div>
                        <div class="col metric6">
                            <p class="metricvalue">
                                <?php echo number_format($projectlisting[$projectid]["rank"], 0, '.', ','); ?>
                            </p>
                            <p class="metricdesc">Project<br/>Rank</p>
                        </div>
                    </div>
                    <p class="summarytext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
                </div>
                <div class="col-md-6">
                    <!-- -->
                    <h5 class="sectiontitle">Budget Classes</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <!--Budget classes table here
                            <hr/>-->
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Budget Class</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i=0;$i<count($projectlisting[$projectid]["budgetclass"]["names"]);$i++) {
                                    echo '<tr>';
                                    echo '<td>'.($i+1).'</td>';
                                    echo '<td>'.$projectlisting[$projectid]["budgetclass"]["names"][$i].'</td>';
                                    echo '<td class="text-right">'. number_format($projectlisting[$projectid]["budgetclass"]["amounts"][$i],0,'.',',').'</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <p class="quote">Do the difficult things while they are easy and do the great things while they are small. — LAO TZU</p>
            </div>
            <!--<div class="pagebreak"></div>-->
            <div class="row reportbody section2">
                <h2 class="sectiontitle">Annex 1: Outputs &amp; Activites</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th class="center">Activity #</th>
                                <th class="left">Activity Title</th>
                                <th class="center">Start Date</th>
                                <th class="center">End Date</th>
                                <th class="center">Elapsed</th>
                                <th class="center">Responsible Staff</th>
                                <th class="center">Responsible Office</th>
                                <th class="center">Responsible Branch</th>
                                <th class="center">Status</th>
                                <th class="center">Activity Tracking</th>
                                <th class="center">Funded</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i=0;$i<count($projectlisting[$projectid]["outputs_activities"]); $i++) {
                                //echo "output ".($i+1)."<br/>";
                                echo '<tr class="output">';
                                echo '<td colspan=11>'.$projectlisting[$projectid]["outputs_activities"][$i]["id"].': '.$projectlisting[$projectid]["outputs_activities"][$i]["title"].' <span>'. number_format($projectlisting[$projectid]["outputs_activities"][$i]["fundamount"],0,'.',',').'</span></td>';
                                echo '</tr>';

                                for ($j=0;$j<count($projectlisting[$projectid]["outputs_activities"][$i]["activities"]);$j++) {
                                    echo '<tr class="activity">';
                                    echo '<td class="right">'.$projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["id"].'</td>';
                                    echo '<td class="left">'.$projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["title"].'</td>';
                                    echo '<td class="center">'.$projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["startdate"].'</td>';
                                    echo '<td class="center">'.$projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["enddate"].'</td>';
                                    echo '<td class="center">'.number_format(($projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["elapsed"]*100/$projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["duration"]),0,'.',',').'%</td>';
                                    echo '<td class="center">'.$projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["staff"].'</td>';
                                    echo '<td class="center">'.$projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["office"].'</td>';
                                    echo '<td class="center">'.$projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["branch"].'</td>';
                                    echo '<td class="center">'.$projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["status"].'</td>';
                                    echo '<td class="center">'.$projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["trackingtext"].'</td>';

                                    $fundtext = ($projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["funded"] == 1) ? number_format($projectlisting[$projectid]["outputs_activities"][$i]["activities"][$j]["fundamount"],0,'.',',') : '- No -';
                                    echo '<td class="right">'.$fundtext.'</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- End of .toprint -->
    </div><!-- End of .container-fluid -->
    </div><!-- End of #to_export -->

    <!-- HTML TO PDF  FUNCTION TO EXPORT THE DOCUMENT -->
    <script>
        $(document).ready(function() {
            $(".projectlisting").select2({
                placeholder: "Select a project",
                allowClear: false
            });
        });


        /*function jsp(){
            var element = document.getElementById('toprint');
            var opt = {
                margin: 0,
                filename: '<?php echo $processed_divisiondata[$division]["entity"]; ?> pimsreport.pdf',
                image: { type: 'jpeg', quality: 75 },
                //html2canvas:  {​​ scale: 0.8 }​​,
                html2canvas:{dpi:600, letterRendering:true},
                //pagebreak: { mode: 'avoid-all', after: '#page1el' },
                //pagebreak: {​​ avoid: 'tr'}​​,
                jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
            };

            // New Promise-based usage:
            html2pdf().set(opt).from(element).save();

            // Old monolithic-style usage:
            // html2pdf(element, opt);
        }*/
    </script>
</body>
</html>
