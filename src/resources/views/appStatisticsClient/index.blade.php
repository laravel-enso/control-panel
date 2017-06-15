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
                                        <div class="form-group">
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
                                        <div class="form-group">
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
                                        <div class="form-group">
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
                                        <div class="form-group">
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
                                <div class="col-md-3" v-for="metric in appMetrics">

                                    <application-metrics :app-metrics="metric" >
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
                                    <subscribed-application :application="app"
                                        @sent-app-metrics="showAppMetric" :filters="filters"/>
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

    {{-- equipment component --}}
    <script type="text/x-template" id="subscribed-app">
        <div :class="['small-box', 'bg-light-blue']">

            <div class="innner">

                <address style="padding-left: 20px; padding-top: 15px;" v-tooltip="application.description">
                    {{ __("Name") }}: <strong><span v-html="application.name"></span></strong><br>
                    {{ __("URL") }}: <strong><span v-html="application.url"></span></strong><br>
                    {{ __("Client Id") }}: <span v-html="application.client_id"></span><br>
                    {{ __("Added on") }}: <span v-html="application.created_at"></span><br>
                </address>

            </div>
            <div class="icon">
                <i class="fa fa-print"></i>
            </div>
            <a class="small-box-footer" href="#" @click="getAllMetrics">
                <i class="fa fa-arrow-circle-right  "></i>
            </a>
        </div>
    </script>

    {{-- display statistics component --}}
    <script type="text/x-template" id="subscribed-app-metrics">
        <div :class="['small-box']">

            <div class="inner">
                <h4><span v-html="appMetrics.appName"></span></h4>
                <ul>
                    <li v-for="metric in appMetrics.data">
                        <span v-html="metric.key"></span>:  <span v-html="metric.value"></span>
                    </li>
                </ul>

            </div>

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
                    appMetrics: [],
                    filters: {
                        startDate: "01-01-2017",
                        endDate: "01-01-2025"
                    }
                }
            },
            computed: {

            },
            methods: {
                getAllMetrics: function () {
                    let self = this;
                    axios.get('/statistics/getConsolidated', {params:this.filters}).then(function(response) {

                        self.appMetrics = response.data;
                    });
                },
                showAppMetric: function (payload) {
                    this.appMetrics = [];
                    this.appMetrics.push(payload);
                },
                subscribeToApp: function () {
                    let self = this;

                    axios.post('/statistics', this.newApp).then(function(response) {
                        self.activeApps.push(response.data);
                    }).then(function(response) {
                        self.newApp = new StatisticsApp();
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
                            name: 'test'
                        };
                    },
                    methods: {
                        getAllMetrics: function () {

                            let self = this;
                            axios.get('/statistics/getAll/' + this.application.id, {params:this.filters})
                                .then(function(response) {

                                    self.$emit('sent-app-metrics', response.data);
                                });
                        }
                    }
                },
                applicationMetrics: {
                    template: '#subscribed-app-metrics',
                    props: {
                        appMetrics: {
                            type: Object,
                            default: function () {
                                return {
                                    appName: "bla",
                                    data:[
                                        {
                                            key:"",
                                            value:""
                                        }
                                    ]
                                }
                            }
                        }
                    },
                    computed: {
                    },
                    data: function () {
                        return {
                            name: 'test'
                        };
                    },
                    methods: {
                    }
                },
            }
        });
    </script>
@endpush