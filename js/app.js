/*
    Most of the code here is to generate placeholder values.
*/
var data = {
    'GlobalPartnerWeeklyDemandRequest' : [
        {
            'GlobalPartnerId' : window.GlobalPartnerId,
            'GlobalPartnerWeeklyDemands' : []
        }
    ]
};

var table;

/* Format the date in yyyy-mm-dd format from a js date object */
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}

/* 
    Build out a json object that can be used as a template. 
    Plan on modifiying in the future to be used to automatically add future dates to table.  
*/
function generateDateJSON(numWeeks) {
    
    var GlobalPartnerWeeklyDemandsTemplate = []
    
    for (var i = 0; i < numWeeks; i++ ) {
        var d = new Date;
        d = new Date(d.setDate(d.getDate() + 7*i));
        
        var first = d.getDate() - d.getDay(); 
        
        var firstday = new Date(d.setDate(first));
        var lastday = new Date(d.setDate(firstday.getDate()+6));
        
        var obj = {};
        obj.WeekStartDate = formatDate(firstday);
        obj.WeekEndDate = formatDate(lastday);
        obj.TotalDemand = 0; //'<input type="text" id="row-' + i + '-demand" name="row-' + i + '-demand" value="0">';
        obj.ResupplyQuantity = 0; //'<input type="text" id="row-' + i + '-resupply" name="row-' + i + '-resupply" value="0">';;
        
        GlobalPartnerWeeklyDemandsTemplate.push(obj);
        
    }
    
    return GlobalPartnerWeeklyDemandsTemplate;
}

/*
    Helper function to add the temp data to the temp JSON. 
    Easier than navigating the object every time.
*/
function buildData(shell) {
    shell.GlobalPartnerWeeklyDemandRequest[0].GlobalPartnerWeeklyDemands.push(generateDateJSON(78));
    return shell;
}

/*
    DataTables likes an array of arrays. The JSON from GME is an array of objects with properties. 
    Need to transform this data into an easily tabular format which is what this does.
*/
function parseJSONforDataTables(json) {
    var data = json.GlobalPartnerWeeklyDemandRequest[0].GlobalPartnerWeeklyDemands[0];
    // arr format = week number, start, end, demand, resupply
    var arrs = [];
    
    for(i = 0; i < data.length; i++) {
        var weekNum = i+1;
        var obj = data[i];
        
        //console.log(obj);
        
        var arr = [weekNum, obj.WeekStartDate, obj.WeekEndDate, obj.TotalDemand, obj.ResupplyQuantity];
        arrs.push(arr);
    }
    //console.log(arrs);
    return arrs; 
}

function parseDataTablesforJSON(dataTables) {
    var data = {
        'GlobalPartnerWeeklyDemandRequest' : [
            {
                'GlobalPartnerId' : window.GlobalPartnerId,
                'GlobalPartnerWeeklyDemands' : []
            }
        ]
    };

    var weeklyDemands = [];
    
    for(i = 0; i < dataTables.length; i++) {
        var obj = {};
        var row = dataTables[i];
        
        obj.WeekStartDate = row[1];
        obj.WeekEndDate = row[2];
        obj.TotalDemand = row[3];
        obj.ResupplyQuantity = row[4];
        
        weeklyDemands.push(obj);
    }
    
    data.GlobalPartnerWeeklyDemandRequest[0].GlobalPartnerWeeklyDemands.push(weeklyDemands);
    
    return data;    
}

/* Add Jquery listeners for changes on cells */ 
function tableRowUpdateListener(table) {
    $('tr').on('blur', 'input, [contenteditable]', function (e) {
        var closestTd = $(this).closest('td');
        if (closestTd.length > 0) {
            var aPos = table.fnGetPosition(closestTd[0]);
            table.fnUpdate(closestTd.html(), aPos[0], aPos[2], false);
        }
    });
    
    return;
}

/* Do everything on INIT 
    Ideally most of this will be handled in an AJAX request.
    Will build that out in future.
*/

function makeAjaxCall(thing, data) {
    var data = { [thing] : data }
    
    // Do the Ajax
    $.ajax({
        type: "POST",
        url: "",
        data: data,
        success: function(resp) {
            //console.log(resp);
            $('#ajaxResponse').html(resp);
        },
        error: function(resp) {
            console.log('Error');
            console.log(resp);
            $('#ajaxResponse').html(resp);
        }
    }); // Ajax Call  
}

function loadJSONdata() {
    var data = { 'load' : 'data' }
    
    // Do the Ajax
    $.ajax({
        type: "POST",
        url: "",
        data: data,
        success: function(resp) {
            data = JSON.parse(resp);
            //console.log(data);
            //console.log(typeof(data));
            table.fnAddData(parseJSONforDataTables(data));
        },
        error: function(resp) {
            console.log('Error');
            console.log(resp);
            $('#ajaxResponse').html(resp);
        }
    }); // Ajax Call  
    
}

$(function() {
    //data = JSON.parse(loadJSONdata());
    
    table = $('#demandTable').dataTable( {
        "paging":       true,
        "ordering":     false,
        "searching":    false,
        "info":         false,
        "autowidth":    true,
    });
    /*
    data = buildData(data);
    
    var tableData = parseJSONforDataTables(data);
    //console.log(tableData);

    table.fnAddData(tableData);
    */
    
    loadJSONdata();
    
    table.on( 'draw.dt', function () {
        $('tr td:nth-child(4), tr td:nth-child(5)').attr('contenteditable','true');
        tableRowUpdateListener(table);
        
        console.log('change');
    });
    
    tableRowUpdateListener(table);
    $('tr td:nth-child(4), tr td:nth-child(5)').attr('contenteditable','true');
    
    $('#export-btn').click(function(e) {
        $('#export-text').text(JSON.stringify(parseDataTablesforJSON(table.fnGetData())));
    });
    
    $('#save-btn').click(function(e) {
        var data = JSON.stringify(parseDataTablesforJSON(table.fnGetData()));
        makeAjaxCall('save', data); 
    });
    
    
});