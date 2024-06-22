@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1>Calendario</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="sidebar">
                    <div id="calendar" class="font-13 fc fc-unthemed fc-ltr">
                        <div class="fc-toolbar fc-header-toolbar">
                            <div class="fc-left">
                                <div class="fc-button-group">
                                    <button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left">
                                        <span class="fc-icon fc-icon-left-single-arrow"></span>
                                    </button>
                                    <button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right">
                                        <span class="fc-icon fc-icon-right-single-arrow"></span>
                                    </button>
                                </div>
                                <button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled" disabled="">today</button>
                            </div>
                            <div class="fc-right">
                                <div class="fc-button-group">
                                    <button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button>
                                    <button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button>
                                    <button type="button" class="fc-agendaDay-button fc-button fc-state-default">day</button>
                                    <button type="button" class="fc-listWeek-button fc-button fc-state-default fc-corner-right">list</button>
                                </div>
                            </div>
                            <div class="fc-center">
                                <h2>June 2024</h2>
                            </div>
                            <div class="fc-clear"></div>
                        </div>
                        <div class="fc-view-container" style="">
                            <div class="fc-view fc-month-view fc-basic-view" style="">
                                <table>
                                    <thead class="fc-head">
                                    <tr>
                                        <td class="fc-head-container fc-widget-header">
                                            <div class="fc-row fc-widget-header">
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th>
                                                        <th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th>
                                                        <th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th>
                                                        <th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th>
                                                        <th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th>
                                                        <th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th>
                                                        <th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody class="fc-body">
                                    <tr>
                                        <td class="fc-widget-content">
                                            <div class="fc-scroller fc-day-grid-container" style="overflow: hidden; height: 502px;"><div class="fc-day-grid fc-unselectable">
                                                    <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 83px;">
                                                        <div class="fc-bg">
                                                            <table>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2024-05-26"></td>
                                                                    <td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2024-05-27"></td>
                                                                    <td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2024-05-28"></td>
                                                                    <td class="fc-day fc-widget-content fc-wed fc-other-month fc-past" data-date="2024-05-29"></td>
                                                                    <td class="fc-day fc-widget-content fc-thu fc-other-month fc-past" data-date="2024-05-30"></td>
                                                                    <td class="fc-day fc-widget-content fc-fri fc-other-month fc-past" data-date="2024-05-31"></td>
                                                                    <td class="fc-day fc-widget-content fc-sat fc-past" data-date="2024-06-01"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="fc-content-skeleton">
                                                            <table>
                                                                <thead>
                                                                <tr>
                                                                    <td class="fc-day-top fc-sun fc-other-month fc-past" data-date="2024-05-26">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-05-26&quot;,&quot;type&quot;:&quot;day&quot;}">26</a></td>
                                                                    <td class="fc-day-top fc-mon fc-other-month fc-past" data-date="2024-05-27">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-05-27&quot;,&quot;type&quot;:&quot;day&quot;}">27</a></td>
                                                                    <td class="fc-day-top fc-tue fc-other-month fc-past" data-date="2024-05-28">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-05-28&quot;,&quot;type&quot;:&quot;day&quot;}">28</a></td>
                                                                    <td class="fc-day-top fc-wed fc-other-month fc-past" data-date="2024-05-29">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-05-29&quot;,&quot;type&quot;:&quot;day&quot;}">29</a> </td>
                                                                    <td class="fc-day-top fc-thu fc-other-month fc-past" data-date="2024-05-30">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-05-30&quot;,&quot;type&quot;:&quot;day&quot;}">30</a></td>
                                                                    <td class="fc-day-top fc-fri fc-other-month fc-past" data-date="2024-05-31">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-05-31&quot;,&quot;type&quot;:&quot;day&quot;}">31</a></td>
                                                                    <td class="fc-day-top fc-sat fc-past" data-date="2024-06-01">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-01&quot;,&quot;type&quot;:&quot;day&quot;}">1</a></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="fc-event-container">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" style="background-color:#32C1CE;border-color:#32C1CE">
                                                                            <div class="fc-content"> <span class="fc-title">All Day Event</span></div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 83px;">
                                                        <div class="fc-bg">
                                                            <table>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="fc-day fc-widget-content fc-sun fc-past" data-date="2024-06-02"></td>
                                                                    <td class="fc-day fc-widget-content fc-mon fc-past" data-date="2024-06-03"></td>
                                                                    <td class="fc-day fc-widget-content fc-tue fc-past" data-date="2024-06-04"></td>
                                                                    <td class="fc-day fc-widget-content fc-wed fc-past" data-date="2024-06-05"></td>
                                                                    <td class="fc-day fc-widget-content fc-thu fc-past" data-date="2024-06-06"></td>
                                                                    <td class="fc-day fc-widget-content fc-fri fc-past" data-date="2024-06-07"></td>
                                                                    <td class="fc-day fc-widget-content fc-sat fc-past" data-date="2024-06-08"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="fc-content-skeleton">
                                                            <table>
                                                                <thead>
                                                                <tr>
                                                                    <td class="fc-day-top fc-sun fc-past" data-date="2024-06-02">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-02&quot;,&quot;type&quot;:&quot;day&quot;}">2</a></td>
                                                                    <td class="fc-day-top fc-mon fc-past" data-date="2024-06-03">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-03&quot;,&quot;type&quot;:&quot;day&quot;}">3</a></td>
                                                                    <td class="fc-day-top fc-tue fc-past" data-date="2024-06-04">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-04&quot;,&quot;type&quot;:&quot;day&quot;}">4</a></td>
                                                                    <td class="fc-day-top fc-wed fc-past" data-date="2024-06-05">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-05&quot;,&quot;type&quot;:&quot;day&quot;}">5</a></td>
                                                                    <td class="fc-day-top fc-thu fc-past" data-date="2024-06-06">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-06&quot;,&quot;type&quot;:&quot;day&quot;}">6</a></td>
                                                                    <td class="fc-day-top fc-fri fc-past" data-date="2024-06-07">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-07&quot;,&quot;type&quot;:&quot;day&quot;}">7</a></td>
                                                                    <td class="fc-day-top fc-sat fc-past" data-date="2024-06-08">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-08&quot;,&quot;type&quot;:&quot;day&quot;}">8</a>
                                                                    </td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td rowspan="3"></td>
                                                                    <td rowspan="3"></td>
                                                                    <td class="fc-event-container">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#A675D4;border-color:#A675D4">
                                                                            <div class="fc-content">
                                                                                <span class="fc-time">6p</span>
                                                                                <span class="fc-title">Eliminating Heel Pressure Ulcers</span>
                                                                            </div>
                                                                        </a>
                                                                    </td>
                                                                    <td rowspan="3"></td>
                                                                    <td rowspan="3"></td>
                                                                    <td class="fc-event-container" colspan="2">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-not-end fc-draggable" style="background-color:#54C798;border-color:#54C798">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">Long Event</span>
                                                                            </div>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fc-event-container fc-limited">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#32C1CE;border-color:#32C1CE">
                                                                            <div class="fc-content">
                                                                                <span class="fc-time">6p</span>
                                                                                <span class="fc-title">Mechanisms in Plant Development</span>
                                                                            </div>
                                                                        </a>
                                                                    </td>
                                                                    <td class="fc-more-cell" rowspan="1">
                                                                        <div><a class="fc-more">+2 more</a></div>
                                                                    </td>
                                                                    <td rowspan="2"></td>
                                                                    <td class="fc-event-container" rowspan="2">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" style="background-color:#54C798;border-color:#54C798">
                                                                            <div class="fc-content"> <span class="fc-title">Annual Allergies Conference</span></div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr class="fc-limited">
                                                                    <td class="fc-event-container">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#EfA752;border-color:#EfA752">
                                                                            <div class="fc-content">
                                                                                <span class="fc-time">6p</span>
                                                                                <span class="fc-title">The Mental Capacity Masterclass</span>
                                                                            </div>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 83px;">
                                                        <div class="fc-bg">
                                                            <table>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="fc-day fc-widget-content fc-sun fc-past" data-date="2024-06-09"></td>
                                                                    <td class="fc-day fc-widget-content fc-mon fc-past" data-date="2024-06-10"></td>
                                                                    <td class="fc-day fc-widget-content fc-tue fc-past" data-date="2024-06-11"></td>
                                                                    <td class="fc-day fc-widget-content fc-wed fc-past" data-date="2024-06-12"></td>
                                                                    <td class="fc-day fc-widget-content fc-thu fc-past" data-date="2024-06-13"></td>
                                                                    <td class="fc-day fc-widget-content fc-fri fc-past" data-date="2024-06-14"></td>
                                                                    <td class="fc-day fc-widget-content fc-sat fc-past" data-date="2024-06-15"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="fc-content-skeleton">
                                                            <table>
                                                                <thead>
                                                                <tr>
                                                                    <td class="fc-day-top fc-sun fc-past" data-date="2024-06-09">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-09&quot;,&quot;type&quot;:&quot;day&quot;}">9</a></td>
                                                                    <td class="fc-day-top fc-mon fc-past" data-date="2024-06-10">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-10&quot;,&quot;type&quot;:&quot;day&quot;}">10</a></td>
                                                                    <td class="fc-day-top fc-tue fc-past" data-date="2024-06-11">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-11&quot;,&quot;type&quot;:&quot;day&quot;}">11</a></td>
                                                                    <td class="fc-day-top fc-wed fc-past" data-date="2024-06-12">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-12&quot;,&quot;type&quot;:&quot;day&quot;}">12</a></td>
                                                                    <td class="fc-day-top fc-thu fc-past" data-date="2024-06-13">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-13&quot;,&quot;type&quot;:&quot;day&quot;}">13</a></td>
                                                                    <td class="fc-day-top fc-fri fc-past" data-date="2024-06-14">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-14&quot;,&quot;type&quot;:&quot;day&quot;}">14</a></td>
                                                                    <td class="fc-day-top fc-sat fc-past" data-date="2024-06-15">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-15&quot;,&quot;type&quot;:&quot;day&quot;}">15</a></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="fc-event-container">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-not-start fc-end fc-draggable fc-resizable" style="background-color:#54C798;border-color:#54C798">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">Long Event</span>
                                                                            </div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                    <td rowspan="2"></td>
                                                                    <td class="fc-event-container" rowspan="2">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" style="background-color:#A675D4;border-color:#A675D4">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">Repeating Event</span>
                                                                            </div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                    <td class="fc-event-container" colspan="3">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" style="background-color:#32C1CE;border-color:#32C1CE">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">Report and statement writing skills - achieving clinical excellence</span>
                                                                            </div><div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                    <td rowspan="2"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fc-event-container">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#A675D4;border-color:#A675D4">
                                                                            <div class="fc-content">
                                                                                <span class="fc-time">4p</span>
                                                                                <span class="fc-title">Clinic Anniversary</span>
                                                                            </div>
                                                                        </a>
                                                                    </td>
                                                                    <td class="fc-event-container">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" style="background-color:#A675D4;border-color:#A675D4">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">Medical Event</span>
                                                                            </div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                    <td class="fc-event-container">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" style="background-color:#32C1CE;border-color:#32C1CE">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">Meeting</span>
                                                                            </div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 83px;">
                                                        <div class="fc-bg">
                                                            <table>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="fc-day fc-widget-content fc-sun fc-past" data-date="2024-06-16"></td>
                                                                    <td class="fc-day fc-widget-content fc-mon fc-past" data-date="2024-06-17"></td>
                                                                    <td class="fc-day fc-widget-content fc-tue fc-past" data-date="2024-06-18"></td>
                                                                    <td class="fc-day fc-widget-content fc-wed fc-past" data-date="2024-06-19"></td>
                                                                    <td class="fc-day fc-widget-content fc-thu fc-past" data-date="2024-06-20"></td>
                                                                    <td class="fc-day fc-widget-content fc-fri fc-today fc-state-highlight" data-date="2024-06-21"></td>
                                                                    <td class="fc-day fc-widget-content fc-sat fc-future" data-date="2024-06-22"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="fc-content-skeleton">
                                                            <table>
                                                                <thead>
                                                                <tr>
                                                                    <td class="fc-day-top fc-sun fc-past" data-date="2024-06-16">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-16&quot;,&quot;type&quot;:&quot;day&quot;}">16</a></td>
                                                                    <td class="fc-day-top fc-mon fc-past" data-date="2024-06-17">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-17&quot;,&quot;type&quot;:&quot;day&quot;}">17</a></td>
                                                                    <td class="fc-day-top fc-tue fc-past" data-date="2024-06-18">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-18&quot;,&quot;type&quot;:&quot;day&quot;}">18</a></td>
                                                                    <td class="fc-day-top fc-wed fc-past" data-date="2024-06-19">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-19&quot;,&quot;type&quot;:&quot;day&quot;}">19</a></td>
                                                                    <td class="fc-day-top fc-thu fc-past" data-date="2024-06-20">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-20&quot;,&quot;type&quot;:&quot;day&quot;}">20</a></td>
                                                                    <td class="fc-day-top fc-fri fc-today fc-state-highlight" data-date="2024-06-21">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-21&quot;,&quot;type&quot;:&quot;day&quot;}">21</a></td>
                                                                    <td class="fc-day-top fc-sat fc-future" data-date="2024-06-22">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-22&quot;,&quot;type&quot;:&quot;day&quot;}">22</a></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="fc-event-container">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" style="background-color:#EfA752;border-color:#EfA752">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">Happy Hour</span>
                                                                            </div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                    <td rowspan="3"></td>
                                                                    <td class="fc-event-container" colspan="3">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" style="background-color:#54C798;border-color:#54C798">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">Three Day Event</span>
                                                                            </div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                    <td class="fc-event-container" rowspan="2">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#54C798;border-color:#54C798">
                                                                            <div class="fc-content">
                                                                                <span class="fc-time">12p</span>
                                                                                <span class="fc-title">Lunch</span>
                                                                            </div>
                                                                        </a>
                                                                        <div>
                                                                            <a class="fc-more">+1 more</a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="fc-event-container" rowspan="3">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#54C798;border-color:#54C798">
                                                                            <div class="fc-content">
                                                                                <span class="fc-time">10:30a</span>
                                                                                <span class="fc-title">Meeting</span>
                                                                            </div>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fc-event-container" rowspan="2">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#A675D4;border-color:#A675D4">
                                                                            <div class="fc-content">
                                                                                <span class="fc-time">4p</span>
                                                                                <span class="fc-title">Allergies Conference</span>
                                                                            </div>
                                                                        </a>
                                                                    </td>
                                                                    <td rowspan="2"></td>
                                                                    <td class="fc-event-container fc-limited" colspan="2">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" style="background-color:#EfA752;border-color:#EfA752">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">Two Day Event</span>
                                                                            </div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                    <td class="fc-more-cell" rowspan="1">
                                                                        <div><a class="fc-more">+1 more</a></div>
                                                                    </td>
                                                                    <td class="fc-more-cell" rowspan="1">
                                                                        <div><a class="fc-more">+2 more</a></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="fc-limited">
                                                                    <td></td>
                                                                    <td class="fc-event-container" colspan="2">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" style="background-color:#A675D4;border-color:#A675D4">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">Conference</span>
                                                                            </div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 83px;">
                                                        <div class="fc-bg">
                                                            <table>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="fc-day fc-widget-content fc-sun fc-future" data-date="2024-06-23"></td>
                                                                    <td class="fc-day fc-widget-content fc-mon fc-future" data-date="2024-06-24"></td>
                                                                    <td class="fc-day fc-widget-content fc-tue fc-future" data-date="2024-06-25"></td>
                                                                    <td class="fc-day fc-widget-content fc-wed fc-future" data-date="2024-06-26"></td>
                                                                    <td class="fc-day fc-widget-content fc-thu fc-future" data-date="2024-06-27"></td>
                                                                    <td class="fc-day fc-widget-content fc-fri fc-future" data-date="2024-06-28"></td>
                                                                    <td class="fc-day fc-widget-content fc-sat fc-future" data-date="2024-06-29"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="fc-content-skeleton">
                                                            <table>
                                                                <thead>
                                                                <tr>
                                                                    <td class="fc-day-top fc-sun fc-future" data-date="2024-06-23">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-23&quot;,&quot;type&quot;:&quot;day&quot;}">23</a></td>
                                                                    <td class="fc-day-top fc-mon fc-future" data-date="2024-06-24">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-24&quot;,&quot;type&quot;:&quot;day&quot;}">24</a></td>
                                                                    <td class="fc-day-top fc-tue fc-future" data-date="2024-06-25">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-25&quot;,&quot;type&quot;:&quot;day&quot;}">25</a></td>
                                                                    <td class="fc-day-top fc-wed fc-future" data-date="2024-06-26">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-26&quot;,&quot;type&quot;:&quot;day&quot;}">26</a></td>
                                                                    <td class="fc-day-top fc-thu fc-future" data-date="2024-06-27">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-27&quot;,&quot;type&quot;:&quot;day&quot;}">27</a></td>
                                                                    <td class="fc-day-top fc-fri fc-future" data-date="2024-06-28">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-28&quot;,&quot;type&quot;:&quot;day&quot;}">28</a></td>
                                                                    <td class="fc-day-top fc-sat fc-future" data-date="2024-06-29">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-29&quot;,&quot;type&quot;:&quot;day&quot;}">29</a></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="fc-event-container">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" style="background-color:#32C1CE;border-color:#32C1CE">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">5th Advances in Stem Cell Biology Course</span>
                                                                            </div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="fc-event-container">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" style="background-color:#32C1CE;border-color:#32C1CE">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">International Conference on Biological Inorganic Chemistry</span>
                                                                            </div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                    <td></td>
                                                                    <td class="fc-event-container">
                                                                        <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable" href="http://google.com/" style="background-color:#EfA752;border-color:#EfA752">
                                                                            <div class="fc-content">
                                                                                <span class="fc-title">Click for Google</span>
                                                                            </div>
                                                                            <div class="fc-resizer fc-end-resizer"></div>
                                                                        </a>
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 87px;">
                                                        <div class="fc-bg">
                                                            <table>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="fc-day fc-widget-content fc-sun fc-future" data-date="2024-06-30"></td>
                                                                    <td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2024-07-01"></td>
                                                                    <td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2024-07-02"></td>
                                                                    <td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2024-07-03"></td>
                                                                    <td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2024-07-04"></td>
                                                                    <td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2024-07-05"></td>
                                                                    <td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2024-07-06"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="fc-content-skeleton">
                                                            <table>
                                                                <thead>
                                                                <tr>
                                                                    <td class="fc-day-top fc-sun fc-future" data-date="2024-06-30">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-06-30&quot;,&quot;type&quot;:&quot;day&quot;}">30</a></td>
                                                                    <td class="fc-day-top fc-mon fc-other-month fc-future" data-date="2024-07-01">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-07-01&quot;,&quot;type&quot;:&quot;day&quot;}">1</a></td>
                                                                    <td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2024-07-02">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-07-02&quot;,&quot;type&quot;:&quot;day&quot;}">2</a></td>
                                                                    <td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2024-07-03">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-07-03&quot;,&quot;type&quot;:&quot;day&quot;}">3</a></td>
                                                                    <td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2024-07-04">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-07-04&quot;,&quot;type&quot;:&quot;day&quot;}">4</a></td>
                                                                    <td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2024-07-05">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-07-05&quot;,&quot;type&quot;:&quot;day&quot;}">5</a></td>
                                                                    <td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2024-07-06">
                                                                        <a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2024-07-06&quot;,&quot;type&quot;:&quot;day&quot;}">6</a></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
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
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="sub-ttl">Latest News</div>
                    <a href="#" class="row blog-recent">
                        <div class="col-4 blog-recent-img">
                            <img class="img-responsive img-thumbnail" src="uploads/recent-1.jpg" alt="">
                        </div>
                        <div class="col-8 blog-recent-post">
                            <h4>Why Food Poisoning happened and How To</h4>
                            <p>08 Jun 2017</p>
                        </div>
                    </a>
                    <a href="#" class="row blog-recent">
                        <div class="col-4 blog-recent-img">
                            <img class="img-responsive img-thumbnail" src="uploads/recent-2.jpg" alt="">
                        </div>
                        <div class="col-8 blog-recent-post">
                            <h4>Which Healthy Food Fads Should You Follow?</h4>
                            <p>27 Apr 2017</p>
                        </div>
                    </a>
                    <a href="#" class="row blog-recent">
                        <div class="col-4 blog-recent-img">
                            <img class="img-responsive img-thumbnail" src="uploads/recent-3.jpg" alt="">
                        </div>
                        <div class="col-8 blog-recent-post">
                            <h4>A Broken Heart Can Hurt More Than You Think</h4>
                            <p>29 Jan 2017</p>
                        </div>
                    </a>
                    <a href="#" class="row blog-recent">
                        <div class="col-4 blog-recent-img">
                            <img class="img-responsive img-thumbnail" src="uploads/recent-4.jpg" alt="">
                        </div>
                        <div class="col-8 blog-recent-post">
                            <h4>Keep it Clean: Make Sure Your Fruits and Veggies</h4>
                            <p>24 Jan 2017</p>
                        </div>
                    </a>
                    <a href="#" class="row blog-recent">
                        <div class="col-4 blog-recent-img">
                            <img class="img-responsive img-thumbnail" src="uploads/recent-5.jpg" alt="">
                        </div>
                        <div class="col-8 blog-recent-post">
                            <h4>Should I bring my child in for a routine physical?</h4>
                            <p>15 Jan 2017</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop
