<template>
    <div>
        <div class="columns">
            <div class="column">
                <div class="box has-text-centered has-padding-medium raises-on-hover">
                    <button class="button is-small is-pulled-right is-naked"
                        @click="refresh">
                        <span class="icon is-small">
                            <fa icon="sync"/>
                        </span>
                    </button>
                    <strong>{{ __('Logins') }}: {{ format(logins) }}</strong>
                </div>
            </div>
            <div class="column">
                <div class="box has-text-centered has-padding-medium raises-on-hover">
                    <strong>{{ __('Actions') }}: {{ format(actions) }}</strong>
                </div>
            </div>
            <div class="column is-half">
                <date-filter class="box raises-on-hover"
                    compact
                    @update="dates = $event; fetch()"/>
            </div>
            <div class="column">
                <div class="box has-text-centered has-padding-medium raises-on-hover is-rounded">
                    <strong>{{ __('Users') }}: {{ format(users) }}</strong>
                </div>
            </div>
            <div class="column">
                <div class="box has-text-centered has-padding-medium raises-on-hover is-rounded">
                    <strong>{{ __('Sessions') }}: {{ format(sessions) }}</strong>
                </div>
            </div>
        </div>
        <div class="columns is-multiline is-mobile">
            <div v-for="(application, index) in applications"
                :key="index"
                class="
                    column is-one-fifth-fullhd is-one-quarter-widescreen
                    is-one-third-tablet is-half-mobile
                ">
                <application ref="apps"
                    class="raises-on-hover"
                    :application="application"
                    :dates="dates"
                    @loaded="updateStats"/>
            </div>
        </div>
    </div>
</template>

<script>

import Application from '../../components/enso/controlPanel/Application.vue';
import DateFilter from '../../components/enso/bulma/DateFilter.vue';

export default {
    components: { Application, DateFilter },

    data() {
        return {
            applications: [],
            dates: {
                min: new Date(),
                max: null,
            },
            logins: 0,
            actions: 0,
            users: 0,
            sessions: 0,
        };
    },

    created() {
        this.dates.max = new Date(this.dates.min.getTime() + (24 * 60 * 60 * 1000));

        this.fetch();
    },

    methods: {
        fetch() {
            axios.get(route('administration.applications.index'))
                .then(({ data }) => (this.applications = data))
                .catch(error => this.handleError(error));
        },
        refresh() {
            this.$refs.apps.forEach(app => app.fetch());
        },
        updateStats() {
            this.logins = this.$refs.apps
                .reduce((logins, app) => (logins += parseInt(`0${app.$data.statistics.logins}`, 10)), 0);

            this.actions = this.$refs.apps
                .reduce((actions, app) => (actions += parseInt(`0${app.$data.statistics.actions}`, 10)), 0);

            this.users = this.$refs.apps
                .reduce((users, app) => (users += parseInt(`0${app.$data.statistics.users}`, 10)), 0);

            this.sessions = this.$refs.apps
                .reduce((sessions, app) => (sessions += parseInt(`0${app.$data.statistics.sessions}`, 10)), 0);
        },
        format(value) {
            value = value.toString();
            const rgx = /(\d+)(\d{3})/;

            while (rgx.test(value)) {
                value = value.replace(rgx, '$1,$2');
            }

            return value;
        },
    },
};

</script>
