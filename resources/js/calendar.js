import {Calendar} from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
//import adaptivePlugin from "@fullcalendar/adaptive";

const calendarEl = document.getElementById("calendar");

// グループのIDを取得
let id = $("#id").val();

// 現場の取得
if ($("#admin").val() === 'true') {
    if ($("#member-id").val() != null) {
        var member_id = $("#member-id").val()
        var onsite = '/group/' + id + '/admin/search-member/' + member_id;
    } else if($("#onsite-id").val() != null){
        var onsite_id = $("#onsite-id").val()
        var onsite = '/group/' + id + '/admin/search-onsite/' + onsite_id;
    } else {
        var onsite = '/group/' + id + '/admin/get-onsite';
    }
    var event_color = '#66CC33';
} else if (id) {
    if ($("#onsite-id").val() != null) {
        var onsite_id = $("#onsite-id").val()
        var onsite = '/group/' + id + '/' + onsite_id + '/search-onsite';
    } else {
        var onsite = '/group/' + id + '/get-onsite';
    }
    var event_color = '#6699FF';
} else {
    var onsite = '/get-onsite';
    var event_color = '#808000';
}

// カレンダー表示
let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin], initialView: "dayGridMonth", headerToolbar: {
        left: "prev", center: "title", right: "next"
    },
    locale: "ja",

    // 日付をクリックしたときの処理
    dateClick: function (info) {
        // 日付の表示設定
        let month = info.date.getMonth() + 1;
        let date = info.date.getDate();
        switch (info.date.getUTCDay()) {
            case 0:
                var week = "（月）";
                break;
            case 1:
                var week = "（火）";
                break;
            case 2:
                var week = "（水）";
                break;
            case 3:
                var week = "（木）";
                break;
            case 4:
                var week = "（金）";
                break;
            case 5:
                var week = "（土）";
                break;
            case 6:
                var week = "（日）";
                break;
            default:
                var week = false;
        }
        $("#date").empty();
        $("#date").append(month + "月" + date + "日" + week);

        // 画面遷移の関数
        function post(path, params, method = 'post') {
            var token = document.getElementsByName('csrf-token').item(0).content;
            const form = document.createElement('form');
            form.method = method;
            form.action = path;

            for (const key in params) {
                if (params.hasOwnProperty(key)) {
                    const hiddenField = document.createElement('input');
                    hiddenField.type = 'hidden';
                    hiddenField.name = key;
                    hiddenField.value = params[key];
                    form.appendChild(hiddenField);
                }
            }
            document.body.appendChild(form);
            form.submit();
        }

        // 画面遷移
        if ($("#admin").val() === 'true') {
            post('/group/' + id + '/admin/detail', {
                'date-str': info.dateStr, 'month': month, 'date': date, 'week': week
            });
        } else if (id) {
            post('/group/' + id + '/detail', {
                'date-str': info.dateStr, 'month': month, 'date': date, 'week': week
            });
        } else {
            post('/detail', {
                'date-str': info.dateStr, 'month': month, 'date': date, 'week': week
            });
        }
    },
    events: onsite,
    eventColor: event_color,
});
calendar.render();
