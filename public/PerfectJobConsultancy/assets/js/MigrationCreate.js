var row_id = 0;
function runSelectize(element, options = null) {
  selectizeOption = {
    parentBody: "body",
    plugins: ["clear_button"],
  };
  if (options != null) {
    selectizeOption = Object.assign({}, option, selectizeOption);
  }
  var selectized = $(element).selectize(selectizeOption);
  return selectized;
}

function TableNameChanged(e) {
  callAjax(base_url + "tableNameExiestApi", "post",{TableName: e.value}).then((responseData) => {
    responseData = JSON.parse(responseData.data);
    if(responseData.status){
      toastr.error("Table Already Exiest");
      e.focous();
    }
  }).catch((error) => {
    console.error("Error:", error);
  });
}
runSelectize(escapeBrackets('#columns[0][Mode]'));
runSelectize(escapeBrackets('#columns[0][foreign_key_field_name]'));
runSelectize(escapeBrackets('#columns[0][type]'));

function addRow() {
  row_id = row_id + 1;
  callAjax(base_url + "getRowForAddColumnsApi", "post", {
    form_id: "GenerateMigrationForm",
    row_id: row_id
  })
    .then((responseData) => {
      row = JSON.parse(responseData.data).row;
      rowid = JSON.parse(responseData.data).rowid;
      // table.row.add(row).draw();
      $("tbody").append(row);
      runSelectize(escapeBrackets('#columns[' + row_id + '][Mode]'));
      runSelectize(escapeBrackets('#columns[' + row_id + '][foreign_key_field_name]'));
      runSelectize(escapeBrackets('#columns[' + row_id + '][type]'));
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function deleteRow(rowid) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to recover this row!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, keep it",
  }).then((result) => {
    if (result.isConfirmed) {
      // User confirmed, delete the row
      $("#" + rowid).remove();
      Swal.fire("Deleted!", "The row has been deleted.", "success");
    } else if (result.isDismissed) {
      // User canceled, do nothing
    }
  });
}

function ColumnTypeChanged(e, rowid) {
  if (e.value == 'foreignKey') {
    var subSelect = $(escapeBrackets('#columns[' + row_id + '][foreign_key_field_name]'))[0].selectize;

    // Check if the sub select is disabled
    if (subSelect.isDisabled) {
      // Enable the sub select
      subSelect.enable();
    }
  }
}
function ForeignKeyChanged(e, rowid) {
  callAjax(base_url + "getColumnPropertyApi", "post", {
    fieldName: e.value
  }).then((responseData) => {
    console.log(JSON.parse(responseData.data));
  }).catch((error) => {
    console.error("Error:", error);
  });
}
function TypeChanged(e, rowid) {

  switch (e.value) {
    case 'TINYINT':
    case 'SMALLINT':
    case 'MEDIUMINT':
    case 'INT':
    case 'BIGINT':
      $(escapeBrackets('#columns[' + rowid + '][Unsigned]')).prop("disabled", false);
      break;
    default:
      $(escapeBrackets('#columns[' + rowid + '][Unsigned]')).prop("checked", false);
      $(escapeBrackets('#columns[' + rowid + '][Unsigned]')).prop("disabled", true);

  }
}
