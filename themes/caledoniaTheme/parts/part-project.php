<?php 
$title = get_the_title($id);
$values = get_fields($id);
$logo = $values['logo'];
$image = $values['image'];
$investment = $values['date_of_investment'];
$status = $values['realised_status'];
$description = $values['description'];
$equity = $values['caledonia_equity'];
$equity = json_encode($equity);
$directors = $values['board_directors'];
$type_of_investment = $values['type_of_investment'];

$case_study = $values['case_study'];
if ($case_study) {
    $case_study_id = $case_study->ID;
    $case_study_link = get_permalink($case_study_id);
}
else {
    $case_study_link = "";
}
?>

<div class="col-md-6 col-lg-3 px-1 my-1">
    <div class="project" 
        data-group ='<?php echo $parent ?>'
        data-image='<?php echo $image ?>'
        data-logo='<?php echo $logo ?>'
        data-investment='<?php echo $investment ?>'
        data-status='<?php echo $status ?>'
        data-description='<?php echo $description ?>'
        data-equity='<?php echo $equity?>'
        data-directors='<?php echo $directors?>'
        data-type_of_investment='<?php echo $type_of_investment?>' 
        data-case_study="<?php echo $case_study_link?>"
        >
        <div class="w-100 h-90">
            <img class="w-100 h-90" src="<?php echo $image ?>">
        </div>
        <div class="green-bar"></div>
    </div>
</div>