<template>
    <div>
        <div class="columns">
            <div class="column">
                <div class="box has-text-centered">
                    <strong>{{ __('Total Logins') }}: {{ logins }}</strong>
                </div>
            </div>
            <div class="column is-half">
                <date-interval-filter class="box is-raised"
                    title="Date interval"
                    :min="dates.min"
                    @update-min="dates.min = $event"
                    :max="dates.max"
                    @update-max="dates.max = $event"/>
            </div>
            <div class="column">
                <div class="box has-text-centered">
                    <strong>{{ __('Total Actions') }}: {{ actions }}</strong>
                </div>
            </div>
        </div>
        <div class="columns is-multiline is-mobile">
            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-tablet is-half-mobile"
                v-for="(application, index) in applications"
                :key="index">
                <application class="is-raised"
                    :application="application"
                    :dates="dates"
                    @loaded="updateStats"
                    ref="apps"/>
            </div>
        </div>
    </div>
</template>

<script>

import Application from '../../components/enso/controlPanel/Application.vue';
import DateIntervalFilter from '../../components/enso/bulma/DateIntervalFilter.vue';

export default {
    components: { Application, DateIntervalFilter },

    data() {
        return {
            applications: [],
            dates: {
                min: new Date(),
                max: null,
            },
            logins: 0,
            actions: 0,
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
        updateStats() {
            this.logins = this.$refs.apps.reduce((logins, app) =>
                (logins += parseInt(`0${app.$data.statistics.logins}`, 10)), 0);

            this.actions = this.$refs.apps.reduce((actions, app) =>
                (actions += parseInt(`0${app.$data.statistics.actions}`, 10)), 0);
        },
    },
};

</script>
