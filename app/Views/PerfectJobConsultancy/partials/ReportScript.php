<script>
    $(document).ready(function() {
        // Create Column Header Filter
        var tableData = tableData ?? [];
        var headerMenu = [
            // Hide Column
            {
                label: "Hide Column",
                action: function(e, column) {
                    column.hide();
                }
            },
            // Show All Columns
            {
                label: "Show All Columns",
                action: function(e, column) {
                    var columns = table.getColumns();
                    columns.forEach(function(col) {
                        col.show();
                    });
                }
            },
            // Column Header Filter
            {
                label: "Column Header Filter",
                action: function(e, column) {
                    var colDefs = table.getColumnDefinitions();
                    colDefs.forEach(function(colDef) {
                        if (colDef.columns && colDef.columns.length > 0) {
                            colDef.columns.forEach(function(subcolumn) {
                                var isHeaderFilterEnabled = subcolumn.headerFilter;
                                subcolumn.headerFilter = !isHeaderFilterEnabled;
                            });
                        } else {
                            var isHeaderFilterEnabled = colDef.headerFilter;
                            colDef.headerFilter = !isHeaderFilterEnabled;
                        }
                    });
                    table.setColumns(colDefs);
                }
            },
            // SubGrouping Remove
            {
                label: "SubGrouping Remove",
                action: function(e, column) {
                    var colDefs = table.getColumnDefinitions();
                    var NewArray = [];
                    colDefs.forEach(function(colDef) {
                        if (colDef.columns && colDef.columns.length > 0) {
                            colDef.columns.forEach(function(subcolumn) {
                                NewArray.push(subcolumn);
                            });
                        } else {
                            NewArray.push(colDef);
                        }
                    });
                    table.setColumns(NewArray);
                }
            }
        ];

        // Add Column Common Options and Sub-column to Each Column
        tableColumns["columnList"].forEach(function(column) {
            column.headerMenu = headerMenu;
            column.headerTooltip = true;
            column.headerFilter = false;

            if (column.columns && column.columns.length > 0) {
                column.columns.forEach(function(subColumn) {
                    subColumn.headerMenu = headerMenu;
                    subColumn.headerFilter = false;
                    subColumn.headerTooltip = true;
                });
            }
        });
        // Function to select all text in a cell
        // Function to select all text in a cell
        function selectCellText(element) {
            if (document.body.createTextRange) {
                // For IE
                var range = document.body.createTextRange();
                range.moveToElementText(element);
                range.select();
            } else if (window.getSelection) {
                // For other browsers
                var selection = window.getSelection();
                var range = document.createRange();
                range.selectNodeContents(element);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        }
        // Default Table Option
        var defaultTableOptions = {
            ajaxURL: (!tableData || tableData.length === 0) ? apiUrl : null,
            ajaxConfig: (!tableData || tableData.length === 0) ? {
                method: apiMethod,
            } : null,
            data: (tableData && tableData.length > 0) ? tableData : null,
            ajaxParams: (!tableData || tableData.length === 0) ? apiParameter : null,
            ajaxResponse: (!tableData || tableData.length === 0) ? function(url, params, response) {
                try {

                    if (response.status == 400) {
                        var errorMessages = [];

                        // Loop through the errors object and collect error messages
                        for (var key in response.errors) {
                            if (response.errors.hasOwnProperty(key)) {
                                errorMessages.push(response.errors[key]);
                            }
                        }

                        // Show the error messages in toastr
                        if (errorMessages.length > 0) {
                            toastr.error(errorMessages.join('<br>'), 'Error');
                        }

                        return [];
                    }
                    return JSON.parse(response.data);
                    // Rest of your code
                } catch (error) {
                    console.error('JSON Parsing Error:', error);
                    return []; // Return a default value or handle the error as needed
                }
            } : null,
            // ajaxResponse: function(url, params, response) {
            //     var data = JSON.parse(response.data); // Parse the response data

            //     // After retrieving data from the API
            //     if (data.length === 0 || data.status === 400) {
            //         showToast("Data not found", "error");
            //         return []; // Return an empty array to prevent displaying incorrect data
            //     }

            //     // Return the modified data
            //     return data;
            // },
            ajaxError: (!tableData || tableData.length === 0) ? function(xhr, textStatus, errorThrown) {
                if (table) {
                    table.destroy();
                }
            } : null,
            layout: "fitColumns",
            columns: tableColumns["columnList"],
            initialSort: tableColumns["sort"],
            movableCols: true,
            resizableCols: true,
            autoColumns: false,
            pagination: true,
            paginationSize: 10,
            paginationSizeSelector: [5, 10, 25, 50, 100, 500, 1000, 2000, 5000, 10000],
            downloadConfig: {
                columnHeaders: true,
                columnGroups: true,
                rowGroups: true,
                columnCalcs: true,
                dataTree: true,
            },
            downloadConfig: {
                columnHeaders: true,
                columnGroups: true,
                rowGroups: true,
                columnCalcs: true,
                dataTree: true,
            },
            cellMouseOver: function(e, cell) {
                // Set the title attribute to the content of the cell on hover
                var content = cell.getValue();
                if (content) {
                    cell.getElement().setAttribute("title", content);
                }
            },
            height: 'auto',
            // height: tableProperty['height'],
            // height: tableProperty['maxHeight'],
            // height: tableProperty['minHeight'],
            // groupBy:'role',
            // groupBy: function(data) {
            //     return "Role: "+data.role; //groups by data and age
            // },
            // autoColumnsDefinitions: function(definitions) {
            //     definitions.forEach((column) => {
            //         column.headerFilter = true;
            //     });
            //     return definitions;
            // },
            // index: (rowIdFieldName) ? rowIdFieldName : id,
            rowFormatter: function(row) {
                // Set the row id using the dynamic row id field from the data
                if (typeof rowIdFieldName !== 'undefined') {
                    var data = row.getData();
                    if (data.hasOwnProperty(rowIdFieldName)) {
                        // row.getElement().setAttribute("id", data[rowIdFieldName]);
                        // row.getElement().setAttribute("data-row-index", data[rowIdFieldName]);
                    }
                }
            },

            // headerFilterFunc: function(header) {
            //     // Get the field name of the column
            //     var fieldName = header.getDefinition().field;

            //     // Check if any rows in the column have data
            //     var hasData = table.getData().filter(function(row) {
            //         return row[fieldName] !== null && row[fieldName] !== "";
            //     }).length > 0;

            //     // Return true to show the column, false to hide it
            //     return hasData;
            // },
        };





        // Table options for grouping
        var groupByTableOptions = Object.assign({}, defaultTableOptions);
        groupByTableOptions.pagination = false;

        // Common table options
        var commonTableOptions = Object.assign({}, defaultTableOptions);

        // Create the default table
        var table = new Tabulator("#example-table", defaultTableOptions);
        var groupColumnSelect = document.getElementById("groupColumn");


        function generateGroupBy() {
            var groupColumnSelect = document.getElementById("groupColumn");
            var options = groupColumnSelect.querySelectorAll('option');

            // Remove all options from the groupColumnSelect dropdown except the first option
            for (var i = options.length - 1; i > 0; i--) {
                groupColumnSelect.removeChild(options[i]);
            }

            // Retrieve the current column definitions
            var colDefs = table.getColumnDefinitions();
            colDefs.forEach(function(colDef) {
                if (colDef.columns && colDef.columns.length > 0) {
                    // Iterate through subcolumns
                    colDef.columns.forEach(function(subcolumn) {
                        if (subcolumn.visible == true) {
                            // Add option to groupColumnSelect for visible subcolumn
                            var option = document.createElement("option");
                            option.value = subcolumn.field;
                            option.textContent = subcolumn.title;
                            groupColumnSelect.appendChild(option);
                        }
                    });
                } else {
                    // Handle main column
                    if (colDef.visible == true) {
                        // Add option to groupColumnSelect for visible main column
                        var option = document.createElement("option");
                        option.value = colDef.field;
                        option.textContent = colDef.title;
                        groupColumnSelect.appendChild(option);
                    }
                }
            });
        }



        groupColumnSelect.addEventListener("input", function(event) {
            var selectedValue = event.target.value;

            if (selectedValue) {
                // Apply grouping options

                // Set the selected column as the groupBy option
                groupByTableOptions.groupBy = selectedValue;

                // Set the height for the grouped table
                groupByTableOptions.height = "600px";

                // Create a new instance of Tabulator with the groupByTableOptions
                table = new Tabulator("#example-table", groupByTableOptions);
            } else {
                // No group column selected, create a new instance of Tabulator with the commonTableOptions
                table = new Tabulator("#example-table", commonTableOptions);
            }
        });


        // refresh table data
        $("#refresh").on("click", function() {
            reload();
        });

        function reload() {
            table.replaceData(apiUrl);
        };
        // Export to PDF
        $("#exportPdf").on("click", function() {
            table.download("pdf", downlaodFileName + ".pdf", {
                orientation: "portrait", //set page orientation to portrait
                title: downlaodFileName, //add title to report
                jsPDF: {},
                documentProcessing: function(doc) {},
            });
        });
        // Export to excel
        $("#exportExcel").on("click", function() {
            var tableData = table.getData(); // Get the data from the table

            // Download the data in Excel format
            table.download("xlsx", downlaodFileName + ".xlsx", {
                sheetName: downlaodFileName,
                compress: false,
                documentProcessing: function(workbook) {
                    workbook.Props = {
                        Title: "User List",
                        Subject: "User List",
                        CreatedDate: new Date(),
                    };

                    return workbook;
                },
                data: tableData, // Provide the modified data for export
            });
        });

        const input = document.getElementById("fSearch");
        input.addEventListener("keyup", function() {
            table.setFilter(matchAny, {
                value: input.value,
            });
            if (input.value == " ") {
                table.clearFilter();
            }
        });

        function matchAny(data, filterParams) {
            //data - the data for the row being filtered
            //filterParams - params object passed to the filter
            //RegExp - modifier "i" - case insensitve

            var match = false;
            const regex = RegExp(filterParams.value, "i");

            for (var key in data) {
                if (regex.test(data[key]) == true) {
                    match = true;
                }
            }
            return match;
        }
    });
</script>