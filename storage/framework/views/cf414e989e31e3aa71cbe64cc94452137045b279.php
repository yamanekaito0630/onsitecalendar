<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm rounded px-4">
    <div class="container-fluid">
        <a href="http://127.0.0.1:8000/group/2" class="navbar-brand title">現場共有カレンダー</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="http://127.0.0.1:8000">山根海翔</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1:8000/group/2/change_mode">管理画面へ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 px-0">
            <nav class="navbar navbar-expand-lg p-0 position-sticky top-0">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light min-vh-100">
                        <div class="text-center">
                            <span class="fs-4">鈴木建設</span>
                        </div>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="py-1">
                                <form method="post">
                                    <input type="hidden" name="_token" value="CotcxL8BJvDQN8z68IP7yCpB7Gz01zwyuTxUMXRE">
                                    <label for="">現場検索</label>
                                    <div class="input-group">
                                        <select name="onsite" class="form-control">
                                            <option value="鈴木加工場">鈴木加工場</option>
                                            <option value="鈴木アリーナ">鈴木アリーナ</option>
                                            <option value="鈴木ビル">鈴木ビル</option>
                                        </select>
                                        <span class="input-group-btn">
		            <button type="submit" class="btn btn-default search-btn"><i class="fas fa-search"></i></button>
	            </span>
                                    </div>
                                </form>
                            </li>
                            <li class="py-1">
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#salaryModal">給与確認
                                </button>
                            </li>
                            <li class="py-1">
                                <a href="http://127.0.0.1:8000/group/2/pdf" class="btn btn-primary w-100">カレンダー出力</a>
                            </li>
                            <li class="py-1">
                                <form method="POST" action="http://127.0.0.1:8000/logout">
                                    <input type="hidden" name="_token" value="CotcxL8BJvDQN8z68IP7yCpB7Gz01zwyuTxUMXRE">
                                    <a class="block py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out logout"
                                       href="http://127.0.0.1:8000/logout" onclick="event.preventDefault();
                                    this.closest('form').submit();"><span class="btn btn-secondary">ログアウト</span></a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
        <div class="col-lg-10 main">
            <input type="hidden" id="id" value="2">
            <div class="w-100 mx-auto pt-5">
                <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-standard">
                    <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
                        <div class="fc-toolbar-chunk">
                            <button type="button" title="Previous month" aria-pressed="false"
                                    class="fc-prev-button fc-button fc-button-primary"><span
                                    class="fc-icon fc-icon-chevron-left"></span></button>
                        </div>
                        <div class="fc-toolbar-chunk"><h2 class="fc-toolbar-title" id="fc-dom-1">2022年4月</h2></div>
                        <div class="fc-toolbar-chunk">
                            <button type="button" title="Next month" aria-pressed="false"
                                    class="fc-next-button fc-button fc-button-primary"><span
                                    class="fc-icon fc-icon-chevron-right"></span></button>
                        </div>
                    </div>
                    <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active"
                         style="height: 260px;">
                        <div class="fc-daygrid fc-dayGridMonth-view fc-view">
                            <table role="grid" class="fc-scrollgrid  fc-scrollgrid-liquid">
                                <thead role="rowgroup">
                                <tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                                    <th role="presentation">
                                        <div class="fc-scroller-harness">
                                            <div class="fc-scroller" style="overflow: hidden;">
                                                <table role="presentation" class="fc-col-header " style="width: 349px;">
                                                    <colgroup></colgroup>
                                                    <thead role="presentation">
                                                    <tr role="row">
                                                        <th role="columnheader"
                                                            class="fc-col-header-cell fc-day fc-day-sun">
                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="日曜日"
                                                                                                     class="fc-col-header-cell-cushion ">日</a>
                                                            </div>
                                                        </th>
                                                        <th role="columnheader"
                                                            class="fc-col-header-cell fc-day fc-day-mon">
                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="月曜日"
                                                                                                     class="fc-col-header-cell-cushion ">月</a>
                                                            </div>
                                                        </th>
                                                        <th role="columnheader"
                                                            class="fc-col-header-cell fc-day fc-day-tue">
                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="火曜日"
                                                                                                     class="fc-col-header-cell-cushion ">火</a>
                                                            </div>
                                                        </th>
                                                        <th role="columnheader"
                                                            class="fc-col-header-cell fc-day fc-day-wed">
                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="水曜日"
                                                                                                     class="fc-col-header-cell-cushion ">水</a>
                                                            </div>
                                                        </th>
                                                        <th role="columnheader"
                                                            class="fc-col-header-cell fc-day fc-day-thu">
                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="木曜日"
                                                                                                     class="fc-col-header-cell-cushion ">木</a>
                                                            </div>
                                                        </th>
                                                        <th role="columnheader"
                                                            class="fc-col-header-cell fc-day fc-day-fri">
                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="金曜日"
                                                                                                     class="fc-col-header-cell-cushion ">金</a>
                                                            </div>
                                                        </th>
                                                        <th role="columnheader"
                                                            class="fc-col-header-cell fc-day fc-day-sat">
                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="土曜日"
                                                                                                     class="fc-col-header-cell-cushion ">土</a>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody role="rowgroup">
                                <tr role="presentation"
                                    class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
                                    <td role="presentation">
                                        <div class="fc-scroller-harness fc-scroller-harness-liquid">
                                            <div class="fc-scroller fc-scroller-liquid-absolute"
                                                 style="overflow: hidden auto;">
                                                <div class="fc-daygrid-body fc-daygrid-body-unbalanced "
                                                     style="width: 349px;">
                                                    <table role="presentation" class="fc-scrollgrid-sync-table"
                                                           style="width: 349px; height: 769px;">
                                                        <colgroup></colgroup>
                                                        <tbody role="presentation">
                                                        <tr role="row">
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-sun fc-day-past fc-day-other"
                                                                data-date="2022-03-27" aria-labelledby="fc-dom-2">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-2"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年3月27日">27日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-mon fc-day-past fc-day-other"
                                                                data-date="2022-03-28" aria-labelledby="fc-dom-4">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-4"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年3月28日">28日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-tue fc-day-past fc-day-other"
                                                                data-date="2022-03-29" aria-labelledby="fc-dom-6">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-6"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年3月29日">29日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-wed fc-day-past fc-day-other"
                                                                data-date="2022-03-30" aria-labelledby="fc-dom-8">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-8"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年3月30日">30日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-thu fc-day-past fc-day-other"
                                                                data-date="2022-03-31" aria-labelledby="fc-dom-10">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-10"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年3月31日">31日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                data-date="2022-04-01" aria-labelledby="fc-dom-12">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-12"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月1日">1日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-event-harness"
                                                                             style="margin-top: 0px;"><a
                                                                                class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past"
                                                                                style="border-color: rgb(102, 153, 255); background-color: rgb(102, 153, 255);">
                                                                                <div class="fc-event-main">
                                                                                    <div class="fc-event-main-frame">
                                                                                        <div
                                                                                            class="fc-event-title-container">
                                                                                            <div
                                                                                                class="fc-event-title fc-sticky">
                                                                                                鈴木加工場
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a></div>
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                                                                data-date="2022-04-02" aria-labelledby="fc-dom-14">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-14"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月2日">2日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr role="row">
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                                                                data-date="2022-04-03" aria-labelledby="fc-dom-16">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-16"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月3日">3日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                                                                data-date="2022-04-04" aria-labelledby="fc-dom-18">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-18"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月4日">4日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-event-harness"
                                                                             style="margin-top: 0px;"><a
                                                                                class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past"
                                                                                style="border-color: rgb(102, 153, 255); background-color: rgb(102, 153, 255);">
                                                                                <div class="fc-event-main">
                                                                                    <div class="fc-event-main-frame">
                                                                                        <div
                                                                                            class="fc-event-title-container">
                                                                                            <div
                                                                                                class="fc-event-title fc-sticky">
                                                                                                鈴木加工場
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a></div>
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                                                                data-date="2022-04-05" aria-labelledby="fc-dom-20">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-20"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月5日">5日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-event-harness"
                                                                             style="margin-top: 0px;"><a
                                                                                class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past"
                                                                                style="border-color: rgb(102, 153, 255); background-color: rgb(102, 153, 255);">
                                                                                <div class="fc-event-main">
                                                                                    <div class="fc-event-main-frame">
                                                                                        <div
                                                                                            class="fc-event-title-container">
                                                                                            <div
                                                                                                class="fc-event-title fc-sticky">
                                                                                                鈴木アリーナ
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a></div>
                                                                        <div class="fc-daygrid-event-harness"
                                                                             style="margin-top: 0px;"><a
                                                                                class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past"
                                                                                style="border-color: rgb(102, 153, 255); background-color: rgb(102, 153, 255);">
                                                                                <div class="fc-event-main">
                                                                                    <div class="fc-event-main-frame">
                                                                                        <div
                                                                                            class="fc-event-title-container">
                                                                                            <div
                                                                                                class="fc-event-title fc-sticky">
                                                                                                鈴木ビル
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a></div>
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                                                                data-date="2022-04-06" aria-labelledby="fc-dom-22">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-22"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月6日">6日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                                                                data-date="2022-04-07" aria-labelledby="fc-dom-24">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-24"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月7日">7日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                data-date="2022-04-08" aria-labelledby="fc-dom-26">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-26"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月8日">8日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                                                                data-date="2022-04-09" aria-labelledby="fc-dom-28">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-28"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月9日">9日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr role="row">
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                                                                data-date="2022-04-10" aria-labelledby="fc-dom-30">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-30"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月10日">10日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                                                                data-date="2022-04-11" aria-labelledby="fc-dom-32">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-32"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月11日">11日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                                                                data-date="2022-04-12" aria-labelledby="fc-dom-34">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-34"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月12日">12日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                                                                data-date="2022-04-13" aria-labelledby="fc-dom-36">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-36"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月13日">13日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                                                                data-date="2022-04-14" aria-labelledby="fc-dom-38">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-38"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月14日">14日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                data-date="2022-04-15" aria-labelledby="fc-dom-40">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-40"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月15日">15日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                                                                data-date="2022-04-16" aria-labelledby="fc-dom-42">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-42"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月16日">16日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr role="row">
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                                                                data-date="2022-04-17" aria-labelledby="fc-dom-44">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-44"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月17日">17日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                                                                data-date="2022-04-18" aria-labelledby="fc-dom-46">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-46"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月18日">18日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                                                                data-date="2022-04-19" aria-labelledby="fc-dom-48">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-48"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月19日">19日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                                                                data-date="2022-04-20" aria-labelledby="fc-dom-50">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-50"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月20日">20日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                                                                data-date="2022-04-21" aria-labelledby="fc-dom-52">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-52"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月21日">21日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                data-date="2022-04-22" aria-labelledby="fc-dom-54">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-54"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月22日">22日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                                                                data-date="2022-04-23" aria-labelledby="fc-dom-56">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-56"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月23日">23日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr role="row">
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                                                                data-date="2022-04-24" aria-labelledby="fc-dom-58">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-58"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月24日">24日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                                                                data-date="2022-04-25" aria-labelledby="fc-dom-60">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-60"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月25日">25日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                                                                data-date="2022-04-26" aria-labelledby="fc-dom-62">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-62"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月26日">26日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                                                                data-date="2022-04-27" aria-labelledby="fc-dom-64">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-64"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月27日">27日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                                                                data-date="2022-04-28" aria-labelledby="fc-dom-66">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-66"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月28日">28日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                data-date="2022-04-29" aria-labelledby="fc-dom-68">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-68"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月29日">29日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-sat fc-day-today "
                                                                data-date="2022-04-30" aria-labelledby="fc-dom-70">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-70"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年4月30日">30日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr role="row">
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-sun fc-day-future fc-day-other"
                                                                data-date="2022-05-01" aria-labelledby="fc-dom-72">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-72"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年5月1日">1日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-mon fc-day-future fc-day-other"
                                                                data-date="2022-05-02" aria-labelledby="fc-dom-74">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-74"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年5月2日">2日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-tue fc-day-future fc-day-other"
                                                                data-date="2022-05-03" aria-labelledby="fc-dom-76">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-76"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年5月3日">3日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other"
                                                                data-date="2022-05-04" aria-labelledby="fc-dom-78">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-78"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年5月4日">4日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other"
                                                                data-date="2022-05-05" aria-labelledby="fc-dom-80">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-80"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年5月5日">5日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other"
                                                                data-date="2022-05-06" aria-labelledby="fc-dom-82">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-82"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年5月6日">6日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                            <td role="gridcell"
                                                                class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other"
                                                                data-date="2022-05-07" aria-labelledby="fc-dom-84">
                                                                <div
                                                                    class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-84"
                                                                                                       class="fc-daygrid-day-number"
                                                                                                       aria-label="2022年5月7日">7日</a>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-events">
                                                                        <div class="fc-daygrid-day-bottom"
                                                                             style="margin-top: 0px;"></div>
                                                                    </div>
                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 給与モーダル -->
            <div class="modal fade" id="salaryModal" tabindex="-1" aria-labelledby="salaryModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="salaryModalLabel">あなたの予定給与（04月）</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            8000円
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">閉じる</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#close").click(function () {
        $("#dateModal").addClass("hide");
    });
</script>

</body>
<?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/groups/calendar.blade.php ENDPATH**/ ?>