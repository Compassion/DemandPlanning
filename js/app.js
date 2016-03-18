/*
    Most of the code here is to generate placeholder values.
*/
var data = {
    'GlobalPartnerWeeklyDemandRequest' : [
        {
            'GlobalPartnerId' : 'AU',
            'GlobalPartnerWeeklyDemands' : []
        }
    ]
};

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
        obj.TotalDemand = '<input type="text" id="row-' + i + '-demand" name="row-' + i + '-demand" value="0">';
        obj.ResupplyQuantity = '<input type="text" id="row-' + i + '-resupply" name="row-' + i + '-resupply" value="0">';;
        
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
        
        console.log(obj);
        
        var arr = [weekNum, obj.WeekStartDate, obj.WeekEndDate, obj.TotalDemand, obj.ResupplyQuantity, 'OK'];
        arrs.push(arr);
    }
    console.log(arrs);
    return arrs;
    
}

/* Do everything on INIT 
    Ideally most of this will be handled in an AJAX request.
    Will build that out in future.
*/
$(function() {
    table = $('#demandTable').dataTable( {
        "paging":       true,
        "ordering":     false,
        "searching":    false,
        "info":         false,
        "autowidth":    true,
    } );

    data = buildData(data);
    
    var tableData = parseJSONforDataTables(data);
    console.log(tableData);

    table.fnAddData(tableData);
});