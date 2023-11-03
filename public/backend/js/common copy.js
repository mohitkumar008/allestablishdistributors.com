// Loader configuration
var loaderProgressEl = document.querySelector("#loader .loader-progress");

function startLoader() {
    loaderProgressEl.style.width = "0";
    loaderProgressEl.style.transition = "none";
    loaderProgressEl.style.opacity = "1";
}

function finishLoader() {
    loaderProgressEl.style.width = "100%";
    loaderProgressEl.style.transition = "width 0.5s ease-in-out";
    setTimeout(function () {
        loaderProgressEl.style.opacity = "0";
    }, 300);
}

// Fullcalendar common configuration
function loadFullcalendar(calendarId, calendarOptions) {
    var calendarEl = document.getElementById(calendarId);
    var calendar;

    function updateCalendarEvents(events) {
        calendar.setOption("events", events);
        finishLoader(); // Finish the loader after events are rendered
    }

    function fetchEventsForMonth(start, end) {
        startLoader(); // Start the loader before fetching events
        var user = $('#calendarUsersList').val();
        var xhr = new XMLHttpRequest();
        xhr.open("GET", $('#' + calendarId).attr('data-event_link') + '?start=' + start.toISOString() + '&end=' + end.toISOString() + '&user=' + user, true);

        xhr.onprogress = function (e) {
            if (e.lengthComputable) {
                var progress = (e.loaded / e.total) * 100;
                loaderProgressEl.style.width = progress + "%";
            }
        };

        xhr.onload = function () {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                var events = data.map(event => ({
                    ...event,
                    start: new Date(event.start),
                    end: new Date(event.end)
                }));
                updateCalendarEvents(events);
            }
        };

        xhr.send();
    }

    function handleMonthChange(event) {
        var start = event.view.currentStart;
        var end = event.view.currentEnd;
        start.setDate(1);
        end.setMonth(end.getMonth(), 0);
        fetchEventsForMonth(start, end);
    }

    calendar = new FullCalendar.Calendar(calendarEl, calendarOptions);
    calendar.setOption("datesSet", handleMonthChange);
    calendar.render();
}

// Show leave modal
let showLeaveModal = async (arg, date) => {
    $('#selectedDate').val(`?date=${date}`);
    await $(".ajaxFormModal").trigger("click");
    $("#addLeaveCalendarModal").on("shown.bs.modal", function () {
        const startDate = new Date(arg.start);
        const formattedDate = startDate.toLocaleDateString("en-US", { month: "short", day: "2-digit", year: "numeric" });
        $(".date-header").html(formattedDate);
    });
}

// Get formatted date
const formattedDate = (date) => {
    var year = date.getFullYear();
    var month, day;
    if (date.getMonth() < 10) {
        month = "0" + (date.getMonth() + 1);
    } else {
        month = date.getMonth() + 1;
    }
    if (date.getDate() < 10) {
        day = "0" + date.getDate();
    } else {
        day = date.getDate();
    }
    return year + "-" + month + "-" + day
}

// Initilatize select2
$(document).ready(function () {
    $(".select2").select2();
});

// Vsrf token for ajax
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// photo upload
$('#btn-upload-photo').on('click', function () {
    $(this).siblings('#profilePhoto').trigger('click');
});

// Implement date filter
var startDateFilter = moment().subtract(29, 'days');
var endDateFilter = moment();

function cb(startDateFilter, endDateFilter) {
    $('#dateFilter span').html(startDateFilter.format('MMMM D, YYYY') + ' - ' + endDateFilter.format(
        'MMMM D, YYYY'));
    $("#filterDateFrom").val(startDateFilter.format('YYYY-MM-DD'))
    $("#filterDateTo").val(endDateFilter.format('YYYY-MM-DD'))
}

$('#dateFilter').daterangepicker({
    startDate: startDateFilter,
    endDate: endDateFilter,
    ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
            'month').endOf('month')]
    }
}, cb);

cb(startDateFilter, endDateFilter);


$(document).on("dblclick", ".doubleClickLink", function (event) {
    const linkURL = $(this).attr("data-href");
    window.location.href = linkURL;
});

// Auto-open first link by opening dropdown menu
$(document).on("click", ".metismenu > li.active", function (){
    window.location.href = $(this).find('ul li:first-child a').attr('href');
}); 

