@extends('laravel-enso/core::layouts.app')

@section('pageTitle', __("App Statistics"))

@section('includesCss')

    <style>

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
        .margin-top-24 {
            margin-top: 24px;
        }

        .flip-container {
            perspective: 1000px;
        }
        /* flip the pane when hovered */

        .flip-container.flip .flipper {
            transform: rotateY(180deg);
        }

        .flip-container, .front, .back {
            width: 100%;
            height: 215px;
        }

        /* flip speed goes here */
        .flipper {
            transition: 0.6s;
            transform-style: preserve-3d;

            position: relative;
        }

        /* hide back of pane during swap */
        .front, .back {
            backface-visibility: hidden;

            position: absolute;
            top: 0;
            left: 0;
        }

        /* front pane, placed above back */
        .front {
            z-index: 2;
            /* for firefox 31 */
            transform: rotateY(0deg);
        }

        /* back, initially hidden pane */
        .back {
            transform: rotateY(180deg);
        }

        .inherit-color-hover:hover {
            color: inherit;
        }

        .bg-white {
            background: white;
        }

    </style>

@endsection

@section('content')

    <section class="content-header">
        @include('laravel-enso/core::partials.breadcrumbs')
    </section>
    <section class="content" v-cloak >

        <transition-group name="fadeUp" mode="out-in" tag="div">
            <div class="row" key="newRow">
                <div class="col-md-12">
                    <div class="box box-primary" v-cloak>
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
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
                                    <div class="col-lg-3 col-md-4">
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
                                    <div class="col-lg-2 col-md-2">
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
                                    <div class="col-lg-2 col-md-2">
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

                                    <div class="col-lg-2 col-md-2">
                                        <div class="form-group disabled-select-white-bg">
                                            <label>{{ __("App Type") }}</label>
                                            <vue-select :options="appTypes"
                                                        v-model="newApp.type"
                                                        selected="2"
                                                        >
                                            </vue-select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-4">
                                        <button class="btn btn-primary btn-block margin-top-24"
                                            @click="subscribeToApp">
                                            {{ __('Subscribe') }}
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" key="newRow">
                <div class="col-md-12">
                    <div class="box box-primary" v-cloak>
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">{{ __("Start Date") }}</label>
                                        <div class="input-group">
                                            <datepicker v-model="filters.startDate"
                                                        clear-button>
                                            </datepicker>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">{{ __("End Date") }}</label>
                                        <div class="input-group">
                                            <datepicker v-model="filters.endDate" clear-button>
                                            </datepicker>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-4 pull-right">
                                    <button class="btn btn-success btn-block margin-top-24"
                                            @click="getAllMetrics">
                                        {{ __('Get All Metrics') }}
                                    </button>
                                </div>

                            </div>

                            <div class="row">

                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-3" v-for="metric in appMetrics">

                                    <application-metrics :initial-metrics="metric"
                                        :all-data-types="dataTypes"
                                        :filters="filters">
                                    </application-metrics>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row" key="newRow">
                <div class="col-md-12">
                    <div class="box box-primary" v-cloak>
                        <div class="box-body">

                            <div class="row" v-if="activeApps" >

                                <div class="col-md-12" v-if="!activeApps.length" >
                                    {{__('No apps defined')}}
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12" v-for="app in activeApps">
                                    <subscribed-application :application="app" :filters="filters"
                                        @sent-app-metrics="showAppMetric" @remove-subscribed-app="removeApp" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition-group>

    </section>

@endsection

@push('scripts')

    {{-- subscribed apps component --}}
    <script type="text/x-template" id="subscribed-app">
        <div :class="['small-box', 'bg-light-blue']">

            <div class="innner">

                <address style="padding-left: 20px; padding-top: 15px;"
                         v-tooltip="application.description" >
                    {{ __("Name") }}: <strong><span v-html="application.name"></span></strong><br>
                    {{ __("URL") }}: <strong><span v-html="application.url"></span></strong><br>
                    {{ __("Client Id") }}: <span v-html="application.client_id"></span><br>
                    {{ __("Added on") }}: <span v-html="application.created_at"></span><br>
                </address>

            </div>
            <div class="icon" @click="showAppStatistics" style="cursor: pointer;">
                <i class="fa fa-ravelry"></i>
            </div>
            <a class="small-box-footer" href="#" @click="deleteSubscribedApplication">
                <i class="fa fa-trash-o"></i>
            </a>
        </div>
    </script>

    {{-- display statistics component --}}
    <script type="text/x-template" id="subscribed-app-metrics">

        <div class="small-box flip-container inherit-color-hover" :class="{flip: flipped}">

            <div class="flipper">

                <div class="front" :class="{flipped: flipped}">

                    <div class="inner">
                        <h4>
                            <i v-if="appMetrics.status == 'loading'" class="fa fa-spinner fa-spin fa-fw" style="color: red;"></i>
                            <i v-if="appMetrics.status != 'loading'" class="fa fa-circle-o fa-fw" :style="{color: appMetrics.status}"></i>

                            <span v-html="appMetrics.appName"></span>
                            <button class="btn btn-flat bg-white pull-right" @click="flipped=!flipped">
                                <i class="fa fa-bars"></i>
                            </button>
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul>
                                    <li v-for="metric in appMetrics.data">
                                        <span v-html="metric.key"></span>: <span v-html="metric.value"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <ul v-if="appMetrics.errors.length">
                                    <li v-for="error in appMetrics.errors">
                                        <span v-html="error"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="back" :class="{flipped: flipped}" >

                    <div class="col-md-12">
                        <br>
                            <div class="inner">
                                <h4>
                                    <i class="fa fa-circle-o" :style="{color: appMetrics.status}"></i>
                                    <span v-html="appMetrics.appName"></span>
                                    <button class="btn btn-flat bg-white pull-right" @click="flipped=!flipped">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                </h4>
                            </div>
                        <br>
                        <div class="col-md-12" style="overflow: auto; height: 130px;">
                            <div class="row">
                                <div class="col-md-12">

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

                                    <div class="row" v-if="appMetrics.appType == 2">
                                        <div class="col-md-12">
                                            <button class="btn btn-danger btn-block margin-top-24"
                                                    @click="clearLaravelLog">
                                                {{ __('Clear Laravel Log') }}
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row" v-if="appMetrics.appType == 2">
                                        <div class="col-md-12">
                                            <button class="btn btn-danger btn-block margin-top-24"
                                                    @click="showModal=true">
                                                {{ __('Take Down') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <modal :show="showModal" @cancel-action="showModal = false" @commit-action="setMaintenanceMode">
                @include('laravel-enso/core::partials.modal')
            </modal>
        </div>

    </script>

    <script type="text/javascript">

        class StatisticsApp {

            constructor(name=null, description=null, url=null, client_id=null, secret=null, token=null ) {
                this.name=name;
                this.description=description;
                this.url=url;
                this.type=2;
                this.client_id=client_id;
                this.secret=secret;
                this.token=token;
            }
        }

        let vm = new Vue({
            el: "#app",
            data: function() {
                return {
                    newApp: new StatisticsApp(),
                    activeApps: JSON.parse('{!! $activeApps  !!}'),
                    appTypes: JSON.parse('{!! $subscribedAppTypes !!}'),
                    dataTypes: JSON.parse('{!! $dataTypes !!}'),
                    appMetrics: [],
                    filters: {
                        startDate: "01-01-2017",
                        endDate: "01-01-2025"
                    },
                    errorBag: {}
                }
            },
            computed: {

            },
            methods: {

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
                subscribeToApp: function () {

                    let self = this;
                    axios.post('/controlPanel', this.newApp).then(function(response) {
                        self.activeApps.push(response.data);
                    }).then(function(response) {
                        self.newApp = new StatisticsApp();
                    }).catch(function (error) {
                        if (error.response.data.level) {
                            self.errorBag = error.response.data.errorBag;
                            toastr[error.response.data.level](error.response.data.message);
                        }
                    });
                },
                removeApp: function (appId) {
                    this.activeApps = this.activeApps.filter(function (app) {
                        return app.id !== appId;
                    });
                }
            },
            created: function() {
            },
            components: {
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
                        deleteSubscribedApplication: function() {

                            let self = this;
                            axios.delete('/controlPanel/' + this.application.id)
                                .then(function(response) {

                                    self.$emit('remove-subscribed-app', self.application.id);
                                });
                        }
                    }
                },
                applicationMetrics: {
                    template: '#subscribed-app-metrics',
                    props: {
                        initialMetrics: {
                            type: Object,
                            default: function () {
                                return {
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
                            appMetrics: this.initialMetrics,
                            preferences: this.initialMetrics.preferences,
                            showModal: false
                        }
                    },
                    methods: {

                        updatePreferences: function () {
                            axios.post('/controlPanel/updatePreferences/' + this.initialMetrics.id, {preferences: this.preferences})
                                .then(function(response) {

                                    toastr['success'](response.data.message);
                                });
                        },
                        setMaintenanceMode: function () {

                            axios.post('/controlPanel/setMaintenanceMode/' + this.initialMetrics.id)
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


                            let payload = this.buildRequestPayload();

                            axios.delete('/controlPanel/clearLaravelLog/' + this.initialMetrics.id, {params:payload})
                                .then(function(response) {

                                    toastr['success'](response.data.message);
                                });
                        },
                        getAllMetrics: function () {

                            let payload = this.buildRequestPayload();

                            let self = this;
                            axios.get('/controlPanel/get/' + this.initialMetrics.id, {params:payload})
                                .then(function(response) {

                                    self.appMetrics = response.data;
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