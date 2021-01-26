<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link href="css/main.css" rel="stylesheet" />
    <script src="js/main.js"></script>
    <script>
      // $.ajax({
      //   url: "control.php",
      //   method: "post",
      //   data: { action: "dashbord_view" },
      //   success: function (data) {
      //     console.log(data);
      //   },
      // });
      let d;
      $.ajax({
        url: "control.php",
        method: "post",
        data: { action: "dashbord_view_category" },
        success: main,
      });

      function data_view() {
        return new Promise((res, rej) => {
          $.ajax({
            url: "control.php",
            method: "post",
            data: { action: "dashbord_view" },
            success: function (data) {
              res(JSON.parse(data).rows);
            },
          });
        });
      }

      async function main(data) {
        let timings = await data_view();
        console.log(timings);
        data = JSON.parse(data).rows;
        let i = "`";
        const mainData = [];
        const temp1 = {};
        const temp = new Set();
        var f = 0;
        for (e of data) {
          if (!temp.has(e.category)) {
            i = String.fromCharCode(i.charCodeAt(0) + 1);
            temp1[i] = 1;
            mainData.push({
              id: i,
              category: e.category,
              booking_info: [
                { title: e.booking_info, status: e.status, id: i + temp1[i]++ },
              ],
            });
            temp.add(e.category);
          } else {
            const f = mainData.find((j) => j.category === e.category);
            f.booking_info.push({
              id: f.id + temp1[f.id]++,
              title: e.booking_info,
              status: e.status,
            });
          }
        }

        d = mainData.map((e) => {
          return {
            id: e.id,
            title: e.category,
            children: e.booking_info,
          };
        });

        console.log(mainData);
        function format(date) {
          const d = moment(date, "DD MMMM YYYY -hh:mm")
            .format("YYYY-MM-DD hh:mm:ss")
            .toString();
          console.log(d);
          return d;
        }
        //2020-11-07 02:00:00
        // console.log(
        //   moment("30 September 2020 - 09:30 am", "DD MMMM YYYY -hh:mm").format(
        //     "DD M YYYY - hh:mm"
        //   )
        // );
        const events = [];

        for (let category of mainData) {
          const booking = category.booking_info;
          for (let d of booking) {
            const ctimings = timings.filter((t) => t.booking === d.title);
            if (!ctimings || ctimings.length === 0) continue;
            for (let c of ctimings) {
              events.push({
                resourceId: d.id,
                start: format(c.start_time),
                end: format(c.end_time),
                title: c.booking_info,
              });
            }
          }
        }
        console.log(events);
        //console.log(temp1);
        var datee = new Date();
        var date = datee.getDate();
        var year = datee.getFullYear();
        var month = datee.getMonth() + 1;

        var calendarEl = document.getElementById("calendar");

        var calendar = new FullCalendar.Calendar(calendarEl, {
          height: "100%",
          aspectRatio: 1.8,
          editable: true, // enable draggable events
          now: `${year}-${month}-${date}`,
          scrollTime: "00:00", // undo default 6am scrollTime
          headerToolbar: {
            left: "today prev,next",
            center: "title",
            right:
              "resourceTimelineDay,resourceTimelineThreeDays,timeGridWeek,dayGridMonth,listWeek",
          },
          initialView: "resourceTimelineDay",
          views: {
            resourceTimelineThreeDays: {
              type: "resourceTimeline",
              duration: { days: 3 },
              buttonText: "3 days",
            },
          },
          expandRows: true,
          resourceAreaHeaderContent: "Category",
          resources: d,

          events: events,
        });

        calendar.render();
      }
    </script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
      integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
      crossorigin="anonymous"
    ></script>
    <style>
      html,
      body {
        overflow: hidden; /* don't do scrollbars */
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
      }

      #calendar-container {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
      }

      .fc-header-toolbar {
        /*
    the calendar will be butting up against the edges,
    but let's scoot in the header's buttons
    */
        padding-top: 1em;
        padding-left: 1em;
        padding-right: 1em;
      }
    </style>
  </head>
  <body>
    <div id="calendar-container" style="margin-top: 5%">
      <div id="calendar"></div>
    </div>
  </body>
</html>
