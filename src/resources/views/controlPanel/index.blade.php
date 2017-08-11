@extends('laravel-enso/core::layouts.app')

@section('pageTitle', __("App Statistics"))

@section('css')
    <style>
        div.form-group.white {
            background: white;
        }
        div.form-group.white > input {
            padding-right: 10px;
        }
        ul.errors, ul.errors ul {
            list-style-type: none;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        ul.errors li {
            border-top: 1px solid #eee;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        span.error {
            color:red;
        }
        .margin-top-7 {
            margin-top: 7px;
        }

        .my-box {
            position: relative;
            display: block;
            margin-bottom: 20px;
        }

        .bg-white {
            background: white;
        }

        .card-footer {
            height: 40px;
            position: absolute;
            width: 100%;
            background-color: #ECECEC;
        }

        .footer-button {
            margin: 6px;
            background-color: #ECECEC;
        }

        .card-body {
            height:265px; background-color: white;
        }

        .card-body h4 {
            font: 400 30px/1.5 Helvetica, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .card-body ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .card-body li {
            font: 120 13px/1.5 Helvetica, Verdana, sans-serif;
        }

        .card-body li:last-child {
            border: none;
        }

        .card-body li {
            text-decoration: none;
            color: #000;
            display: block;
            width: 100%;

            -webkit-transition: font-size 0.3s ease, background-color 0.3s ease;
            -moz-transition: font-size 0.3s ease, background-color 0.3s ease;
            -o-transition: font-size 0.3s ease, background-color 0.3s ease;
            -ms-transition: font-size 0.3s ease, background-color 0.3s ease;
            transition: font-size 0.3s ease, background-color 0.3s ease;
        }

        .card-body li:hover {
            font-size: 20px;
            background: #f6f6f6;
        }



        .square-flip {
            -webkit-perspective: 1000;
            -moz-perspective: 1000;
            -ms-perspective: 1000;
            perspective: 1000;

            -webkit-transform: perspective(1000px);
            -moz-transform: perspective(1000px);
            -ms-transform: perspective(1000px);
            transform: perspective(1000px);

            -webkit-transform-style: preserve-3d;
            -moz-transform-style: preserve-3d;
            -ms-transform-style: preserve-3d;
            transform-style: preserve-3d;

            /*border:1px solid #efefef;*/

            position: relative;
            float: left;
            margin: 20px;
        }
        .square-flip {
            width: 340px;
            height: 310px;
        }
        .square, .square2 {
            width: 100%;
            height: 100%;
        }
        .square {
            background-size: cover;
            background-position: center center;

            -ms-transition: transform 0.60s cubic-bezier(.5, .3, .3, 1);
            transition: transform 0.60s cubic-bezier(.5, .3, .3, 1);
            -webkit-transition: transform 0.60s cubic-bezier(.5, .3, .3, 1);
            overflow: hidden;

            position: absolute;
            top: 0;

            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .square-flip .square {
            -webkit-transform: rotateY(0deg);
            -moz-transform: rotateY(0deg);
            -o-transform: rotateY(0deg);
            -ms-transform: rotateY(0deg);
            transform: rotateY(0deg);
            transform-style: preserve-3d;
            z-index: 1;
        }
        .square-flip.flipped .square {
            -webkit-transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
            -o-transform: rotateY(-180deg);
            -ms-transform: rotateY(-180deg);
            transform: rotateY(-180deg);
            transform-style: preserve-3d;
        }

        .square2 {
            background-size: cover;
            background-position: center center;

            -ms-transition: transform 0.60s cubic-bezier(.5, .3, .3, 1);
            transition: transform 0.60s cubic-bezier(.5, .3, .3, 1);
            -webkit-transition: transform 0.60s cubic-bezier(.5, .3, .3, 1);
            overflow: hidden;

            position: absolute;
            top: 0;

            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .square-flip .square2 {
            -webkit-transform: rotateY(180deg);
            -moz-transform: rotateY(180deg);
            -o-transform: rotateY(180deg);
            -ms-transform: rotateY(180deg);
            transform: rotateY(180deg);
            transform-style: preserve-3d;
            z-index: 1;
        }
        .square-flip.flipped .square2 {
            -webkit-transform: rotateY(0deg);
            -moz-transform: rotateY(0deg);
            -o-transform: rotateY(0deg);
            -ms-transform: rotateY(0deg);
            transform: rotateY(0deg);
            transform-style: preserve-3d;
        }

        /*Square content*/
        .square-container {

            position: relative;
            top: 43%;

            -ms-transition: transform 0.60s cubic-bezier(.5, .3, .3, 1);
            transition: transform 0.60s cubic-bezier(.5, .3, .3, 1);
            -webkit-transition: transform 0.60s cubic-bezier(.5, .3, .3, 1);

            -webkit-transform: translateY(-50%) translateX(0px) scale(1);
            -ms-transform: translateY(-50%) translateX(0px) scale(1);
            transform: translateY(-50%) translateX(0px) scale(1);
            transform-style: preserve-3d;
            z-index: 2;
        }
        .square-flip.flipped .square-container {
            -webkit-transform: translateY(-50%) translateX(-650px) scale(.88);
            -ms-transform: translateY(-50%) translateX(-650px) scale(.88);
            transform: translateY(-50%) translateX(-650px) scale(.88);
            transform-style: preserve-3d;
        }

        .square-container2 {

            position: relative;
            top: 43%;

            -ms-transition: transform 0.60s cubic-bezier(.5, .3, .3, 1);
            transition: transform 0.60s cubic-bezier(.5, .3, .3, 1);
            -webkit-transition: transform 0.60s cubic-bezier(.5, .3, .3, 1);

            -webkit-transform: translateY(-50%)
            translateX(650px)
            translateZ(60px)
            scale(.88);
            -ms-transform: translateY(-50%) translateX(650px) translateZ(60px) scale(.88);
            transform: translateY(-50%) translateX(650px) translateZ(60px) scale(.88);

            transform-style: preserve-3d;
            z-index: 2;
        }
        .square-flip.flipped .square-container2 {
            -webkit-transform: translateY(-50%) translateX(0px) translateZ(0px) scale(1);
            -ms-transform: translateY(-50%) translateX(0px) translateZ(0px) scale(1);
            transform: translateY(-50%) translateX(0px) translateZ(0px) scale(1);
            transform-style: preserve-3d;
        }

        /*Style text*/
        .square-flip h2 {
            color: white;
            font-family: "Open Sans";
            font-weight: 700;
            font-size: 22px;
        }
        .square-flip h3 {
            color: white;
            font-family: "Open Sans";
            font-weight: 500;
            font-size: 16px;
            line-height: 26px;
        }
        /*Elements*/
        .flip-overlay {
            display: block;
            background: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
        }
        .align-center {
            margin: 0 auto;
        }

        /*ADD SHADOWS OPTIONAL*/
        .square-flip .square .boxshadow,
        .square-flip .square .textshadow,
        .square-flip .square2 .boxshadow,
        .square-flip .square2 .textshadow {
            -ms-transition: 0.60s;
            transition: 0.60s;
            -webkit-transition: 0.60s;
        }

        .square-flip .square .boxshadow {
            -webkit-box-shadow: 2px 4px 58px -8px rgba(0, 0, 0, 0.18);
            -moz-box-shadow: 2px 4px 58px -8px rgba(0, 0, 0, 0.18);
            box-shadow: 2px 4px 58px -8px rgba(0, 0, 0, 0.18);
        }
        .square-flip .square .textshadow {
            -webkit-text-shadow: 2px 4px 58px -8px rgba(0, 0, 0, 0.18);
            -moz-text-shadow: 2px 4px 58px -8px rgba(0, 0, 0, 0.18);
            text-shadow: 2px 4px 58px -8px rgba(0, 0, 0, 0.18);
        }
        .square-flip.flipped .square .boxshadow, .square-flip.flipped .square .textshadow {
            -webkit-box-shadow: 240px 42px 58px -8px rgba(0, 0, 0, 0.0);
            -moz-box-shadow: 240px 42px 58px -8px rgba(0, 0, 0, 0.0);
            box-shadow: 240px 42px 58px -8px rgba(0, 0, 0, 0.0);
        }

        .square-flip .square2 .boxshadow {
            -webkit-box-shadow: 240px 42px 58px -8px rgba(0, 0, 0, 0.0);
            -moz-box-shadow: 240px 42px 58px -8px rgba(0, 0, 0, 0.0);
            box-shadow: 240px 42px 58px -8px rgba(0, 0, 0, 0.0);
        }
        .square-flip .square2 .textshadow {
            -webkit-text-shadow: 240px 42px 58px -8px rgba(0, 0, 0, 0.0);
            -moz-text-shadow: 240px 42px 58px -8px rgba(0, 0, 0, 0.0);
            text-shadow: 240px 42px 58px -8px rgba(0, 0, 0, 0.0);
        }
        .square-flip.flipped .square2 .boxshadow,
        .square-flip.flipped .square2 .textshadow {
            -webkit-box-shadow: 2px 4px 58px -8px rgba(0, 0, 0, 0.18);
            -moz-box-shadow: 2px 4px 58px -8px rgba(0, 0, 0, 0.18);
            box-shadow: 2px 4px 58px -8px rgba(0, 0, 0, 0.18);
        }

        .clearfix {
            clear: both;
        }

        .shadow {
            -webkit-box-shadow: 2px 4px 58px -8px rgba(0, 0, 0, 0.18);
            -moz-box-shadow: 2px 4px 58px -8px rgba(0, 0, 0, 0.18);
            box-shadow: 2px 4px 58px -8px rgba(0, 0, 0, 0.18);
        }

        /* profile used for data display */
        .profiles {
            display: inline-block;
            width: 100%;
            padding: 0 20px 0 20px;
        }

        .profile {
            width: 50%;
            height: auto;
            transform: translate(0px, -10px);
            float: left;
            margin: 4px auto;
            overflow: hidden;
            z-index: 2;
            transition: 0.2s cubic-bezier(.55, 0, .1, 1);
            color: #37474f;
        }

        .profile>span {
            line-height: 40px;
            font-size: 1.2em;
            font-weight: 600;
            display: block;
            font-style: none;
            color: #37474f;
        }

        .scroll-port {
            overflow: auto;
            height: 202px;
        }

    </style>
@endsection

@section('content')

    <section class="content-header">

        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <a class="btn btn-primary" href="#" @click="isAddAppModalVisible=true">
                {{ __("Add App") }}
            </a>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">

            <input type="text" placeholder="{{__('Filter')}}" class="margin-top-7"
                   size=15
                   v-model="query"
                   v-if="activeApps.length > 1">

        </div>

        <breadcrumbs></breadcrumbs>
    </section>

    <section class="content" v-cloak >
        <modal :show="isAddAppModalVisible"
                cancel-only header
                :container-style="{'max-width': '500px'}"
                @cancel-action="isAddAppModalVisible=false">
                <span slot="header">{{ __("Subscribe to a new app") }}</span>
                <span slot="body">
                    <app-subscriber :app-types="appTypes" @app-subscribed="pushNewApp"/>
                    </app-subscriber>
                </span>
                <span slot="cancel">{{ __("Close") }}</span>
        </modal>

        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <label><b>{{ __("Start Date") }}</b></label>
                <div class="form-group white">
                    <datepicker
                        v-model="filters.startDate">
                    </datepicker>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <label><b>{{ __("End Date") }}</b></label>
                <div class="form-group white">
                    <datepicker
                        v-model="filters.endDate">
                    </datepicker>
                </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4">
                <label><b>{{ __("Total Logins") }}</b></label>
                <div class="form-group white">
                    <input class="form-control text-right" :value="totals.logins" readonly="readonly">
                </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4">
                <label><b>{{ __("Total Actions") }}</b></label>
                <div class="form-group white">
                    <input class="form-control text-right" :value="totals.actions" readonly="readonly">
                </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4">
                <label><b>{{ __("Active Sessions") }}</b></label>
                <div class="form-group white">
                    <input class="form-control text-right" :value="totals.sessions" readonly="readonly">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" v-cloak>

                <div class="col-md-12" v-if="!activeApps.length">
                    <br>
                    {{__("Not subscribed to any apps")}}
                </div>

                <div v-for="app in activeApps">

                    <application-metrics v-show="isVisible(app.id)"
                                         :application-entity="app"
                                         :all-data-types="dataTypes"
                                         :filters="filters"
                                         ref="app-metrics"
                                         @app-metrics-received="updateTotals()"
                    @remove-subscribed-app="removeApp">
                    </application-metrics>

                </div>

            </div>
        </div>

    </section>

@endsection

@push('scripts')

    {{-- display statistics component --}}
    <script type="text/x-template" id="subscribed-app-metrics">

        <div class="col-xs-12 col-sm-6 col-md-3">

            <div class="square-flip" :class="{flipped: flipped}">

                <div class="square shadow">

                    <div class="square-container">

                        <div class="card-body">

                            <h4>
                                <i v-if="appMetrics.status == 'loading'" class="fa fa-spinner fa-spin fa-fw" style="color: red;"></i>
                                <i v-if="appMetrics.status != 'loading'" class="fa fa-circle-o fa-fw" :style="{color: appMetrics.status}"></i>

                                <span v-html="applicationEntity.name"></span>
                                <button class="btn btn-flat bg-white pull-right" @click="flipped=!flipped">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </h4>

                            <br>
                            <div class="row">
                                <div class="col-md-12">


                                    <div class="profiles">
                                        <div v-for="metric in appMetrics.data"
                                                class="profile">
                                            <span v-html="metric.value"></span> @{{ metric.key }}
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12"> {{-- want the padding --}}
                                        <ul v-if="appMetrics.errors.length">
                                            <li v-for="error in appMetrics.errors">
                                                <span v-html="error" style="color:red;"></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer" style="height:40px;">
                            <button class="btn btn-flat bg-white pull-right footer-button" @click="getAllMetrics">
                                <i class="fa fa-refresh"></i>
                            </button>
                            <button class="btn btn-flat bg-white pull-left footer-button" @click="deleteSubscribedApplication">
                                <i class="fa fa-trash-o" style="color:red"></i>
                            </button>
                        </div>

                    </div>
                </div>

                <div class="square2 shadow" :class="{flipped: flipped}" >

                    <div class="square-container2">

                        <div class="card-body">
                            <h4>
                                <i class="fa fa-circle-o fa-fw" :style="{color: appMetrics.status}"></i>

                                <span v-html="applicationEntity.name"></span>
                                <button class="btn btn-flat bg-white pull-right" @click="flipped=!flipped">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </h4>
                            <br>
                            <div class="col-md-12 scroll-port">
                                <div class="row">
                                    <div class="col-md-12" style="padding: 0 20px 0 20px;">
                                        <div class="row" v-for="dataType in allDataTypes">
                                            <input type="checkbox" :id="dataType" :value="dataType.key"
                                                   @change="updatePreferences"
                                                   v-model="preferences.dataTypes">

                                            <label :for="dataType">
                                                <span v-html="dataType.value"></span>
                                            </label>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="form-group">
                                                <label for="">{{ __("Refresh Interval (minutes)") }}</label>
                                                <div class="input-group">
                                                    <input type="number" min="1"
                                                           @change="updateInterval"
                                                           v-model="preferences.refreshInterval">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="height:40px;">
                            <div class="col-md-12">
                                <div class="row" v-if="appMetrics.appType == 2">

                                        <button class="btn btn-flat bg-white pull-left footer-button"
                                                v-tooltip="'clear log'"
                                                @click="clearLaravelLog">
                                            <i class="fa fa-recycle" style="color:red"></i>
                                        </button>
                                        <button class="btn btn-flat bg-white pull-right footer-button"
                                                v-tooltip="'set maintenance mode'"
                                                @click="showModal=true">
                                            <i class="fa fa-power-off" style="color:red"></i>
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <modal :show="showModal" @cancel-action="showModal = false" @commit-action="setMaintenanceMode">
            </modal>
        </div>

    </script>

    {{-- app subscriber --}}
    <script type="text/x-template" id="app-subscriber">
        <div class="col-md-12">
            <br>
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group" :class="{'has-error' : errorBag.name}">
                        <label>{{ __('Name') }}</label>
                        <div class="input-group">
                            <input type="text"
                                   v-model="newApp.name"
                                   class="form-control">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group disabled-select-white-bg" :class="{'has-error' : errorBag.type}">
                        <label>{{ __("App Type") }}</label>
                        <vue-select :options="appTypes"
                                    v-model="newApp.type"
                                    selected="2"
                        >
                        </vue-select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group" :class="{'has-error' : errorBag.url}">
                        <label>{{ __('URL') }}</label>
                        <div class="input-group">
                            <input type="text"
                                   v-model="newApp.url"
                                   class="form-control">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group" :class="{'has-error' : errorBag.client_id}">
                        <label>{{ __('Client ID') }}</label>
                        <div class="input-group">
                            <input type="text"
                                   v-model="newApp.client_id"
                                   class="form-control">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group" :class="{'has-error' : errorBag.secret}">
                        <label>{{ __('Secret') }}</label>
                        <div class="input-group">
                            <input type="password"
                                   v-model="newApp.secret"
                                   class="form-control">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-4 col-sm-offset-3">
                    <button class="btn btn-success btn-block margin-top-24"
                            @click="subscribeToApp">
                        {{ __('Subscribe') }}
                    </button>
                </div>
            </div>

        </div>
    </script>

    <script type="text/javascript">
        const vm = new Vue({
            el: "#app",
            data: function() {
                return {
                    isAddAppModalVisible: false,
                    activeApps: {!! $activeApps  !!},
                    appTypes: {!! $subscribedAppTypes !!},
                    dataTypes: {!! $dataTypes !!},
                    totals: {
                        logins: 0,
                        actions: 0,
                        sessions: 0
                    },
                    filters: {
                        startDate: moment().format('DD-MM-Y'),
                        endDate: moment().add(1, 'day').format('DD-MM-Y')
                    },
                    errorBag: {},
                    query: null
                }
            },
            computed: {
                filteredApps: function() {

                    let filtered = this.activeApps;

                    if (this.query) {
                        let self = this;
                        filtered = this.activeApps.filter( function(app) {
                            return app.name.toLowerCase().indexOf(self.query.toLowerCase()) > -1;
                        })
                    }

                    return filtered.map(function (app) {
                        return app.id;
                    })
                },
            },
            methods: {
                updateTotals() {
                    let totals = { logins: 0, actions: 0, sessions: 0 };

                    if (typeof this.$refs['app-metrics'] == 'undefined') {
                        return totals;
                    }

                    this.$refs['app-metrics'].forEach(ref => {
                        if (!ref.appMetrics.data.length) {
                            return;
                        }

                        let obj = ref.appMetrics.data.find(info => {
                            return info.key === 'logins';
                        });

                        totals.logins += obj.value;

                        obj = ref.appMetrics.data.find(info => {
                            return info.key === 'actions';
                        });

                        totals.actions += obj.value;

                        obj = ref.appMetrics.data.find(info => {
                            return info.key === 'active sessions';
                        });

                        if (obj) {
                            totals.sessions += obj.value;
                        }
                    });

                    this.totals = totals;
                },

                isVisible: function (appId) {
                    return this.filteredApps.indexOf(appId) >= 0;
                },
                pushNewApp: function(newApp) {

                    this.activeApps.push(newApp);
                },
                buildPayload: function (application) {

                    let data = {
                        id: application.id,
                        appName: application.name,
                        appType: application.type,
                        status: "loading",
                        data: [],
                        errors: [],
                        preferences: application.preferences,
                    };

                    return data;
                },
                getAllMetrics: function () {

                    this.appMetrics = [];
                    for (let i = 0; i < this.activeApps.length; ++i) {
                        let payload = this.buildPayload(this.activeApps[i]);
                        this.appMetrics.push(payload);
                    }
                },
                showAppMetric: function (payload) {
                    this.appMetrics = [];
                    this.appMetrics.push(payload);
                },

                removeApp: function (appId) {
                    console.log('Hit ' + appId);
                    this.activeApps = this.activeApps.filter(function (app) {
                        return app.id !== appId;
                    });
                }
            },
            created: function() {
            },
            components: {
                appSubscriber: {
                    template: '#app-subscriber',
                    props: {
                        appTypes: {
                            type: Array,
                            default: function () {
                                return [];
                            }
                        },
                        dataTypes: {
                            type: Array,
                            default: function () {
                                return [];
                            }
                        }
                    },
                    data: function () {
                        return {
                            newApp: this.newAppBuilder(),
                            errorBag: []
                        }
                    },
                    methods: {
                        newAppBuilder: function () {
                            return {
                                name: null,
                                description: null,
                                url:  null,
                                type:  2,
                                client_id:  null,
                                secret:  null,
                                token:  null
                            }
                        },

                        subscribeToApp: function () {

                            let self = this;
                            axios.post('/controlPanel', this.newApp).then(function(response) {
                                self.$emit('app-subscribed', response.data);
                            }).then(function(response) {
                                self.newApp =  self.newAppBuilder();
                            }).catch(function (error) {
                                console.log(error);
                                if (error.response.data.level) {
                                    self.errorBag = error.response.data.errorBag;
                                    toastr[error.response.data.level](error.response.data.message);
                                }
                            });
                        },
                    }
                },
                subscribedApplication: {
                    template: '#subscribed-app',
                    props: {
                        application: {
                            type: Object,
                            default: {}
                        },
                        filters: {
                            type: Object,
                            default: {}
                        }
                    },
                    computed: {

                    },
                    data: function () {
                        return {

                        };
                    },
                    methods: {
                        showAppStatistics: function () {

                            let data = {
                                id: this.application.id,
                                appName: this.application.name,
                                appType: this.application.type,
                                status: "loading",
                                data: [],
                                errors: [],
                                preferences: this.application.preferences,
                            };

                            this.$emit('sent-app-metrics', data);
                        },

                    }
                },
                applicationMetrics: {
                    template: '#subscribed-app-metrics',
                    props: {
                        applicationEntity: {
                            type: Object,
                            default: function () {
                                return {
                                    id: 0,
                                    appName: "default",
                                    status: 'green',
                                    data:[
                                        {
                                            key:"",
                                            value:""
                                        }
                                    ],
                                    errors: [],
                                    preferences: []
                                }
                            }
                        },
                        filters: {
                            type: Object,
                            default: function () {
                                return {};
                            }
                        },
                        allDataTypes: {
                            type: Array,
                            default: function () {
                                return [];
                            }
                        }
                    },
                    computed: {
                    },
                    data: function () {
                        return {
                            flipped: false,
                            refreshInterval: 1,
                            intervalEventId: null,
                            appMetrics: {
                                data: [],
                                errors: [],
                                status: 'loading'
                            },
                            preferences: this.applicationEntity.preferences,
                            showModal: false
                        }
                    },
                    watch: {
                        applicationEntity: {
                            handler: 'getAllMetrics',
                            deep: true
                        }
                    },
                    methods: {
                        deleteSubscribedApplication: function() {

                            let self = this;
                            axios.delete('/controlPanel/' + this.applicationEntity.id)
                                .then(function(response) {

                                    self.$emit('remove-subscribed-app', self.applicationEntity.id);
                                });
                        },
                        updatePreferences: function () {
                            axios.post('/controlPanel/updatePreferences/' + this.applicationEntity.id, {preferences: this.preferences})
                                .then(function(response) {

                                    toastr['success'](response.data.message);
                                });
                        },
                        setMaintenanceMode: function () {

                            axios.post('/controlPanel/setMaintenanceMode/' + this.applicationEntity.id)
                                .then(function(response) {

                                    toastr['success'](response.data.message);
                                });

                            this.showModal = false;
                        },
                        buildRequestPayload: function () {

                            return {
                                filters: this.filters,
                                dataTypes: this.preferences.dataTypes
                            }
                        },
                        clearLaravelLog: function () {

                            if(!this.applicationEntity.id) return;

                            let payload = this.buildRequestPayload();

                            axios.delete('/controlPanel/clearLaravelLog/' + this.applicationEntity.id, {params:payload})
                                .then(function(response) {

                                    toastr['success'](response.data.message);
                                });
                        },
                        getAllMetrics: function () {

                            this.appMetrics.status = 'loading';

                            let payload = this.buildRequestPayload();

                            let self = this;
                            axios.get('/controlPanel/get/' + this.applicationEntity.id, {params:payload})
                                .then(function(response) {

                                    self.appMetrics = response.data;
                                }).then(() => {
                                    this.$emit('app-metrics-received');
                                });
                        },
                        updateInterval: function () {

                            if(this.refreshInterval<1) {
                                this.refreshInterval = 1;
                            }

                            this.resetInterval();
                            this.setInterval();

                            this.updatePreferences();
                        },
                        resetInterval: function () {
                            clearInterval(this.intervalEventId);
                        },
                        setInterval: function () {

                            let tmpInterval = this.refreshInterval * 60000;
                            this.intervalEventId = setInterval(function () {
                                this.getAllMetrics();
                            }.bind(this), tmpInterval);
                        }
                    },
                    mounted: function () {

                        this.getAllMetrics();
                        this.setInterval();
                    },

                    beforeDestroy: function(){

                        clearInterval(this.intervalEventId);
                    }
                },
            }
        });
    </script>
@endpush