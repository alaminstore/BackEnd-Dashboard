function addListToWork($rowno) {
    $.each(applicabilityList, function(key, value) {
        $("#degree_sk" + $rowno).append(
            $("<option></option>")
                .attr("value", key)
                .text(value)
        );
    });
    // $.each(profeciencyLevelList, function (key, value) {
    //     $('#selectProfeciency_sk' + $rowno)
    //         .append($("<option></option>").attr("value", key).text(value));
    // });
}

function add_row_working_edit() {
    $row_track_id = $("#working_table_edit tbody>tr:last").data("row_track");
    if ($row_track_id == null) {
        $row_track_id = 1;
    } else {
        $row_track_id = $row_track_id + 1;
    }
    // $("#working_table_edit > tbody:last-child").append("<tr data-row_track='" + $row_track_id + "' id='row_sk_edit" + $row_track_id + "'><td><input type='text' class='form-control'  name='sk_category[]' placeholder='Enter Skill Category'></td><td><input type='text' class='form-control'  name='sk_name[]' placeholder='Enter Skill Name'></td><td><select class='form-control' name='sk_workspace[]' id='selectApplicabilityWorkspace_sk" + $row_track_id + "'></select></td><td><select class='form-control' name='sk_profeciency[]' id='selectProfeciency_sk" + $row_track_id + "'></select></td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row_skill('row_sk_edit" + $row_track_id + "')><i class='fas fa-minus-square'></i></button></td></tr>");
    $("#working_table_edit > tbody:last-child").append(
        "<tr data-row_track='" +
            $row_track_id +
            "' id='row_sk_edit" +
            $row_track_id +
            "'><td><input type='text' class='form-control'  name='designation[]'></td><td><input type='text' class='form-control'  name='company_name[]'></td><td><input type='date' class='form-control'  name='joining_date[]'></td><td><input type='date' class='form-control'  name='end_date[]'></td><td><button type='button' class='btn btn-danger btn-sm btn-icon-text'onclick=delete_row_skill('row_sk_edit" +
            $row_track_id +
            "')><i class='fas fa-minus-square'></i></button></td></tr>"
    );
    addListToWork($row_track_id);
}
var applicabilityList = {
    "": "Choose...",
    SSC: "SSC",
    HSC: "HSC",
    Bsc: "B.sc",
    BCom: "BCom",
    BBA: "BBA",
    MBA: "MBA"
};
// var profeciencyLevelList = {
//     "": "Select an option",
//     "Beginner": "Beginner",
//     "Intermediate": "Intermediate",
//     "Advanced": "Advanced",
// };
function delete_row_skill(rowno) {
    $("#" + rowno).remove();
}
